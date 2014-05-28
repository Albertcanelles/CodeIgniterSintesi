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
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.css');?>"/>
        <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
        <link rel="stylesheet" href="http://labs.voronianski.com/media/style/reset.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/popout.css');?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/avgrund.css');?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="<?php echo base_url('assets/js/jquery.avgrund.js');?>"></script>
    </head>
    <body>
        <div class="snap-drawers">
            <div class="snap-drawer snap-drawer-left">
                <div>
                    <h4>Menú Principal</h4>
                    <ul>
                        <li><a href="<?php echo base_url('index.php/welcome/vistaconcert');?>">Concerts</a></li>
                        <li><a href="<?php echo base_url('index.php/welcome/vistaassaj');?>">Assajos</a></li>
                        <li><a href="<?php echo base_url('index.php/welcome/vistavideos');?>">YouTube</a></li>
                        <li><a href="<?php echo base_url('index.php/welcome/vistapartitures');?>">Partitures</a></li>               
                    </ul>
                </div>
            </div>
            <div class="snap-drawer snap-drawer-right"></div>
        </div>
       
        <div id="content" class="snap-content">
		
            <div id="toolbar">
                <a href="#" id="open-left"></a>
                <h1>Concerts</h1>
            </div>
            <div>
        <br>
        <br>
        <br>
        <br>
         <?php foreach($this->_ci_cached_vars as $index => $llistarconcert){ ?>
        <a href="" id="a<?php echo $llistarconcert['id_concert'];?>" class="button left"><?php echo $llistarconcert['Concert'];?></a>

    <script>
    $(function() {
        $('#a<?php echo $llistarconcert['id_concert'];?>').avgrund({
            height: 500,
            holderClass: 'custom',
            showClose: true,
            width: 350,
            showCloseText: 'Tanca',
            onBlurContainer: '.container',
            template: '<p>Concert: <?php echo $llistarconcert['Concert'];?></p>' + '<p>Dia i Hora: <?php echo $llistarconcert['DiaHora'];?></p>' + '<p>Lloc: <?php echo $llistarconcert['Lloc'];?></p>' 
            + '<p> Roba: <?php echo $llistarconcert['Roba'];?></p>' + '<p>PassaCarrers: <?php echo $llistarconcert['Passcalles'];?></p>' 
        });
    });
    </script>
    <?php } ?>

     
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
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){
            js=d.createElement(s);
            js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}
            }
            (document,"script","twitter-wjs");</script>   
    </body>
</html>
