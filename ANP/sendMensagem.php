<?php
require("../restritos.php"); 
require_once '../init.php';
$cProj = "active";
$PDO = db_connect();
require_once '../QueryUser.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Top Navigation</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/AdminLTE.css">
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<?php include '../top-menu-top.php'; ?>
<div class="content-wrapper">
 <div class="container">
  <section class="content-header"><h1>Enviar Mensagem<small>MDIO Interact Brasil</small></h1></section>
  <section class="content">
  TESTE
   <div class="box box-default">
    <div class="box-header with-border"><h3 class="box-title">Blank Box</h3></div>
    <div class="box-body">
            The great content goes here


<form name="form1" method="post" action="">
  <p>
    <label for="welcome"></label>
    <textarea name="welcome" id="welcome" cols="60" rows="5"></textarea>
  </p>
  <p> </p>
  <p>
    <input type="submit" name="button" id="button" value="Submit">
  </p>
</form>


    </div>
   </div>
  </section>
 </div>
</div>
<?php 
include_once '../footer.php';
?>
</div>
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="../plugins/fastclick/fastclick.js"></script>
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/demo.js"></script>
<!-- Bootstrap 3.3.6 -->
<!-- Slimscroll -->
<!-- FastClick -->
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script>
<script>
          $('#welcome').wysihtml5();
</script>

</body>
</html>
