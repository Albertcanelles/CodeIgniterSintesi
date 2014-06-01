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

    <script type="text/javascript">
 $(document).ready(function() {
    $('#taula').dataTable(); <!-- Modificar taula per la teua id -->
 } );
</script>

 <script language="Javascript"> 
    function confirmar(){ 
    confirmar=confirm("¿Segur que vols borrarlo?"); 
    if (confirmar) 
    return true;
    else 
    return false;
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
        <li class="active"><a href="<?php echo base_url('index.php/welcome/assajs');?>">Assajos</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/partitura');?>">Partitures</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/video');?>">YouTube</a></li>
       <li><a href="<?php echo base_url('index.php/welcome/membre');?>">Membres</a></li>
        <li ><a href="<?php echo base_url('index.php/welcome/vistaconcertadmin');?>"> Vista Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistaassajadmin');?>">Vista Assajos</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistapartituresadmin');?>">Vista Partitures</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistavideosadmin');?>">Vista YouTube</a></li>
       <li><a href="<?php echo base_url('index.php/home/logout');?>">Sortir</a></li>
      </ul>
    </div>
  </div>
  <div class="row fondo">
  <div class="col-md-5 col-xs-5">
  <h2><?php echo validation_errors(); ?></h2>
<form class="form-horizontal" method="post" action="insertarassajs">

    <legend align="center">Assajos</legend>
    <div class="form-group">
      <label for="inputAssajs" class=" col-sm-5 col-xs-5 control-label">Assaigs</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputAssajs" name="Assajs" placeholder="Assaigs">
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
      <label for="inputProxAct" class="col-sm-5 col-xs-5 control-label">Proxima Actuació</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputProxAct" name="proxact" placeholder="Proxima Actuació">
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-5 col-lg-offset-6">
        
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
      </div>
    </div>
    </div>
      <div class="col-md-7 ">
    </form>  
    <div>
    <br>
   <table class="display" id="taula" border="1" bordercolor="#000000" width="100%" cellpadding="3" cellspacing="3">
        <thead>
            <tr>
                 <th>ID</th>
                <th>Assaigs</th>
                <th>Dia i Hora</th>
                <th>Lloc</th>
                <th>Pròxima Actuació</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>  
             <?php foreach($this->_ci_cached_vars as $index => $llistarassajos){ ?>
            <tr>
                <td><?php echo $llistarassajos['id_assajs']; ?></td>
                <td><?php echo $llistarassajos['Assajs']; ?></td>
                <td><?php echo $llistarassajos['DiaHora']; ?></td>
                <td><?php echo $llistarassajos['Lloc']; ?></td>
                <td><?php echo $llistarassajos['ProxActuacio']; ?></td>  
                <td>
                    <a href='/admin/index.php/welcome/updateAssaigs/<?php echo $llistarassajos['id_assajs']; ?>'>
                        <button type="button" class="btn btn-warning btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </button>
                    </a>
                    <a href='/admin/index.php/welcome/eliminarAssajos/<?php echo $llistarassajos['id_assajs']; ?>'  onclick="return confirm('Confirmació. Estas segur que vols eliminar aquest assaigs?');">
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
    //mask:'39/19/9999 29:59'
});
    </script>   
</html>