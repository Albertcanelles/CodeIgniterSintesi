<!DOCTYPE HTML>
<html lang="en-ES">
<meta charset="utf-8">
    <head>
        <title>Administració</title>
        <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/snap.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/label_better.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.datetimepicker.css');?>"/>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.datetimepicker.js');?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.css');?>">
        <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    </head>
    <body>
        <div class="snap-drawers">
            <div class="snap-drawer snap-drawer-left">
                <div>
                    <h4>Menú Principal</h4>
                    <ul>
                        <li><a href="<?php echo base_url('index.php/welcome/concert');?>">Concerts</a></li>
                        <li><a href="<?php echo base_url('index.php/welcome/assajs');?>">Assajos</a></li>
                        <li><a href="<?php echo base_url('index.php/welcome/video');?>">YouTube</a></li>
                        <li><a href="<?php echo base_url('index.php/welcome/partitura');?>">Partitures</a></li>  
                    </ul>
                </div>
            </div>
            <div class="snap-drawer snap-drawer-right"></div>
        </div>
       
        <div id="content" class="snap-content">
		
            <div id="toolbar">
                <a href="#" id="open-left"></a>
                <h1>Partitures</h1>
            </div>
           <div align="center">
            <br>
            <br>
            <br>
            <br>
          
          <? echo form_open_multipart('welcome/DoUpload');?>
          <p> <label for="file"> Selecciona un fitxer</label>
          <p> <input type="file" name="cipote" value="Envia" size="50" /></p>
          
        <p><button type="submit" class="btn btn-success" name="insertConcert">Acceptar</button></p>
        <?php echo form_close();?>
        <?php if($this->session->flashdata('success_upload'));?>
            <div> 
            <?php echo $this->session->flashdata('success_upload');?>
            </div>

        </div>
        <br>
        <br>
<table cellpadding="0" cellspacing="0" border="0" id="botons" class="table table-striped" width="100%" align="center">
        <thead bgcolor=#819FF7>
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
            
            
        <script type="text/javascript" src="<?php echo base_url('assets/js/snap.js');?>"></script>
        <script type="text/javascript">
            var snapper = new Snap({
                element: document.getElementById('content'),
                disable: 'right'
            });
            
        </script>
       <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/demo.css');?>" />
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>       
    </body>
</html>
