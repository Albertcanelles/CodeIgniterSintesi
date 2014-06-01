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
  <div class="navbar navbar-inverse">
    <div class="navbar-header">     
        <a class="navbar-brand" href="<?php echo base_url().'index.php/welcome/index';?>"><span class="glyphicon glyphicon-music"></span>
Banda de Jesús</a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
         <li><a href="<?php echo base_url('index.php/welcome/concert');?>">Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/assajs');?>">Assajos</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/partitura');?>">Partitures</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/video');?>">YouTube</a></li>
       <li class="active"><a href="<?php echo base_url('index.php/welcome/membre');?>">Membres</a></li>
        <li ><a href="<?php echo base_url('index.php/welcome/vistaconcertadmin');?>"> Vista Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistaassajadmin');?>">Vista Assajos</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistapartituresadmin');?>">Vista Partitures</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistavideosadmin');?>">Vista YouTube</a></li>
         <li><a href="<?php echo base_url('index.php/home/logout');?>">Sortir</a></li>
      </ul>
    </div>
  </div>
  <div class="row fondo">
  <div class="col-md-5 col-xs-5 contenedor">
<form class="form-horizontal"  method="post" action="insertusuaris">

    <legend align="center">Membres</legend>
    <div class="form-group">
      <label for="inputConcert" class=" col-sm-5 col-xs-5 control-label">Usuari</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputConcert" name="Usuari" placeholder="Usuari">
      </div>
    </div>
    <div class="form-group">
      <label for="inputRoba" class="col-sm-5 col-xs-5 control-label">Contrasenya</label>
      <div class="col-lg-6">
        <input type="password" class="form-control" id="inputRoba" name="Contrasenya" placeholder="Contrasenya">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-5 control-label">Tipus d'usuari</label>
      <div class="col-lg-5">
        <div class="radio">
          <label>
            <input type="radio" name="optionUsers" id="optionsRadios1" value="Membre" checked="">
            Membre
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionUsers" id="optionsRadios2" value="Administrador">
            Administrador
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-5 col-lg-offset-6">
        
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
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
                <th>Id</th>
                <th>Usuari</th>
                <th>Rol</th>
                <th>Accions</th>
                
            </tr>
        </thead>
        <tbody>  
            <?php foreach($this->_ci_cached_vars as $index => $llistarmembre){ ?>
            <tr>
                <td><?php echo $llistarmembre['id_membre']; ?></td>
                <td><?php echo $llistarmembre['usuari']; ?></td>
                <td><?php echo $llistarmembre['rol']; ?></td>  
                <td>
                    <a href='/admin/index.php/welcome/updateMembre/<?php echo $llistarmembre['id_membre']; ?>'>
                        <button type="button" class="btn btn-warning btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </button>
                    </a>
                    <a href='/admin/index.php/welcome/eliminarMembres/<?php echo $llistarmembre['id_membre']; ?>'>
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
// Script para el datatables
    $("#taula").dataTable({   
             bJQueryUI: true,
             sPaginationType: "full_numbers"
});

    </script>   
</html>