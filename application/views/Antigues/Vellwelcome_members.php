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
                <h1>Benvingut Agustí</h1>
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
