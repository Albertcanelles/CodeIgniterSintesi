<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
 <head>
   <title>Pàgina de registre</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap3.min.css');?>">
 </head>
 <body>
<!--
   <h1>Simple Login with CodeIgniter</h1>
   <?php //echo validation_errors(); ?>
   <?php //echo form_open('verifylogin'); ?>
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Login"/>
   </form>
-->
   <!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h1 class="text-center">Benvingut</h1>
      </div>
      <div class="modal-body">
        <?php echo validation_errors(); ?>
        <!-- <?php //echo form_open('verifylogin'); ?>-->
          <form class="form col-md-12 center-block" method="post" action="verifylogin">
            <div class="form-group form col-md-12 center-block">
              <input type="text" class="form-control input-lg" placeholder="Usuari" name="username">
            </div>
            <div class="form-group form col-md-12 center-block">
              <input type="password" class="form-control input-lg" placeholder="Contrasenya" name="password">
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-lg btn-block">Entrada</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">

      </div>  
      </div>
  </div>
  </div>
</div>
 </body>
</html>
