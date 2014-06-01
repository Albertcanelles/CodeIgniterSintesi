 <html lang="en-ES">
<meta charset="utf-8">
  <head>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
 
<!-- DataTables -->
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.dataTables.js');?>"></script>
<!--<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>-->
 <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://www.datatables.net/release-datatables/media/css/demo_table.css">
<link rel="stylesheet" type="text/css" href="http://www.datatables.net/release-datatables/media/css/demo_page.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap3.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.datetimepicker.css');?>"/>
        
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.datetimepicker.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-confirmation.js');?>"></script>
       <link rel="stylesheet" href="<?php echo base_url('assets/css/estilsmeus.css');?>">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.1/js/bootstrap.js" rel="stylesheet">
    <link href="//cdn.datatables.net/plug-ins/28e7751dbec/i18n/Catalan.json" rel="stylesheet">
    <script>
 $(document).ready(function() {
    $('#taula').dataTable(); <!-- Modificar taula per la teua id -->
  
    
 } );
</script>
  
  </head>
  <body>
 <div class="row fondo">
  <div class="col-md-5 col-xs-5 contenedor">
    <h2><?php echo validation_errors(); ?></h2>
<form class="form-horizontal" method="post">

    <legend align="center">Concerts</legend>
    <div class="form-group">
      <label for="inputConcert" class=" col-sm-5 col-xs-5 control-label">Concert</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputConcert" name="Concert" placeholder="Concert">
      </div>
    </div>
    <div class="form-group">
      <label for="inputDiaHora" class="col-sm-5 col-xs-5 control-label">Dia i Hora</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="datetimepicker" name="Diahora" placeholder="Dia i Hora">
      </div>
    </div>
    <div class="form-group">
      <label for="inputLloc" class="col-sm-5  col-xs-5 control-label">Lloc</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputLloc" name="Lloc" placeholder="Lloc">
      </div>
    </div>
    <div class="form-group">
      <label for="inputRoba" class="col-sm-5 col-xs-5 control-label">Roba</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputRoba" name="Roba" placeholder="Roba">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-5 control-label">Passacalles</label>
      <div class="col-lg-5">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="Si" checked="">
            Si
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="No">
            No
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-5 col-lg-offset-6">
        
        <button type="submit" class="btn btn-primary" name="insertConcert"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
      </div>
    </div>
    </div>
    </form>
    </body>
    <script type="text/javascript">
// Script per a les dates i hores
    $('#datetimepicker').datetimepicker()
    .datetimepicker({value:'Dia Hora',step:10});

    $('#datetimepicker_mask').datetimepicker({
   // mask:'9999/19/39 29:59'
    mask:'39/19/9999 29:59'
});
    </script>   
    </html>