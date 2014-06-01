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

  </head>
  <body>
   <div class="row fondo">
  <div class="col-md-5 col-xs-5">
   <h2><?php echo validation_errors(); ?></h2>
<form class="form-horizontal" method="post" >

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
    </form>
      </body>
</html>