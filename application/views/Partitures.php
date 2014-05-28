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
        <li ><a href="<?php echo base_url('index.php/welcome/concert');?>">Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/assajs');?>">Assajos</a></li>
        <li class="active"><a href="<?php echo base_url('index.php/welcome/partitura');?>">Partitures</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/video');?>">YouTube</a></li>
       <li><a href="<?php echo base_url('index.php/welcome/membre');?>">Membres</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
  <div class="col-md-5 col-xs-5">
  <? echo form_open_multipart('welcome/DoUpload');?>

    <legend align="center">Partitures</legend>
    <div class="form-group">
      <label for="file" class=" col-sm-3 col-xs-3 control-label">Partitura</label>
      <div class="col-lg-8">
        <input type="file" class="form-control" id="inputPartitura" name="cipote" placeholder="Partitura">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-4 col-lg-offset-6">
        <br>
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-thumbs-up"></span> Acceptar</button>
      </div>
    </div>
    </div>
      <div class="col-md-7 ">
    <?php echo form_close();?>
        <?php if($this->session->flashdata('success_upload'));?>
            <div> 
            <?php echo $this->session->flashdata('success_upload');?>
            </div>
    <div>
    <br>
  <table class="display" id="taula" border="1" bordercolor="#000000" width="100%" cellpadding="3" cellspacing="3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Partitura</th>
                <th>Accions</th>
                
            </tr>
        </thead>
        <tbody>  
            <?php foreach($this->_ci_cached_vars as $index => $llistarpartitura){ ?>
            <tr>
                <td><?php echo $llistarpartitura['id_partitura']; ?></td>
                <td><?php echo $llistarpartitura['Nom']; ?></td>
                <td><?php echo $llistarpartitura['Partitura']; ?></td>
                <td>
                    <a href='/codeigniterusuaris/index.php/usuaris/modificar/<?php echo $llistarpartitura['id_video']; ?>'>
                        <button type="button" class="btn btn-warning btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </button>
                    </a>&nbsp;
                    <a href='/admin/index.php/welcome/eliminarPartitures/<?php echo $llistarpartitura['id_partitura']; ?>'>
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
</html>