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
     <link rel="stylesheet" href="<?php echo base_url('assets/css/estilsmeus.css');?>">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
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
        <li ><a href="<?php echo base_url('index.php/welcome/concert');?>">Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/assajs');?>">Assajos</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/partitura');?>">Partitures</a></li>
        <li class="active"><a href="<?php echo base_url('index.php/welcome/video');?>">YouTube</a></li>
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
<form class="form-horizontal" method="post" action="insertvideos">

    <legend align="center">Videos</legend>
    <div class="form-group">
      <label for="inputNom" class=" col-sm-5 col-xs-5 control-label">Nom</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputNom" name="Nom" placeholder="Nom">
      </div>
    </div>
    <div class="form-group">
      <label for="inputLink" class="col-sm-5 col-xs-5 control-label">Link</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="inputLink" name="Link" placeholder="Link">
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
                <th>Nom</th>
                <th>Link</th>
                <th>Accions</th>
                
            </tr>
        </thead>
        <tbody>  
            <?php foreach($this->_ci_cached_vars as $index => $llistarvideos){ ?>
            <tr>
                <td><?php echo $llistarvideos['id_video']; ?></td>
                <td><?php echo $llistarvideos['Nomvideo']; ?></td>
                <td><?php echo $llistarvideos['link']; ?></td>
                <td>
                    <a href='/admin/index.php/welcome/updateVideos/<?php echo $llistarvideos['id_video']; ?>'>
                        <button type="button" class="btn btn-warning btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </button>
                    </a>&nbsp;
                    <a href='/admin/index.php/welcome/eliminarVideos/<?php echo $llistarvideos['id_video']; ?>'  onclick="return confirm('Estas segur que vols eliminar aquest vídeo?);">
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
  </body>
</html>