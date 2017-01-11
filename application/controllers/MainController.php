<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	public function __construct() {
        session_start();
        error_reporting(E_ERROR);
        parent::__construct();
        $this->load->helper('form');
    }

	public function index()	{
		$this->load->view('login/login');
	}

	public function login() {
		$wsUrl = 'http://10.31.1.223:8051/ServiceAD.asmx?WSDL';
		
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		//$isValid = $this->loginWSAuthenticate($user, $pass, $wsUrl);
        $isValid = 1;
		if($isValid) {
            $_SESSION['uname'] = $user;
            redirect('main');
        } else {
            redirect('login?error=1');
        }
	}

    public function mainmenu() {
        $this->load->view('principal');
    }

    public function newusers() {
        $this->load->view('users/newUser');
    }

	public function loginWSAuthenticate($username, $password, $wsUrl) {
	
        // check params
        if (empty($username) or empty($password) or empty($wsUrl)) {
            return false;
        }
        // Create new SOAP client instance
        $client = new SoapClient($wsUrl, array('trace' => true, 'exceptions' => true));
		
        if (!$client) {
            die('Could not instanciate SOAP client with URL ' . $wsUrl);
            return false;
        }
        // Include phpseclib methods, because of a bug with AES/CFB in mcrypt
        //include_once dirname(__FILE__) . '/phpseclib/Crypt/AES.php';
        include_once substr(dirname(__FILE__), 0, -24) . '/statics/phpseclib/Crypt/AES.php';

        error_log("dsdsd");
        // Define all elements necessary to the encryption
        $key = '-+*%$({[]})$%*+-';
        // Complete password con PKCS7-specific padding
        $blockSize = 16;
        $padding = $blockSize - (strlen($password) % $blockSize);
        $password .= str_repeat(chr($padding), $padding);
        $cipher = new Crypt_AES(CRYPT_AES_MODE_CFB);
        $cipher->setKeyLength(128);
        $cipher->setKey($key);
        $cipher->setIV($key);
		
        $cipheredPass = $cipher->encrypt($password);
		
        // Mcrypt call left for documentation purposes - broken, see https://bugs.php.net/bug.php?id=51146
        //$cipheredPass = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $password,  MCRYPT_MODE_CFB, $key);
        // Following lines present for debug purposes only
        /*
          $arr = preg_split('//', $cipheredPass, -1, PREG_SPLIT_NO_EMPTY);
          foreach ($arr as $char) {
          error_log(ord($char));
          }
         */
        // Change to base64 to avoid communication alteration
        $passCrypted = base64_encode($cipheredPass);
        //error_log($passCrypted);
        // The call to the webservice will change depending on your definition
        try {
            $response = $client->validaUsuarioAD(array('usuario' => $username, 'contrasenia' => $passCrypted, 'sistema' => 'desafioutp'));
        } catch (SoapFault $fault) {
            error_log('Caught something');
            if ($fault->faultstring != 'Could not connect to host') {
                error_log('Not a connection problem');
                throw $fault;
            } else {
                error_log('Could not connect to WS host');
            }
            return 0;
        }
        //error_log(print_r($response,1));
        return $response->validaUsuarioADResult;
    }

	public function error_404(){
		$this->load->view('errors/html/error_404');
	}

    public function logout() {
        session_destroy();
        redirect('login');
    }
}
