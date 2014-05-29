<html lang="en-ES">
<meta charset="utf-8">
	<head>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
 
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
 <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="http://www.datatables.net/release-datatables/media/css/demo_table.css">
<link rel="stylesheet" type="text/css" href="http://www.datatables.net/release-datatables/media/css/demo_page.css">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap3.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.datetimepicker.css');?>"/>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.datetimepicker.js');?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/estilsmeus.css');?>">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
 <script type="text/javascript">
 $(document).ready(function() {
    $('#taula').dataTable(); <!-- Modificar taula per la teua id -->
 } );
</script>
  
	</head>
	<body>
  <div class="navbar navbar-inverse">
  	<div class="navbar-header"> 	
    	<a class="navbar-brand" href="<?php echo base_url();?>"><span class="glyphicon glyphicon-music"></span>
Banda de Jesús</a>
    </div>
  	<div class="navbar-collapse collapse navbar-inverse-collapse">
    	<ul class="nav navbar-nav">
    	  <li class="active"><a href="<?php echo base_url('index.php/welcome/concert');?>">Concerts</a></li>
    	  <li><a href="<?php echo base_url('index.php/welcome/assajs');?>">Assajos</a></li>
    	  <li><a href="<?php echo base_url('index.php/welcome/partitura');?>">Partitures</a></li>
    	  <li><a href="<?php echo base_url('index.php/welcome/video');?>">YouTube</a></li>
     	 <li><a href="<?php echo base_url('index.php/welcome/membre');?>">Membres</a></li>
   	  </ul>
  	</div>
  </div>
  <div class="row fondo">
  <div class="col-md-5 col-xs-5 contenedor">
    <h2><?php echo validation_errors(); ?></h2>
<form class="form-horizontal" method="post" action="insertarconcert">

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
        <input type="text" class="form-control" name="Diahora" id="datetimepicker" placeholder="Dia i Hora">
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
      <div class="col-md-7 taula">
    </form>
    
    <div>
    <br>

  <table class="display" id="taula" border="1" bordercolor="#000000" width="100%" cellpadding="3" cellspacing="3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Concert</th>
                <th>DiaHora</th>
                <th>Lloc</th>
                <th>Roba</th>
                <th>PassaCarrers </th>
                <th>Accions</th>
                
            </tr>
        </thead>
        <tbody>  
            <?php foreach($this->_ci_cached_vars as $index => $llistarconcert){ ?>
            <tr>
                <td><?php echo $llistarconcert['id_concert']; ?></td>
                <td><?php echo $llistarconcert['Concert']; ?></td>
                <td><?php echo $llistarconcert['DiaHora']; ?></td>
                <td><?php echo $llistarconcert['Lloc']; ?></td>
                <td><?php echo $llistarconcert['Roba']; ?></td>
                <td><?php echo $llistarconcert['Passcalles']; ?></td>  
                <td>
                    <a href='/codeigniterusuaris/index.php/usuaris/modificar/<?php echo $llistarconcert['id_concert']; ?>'>
                        <button type="button" class="btn btn-warning btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </button>
                    </a>
                    <a href='/admin/index.php/welcome/eliminarConcerts/<?php echo $llistarconcert['id_concert']; ?>'>
                        <button type="button" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-remove"></span> 
                        </button>
                    </a> 
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>

</div>
	</body>

   <script type="text/javascript">
// Script per a les dates i hores
    $('#datetimepicker').datetimepicker()
    .datetimepicker({value:'Dia Hora',step:10});

    $('#datetimepicker_mask').datetimepicker({
    mask:'9999/19/39 29:59'
});

    </script>   
</html>