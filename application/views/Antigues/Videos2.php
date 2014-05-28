<html lang="en-ES">
<meta charset="utf-8">
  <head>
     <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap3.min.css');?>">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

  </head>
  <body>
  <div class="navbar navbar-inverse">
    <div class="navbar-header">   
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-music"></span>
Banda de Jesús</a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="#">Concerts</a></li>
        <li><a href="#">Assajos</a></li>
        <li><a href="#">Partitures</a></li>
        <li class="active"><a href="#">Videos</a></li>
       <li><a href="#">Membres</a></li>
      </ul>
    </div>
  </div>
  <div class="row">
  <div class="col-md-5 col-xs-5">
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
     <table cellpadding="0" cellspacing="0" border="0" id="botons" class="table table-striped table-hover" width="100%" align="center">
  <thead bgcolor=#819FF7>
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
                    <a href='/codeigniterusuaris/index.php/usuaris/modificar/<?php echo $llistarvideos['id_video']; ?>'>
                        <button type="button" class="btn btn-warning btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> 
                        </button>
                    </a>
                    <a href='/admin/index.php/welcome/eliminarVideos/<?php echo $llistarvideos['id_video']; ?>'>
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