<?php 
ob_start();
//session_start();
include_once 'class.user.php';
$user = new Admin();

if (isset($_REQUEST['submit'])) {
    extract($_REQUEST);
    $login = $user->check_login($emailusername, $password);
    if ($login) {
        // Registration Success
      header("Location: user.php");
    } else {
        // Registration Failed
        echo 'Wrong username or password';
    }
}

ob_end_flush();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">

    <script type="text/javascript" language="javascript">

            function submitlogin() {
                var form = document.login;
        if(form.username.value == ""){
          alert( "Enter email or username." );
          return false;
        }
        else if(form.password.value == ""){
          alert( "Enter password." );
          return false;
        }
      }

</script>
  </head>
  <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
          <a href=" "><b>Dilmi Travels</b></a>
             </div><!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                              <form action="" method="post">
           <div class="form-group has-feedback">
               <input type="text" class="form-control" name="emailusername" placeholder="Username">
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
           </div>
           <div class="form-group has-feedback">
               <input type="password" class="form-control" name="password" placeholder="Password">
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
           </div>
           <div class="row">
            <!-- /.col -->
           <div class="col-xs-12 right">
               <button type="submit" onclick="return(submitlogin());" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
           </div><!-- /.col -->
           </div>
        </form>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

  </body>
</html>
