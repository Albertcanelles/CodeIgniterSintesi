<html lang="en-ES">
<meta charset="utf-8">
    <head>
    <!-- Tots els fitxers necesaris per configuracio -->
   <meta http-equiv="x-ua-compatible" content="IE=edge" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
         <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
         <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.youtubeplaylist.js');?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/youtube.css');?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap3.min.css');?>">
          <meta name="description" content="BlocksIt.js jQuery plugin Demonstration #2 Pinterest dynamic grid with CSS3 Transitions by inWebson.com"/>
    </head>
    <body>
    <!--Boto del principi del menú -->
  <div class="navbar navbar-inverse">
    <div class="navbar-header">     
        <a class="navbar-brand" href="<?php echo base_url('index.php/welcome/welcomemembers');?>"><span class="glyphicon glyphicon-music"></span>
Banda de Jesús</a>
    </div>
    <!--Aquesta ja es la barra dels menús -->
    <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('index.php/welcome/concert');?>">Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/assajs');?>">Assajos</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/partitura');?>">Partitures</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/video');?>">YouTube</a></li>
       <li><a href="<?php echo base_url('index.php/welcome/membre');?>">Membres</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistaconcertadmin');?>"> Vista Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistaassajadmin');?>">Vista Assajos</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistapartituresadmin');?>">Vista Partitures</a></li>
        <li class="active"><a href="<?php echo base_url('index.php/welcome/vistavideosadmin');?>">Vista YouTube</a></li>
          <li><a href="<?php echo base_url('index.php/home/logout');?>">Sortir</a></li>
      </ul>
    </div>
  </div>
<div>
<!--Vaig llistan els videos des de la base de dades pasan el link i els paso com una llista -->
       <ul class="video">
       <?php foreach($this->_ci_cached_vars as $index => $llistarvideos){ ?>
            
                <li><a href="<?php echo $llistarvideos['link']; ?>"></a></li>
                
            <?php } ?>
        </ul>
            </div>
 
    </body>
<!--Configuracio del plugin de YouTube -->
    <script type="text/ecmascript">
    
        $(function() {
            $("ul.video").ytplaylist({
                addThumbs:true, 
                autoPlay: false, 
                playerWidth: '260',
                playerHeight: '180',
                thumbSize: 'large',
                showInline: true
                });
        });
    
</script>
</html>