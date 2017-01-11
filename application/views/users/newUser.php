<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <a href="#" class="show-sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <ol class="breadcrumb pull-left">
            <li><a href="main">Dashboard</a></li>
            <li><a href="#">Usuarios</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-search"></i>
                    <span>Formulario de registro</span>
                </div>
                <div class="box-icons">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="expand-link">
                        <i class="fa fa-expand"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content">
                <h4 class="page-header">Formulario de registro</h4>
                <form class="form-horizontal" role="form">
                    <div class="form-group has-success">
                        <label class="col-sm-2 control-label">Nombres</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Nombres" id="firstname">
                        </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <label class="col-sm-2 control-label">Apellidos</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Apellidos" id="lastname">
                        </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Username" id="username">
                        </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <label class="col-sm-2 control-label">Nikname</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Nikname" id="nikname">
                        </div>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Email" id="email">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-2">
                            <button type="cancel" class="btn btn-default btn-label-left">
                                <span><i class="fa fa-clock-o txt-danger"></i></span>
                                Cancel
                            </button>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" id="btnEnviar" class="btn btn-primary btn-label-left">
                                <span><i class="fa fa-clock-o"></i></span>
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var url = "http://10.31.1.84/CodeApiMobile/public";

        $.getJSON(url + '/getToken/')
        .done(function(data){
            sessionStorage.setItem('csrf_name', data.csrf_name);
            sessionStorage.setItem('csrf_value', data.csrf_value);
        });

        $('#btnEnviar').click(function(){
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var username = $('#username').val();
            var nikname = $('#nikname').val();
            var email = $('#email').val();

            $.post(url + '/new-user/', {
                firstname : firstname,
                lastname : lastname,
                username : username,
                nikname : nikname,
                email : email,
                'csrf_name' : sessionStorage.getItem('csrf_name'),
                'csrf_value' : sessionStorage.getItem('csrf_value')
            })
            .done(function(data){
                if(data) {
                    $('input').val("");
                    alert('Registro agregado correctamente');
                } else {
                    alert('Error');
                }
            })
            .fail(function(error){
                alert('[' + error.status + ']: ' + error.statusText + ' => ' + error.responseText);
            });
        });
    })
</script>