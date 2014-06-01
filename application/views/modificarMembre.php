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
       <link rel="stylesheet" href="<?php echo base_url('assets/css/estilsmeus.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap3.min.css');?>">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
 <script type="text/javascript">
 $(document).ready(function() {
    $('#taula').dataTable(); <!-- Modificar taula per la teua id -->
 } );
</script>
    </head>
     <body>
      <div class="row fondo">
  <div class="col-md-5 col-xs-5 contenedor">
   <h2><?php echo validation_errors(); ?></h2>
<form class="form-horizontal"  method="post">
 <label for="inputRoba" class="col-sm-5 col-xs-5 control-label">Contrasenya</label>
      <div class="col-lg-6">
        <input type="password" class="form-control" id="inputRoba" name="Contrasenya" placeholder="Contrasenya">
      </div>
      <label for="inputRoba" class="col-sm-5 col-xs-5 control-label">Comfirmala</label>
      <div class="col-lg-6">
        <input type="password" class="form-control" id="inputRoba" name="comfirmala" placeholder="Comfirmala">
      </div>
    </div>
     <div class="form-group">
      <div class="col-lg-5 col-lg-offset-6">
        
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
      </div>
    </div>
    </form>
    </div>
    </div>