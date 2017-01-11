<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getLista(){
      $sqlistaUsuarios = "SELECT usuario_id, concat(lastname, ' ', firstname)
        usuario, username, nikname, email from g_usuario where active = 1";

      return $this->db->query($sqlistaUsuarios)->result('array');
    }
}
