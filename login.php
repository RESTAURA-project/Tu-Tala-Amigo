<!DOCTYPE html>
<html lang="en">
<style>
.login-img {
    /* background-image: url("assets/uploads/pajarillo_1920x1080.jpg"); */
    background-color: #cccccc;
    background-repeat: no-repeat;
    background-size: 100% auto;

}

@media only screen and (min-width:320px) and (max-width:480px) {
    .login-img {
        background-image: url("assets/uploads/login/movil_login4.jpg");

    }
}

/* @media (min-width:768px){ */
@media only screen and (min-width:480px) and (max-width:768px) {
    .login-img {
        background-image: url("assets/uploads/login/tablet_login6.jpg");
        background-size: 100% auto;
    }
}

@media (orientation: landscape) {
    .login-img {
        background-image: url("assets/uploads/login/pajarillo_1920x1080.jpg");
        background-size: 100% auto;
    }
}
</style>

<?php 

//Para Debug
/* ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL); */

include('./db_connect.php');
  ob_start();
  // if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  // }
  ob_end_flush();
?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");
//echo $_SESSION['login_id'];

?>
<?php include 'header.php' ?>

<body class="hold-transition login-page bg-black login-img">

    <div class="login-box">
        <div class="login-logo">
            <a href="#" class="text-white">
                <h3><b><?php echo $_SESSION['system']['name'] ?></b>
            </a></h3>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <form action="" id="login-form">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" required placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" required placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Recordarme
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">

                        <div
                            style="display: flex; align-items: left; align-self: center; justify-content: center; justify-self: center; width: 80%; margin: 0 auto;">
                            <a name="Registrarme" href="https://restaura.com.ar/proyecto-tala/">
                                <h6>No tengo cuenta</h6>
                            </a>
                        </div>

                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    <script>
    $(document).ready(function() {
        $('#login-form').submit(function(e) {
            e.preventDefault()
            start_load()
            if ($(this).find('.alert-danger').length > 0)
                $(this).find('.alert-danger').remove();
            $.ajax({
                url: 'ajax.php?action=login',
                method: 'POST',
                data: $(this).serialize(),
                error: err => {
                    console.log(err)
                    end_load();

                },
                success: function(resp) {
                    if (resp == 1) {
                        location.href = 'index.php?page=home';
                    } else {
                        $('#login-form').prepend(
                            '<div class="alert alert-danger">Username or password is incorrect.</div>'
                            )
                        end_load();
                    }
                }
            })
        })
    })
    </script>
    <?php include 'footer.php' ?>

</body>

</html>