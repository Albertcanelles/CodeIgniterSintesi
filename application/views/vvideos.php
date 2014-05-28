<html lang="en-ES">
<meta charset="utf-8">
    <head>
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
  <div class="navbar navbar-inverse">
    <div class="navbar-header">     
        <a class="navbar-brand" href="<?php echo base_url('index.php/welcome/welcomemembers');?>"><span class="glyphicon glyphicon-music"></span>
Banda de Jesús</a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url('index.php/welcome/vistaconcert');?>">Concerts</a></li>
          <li ><a href="<?php echo base_url('index.php/welcome/vistaassaj');?>">Assajos</a></li>
          <li ><a href="<?php echo base_url('index.php/welcome/vistapartitures');?>">Partitures</a></li>
          <li class="active"><a href="<?php echo base_url('index.php/welcome/vistavideos');?>">YouTube</a></li>
      </ul>
    </div>
  </div>
<div>
        <br>
        <br>
        <br>
        <br>
       <ul class="video">
       <?php foreach($this->_ci_cached_vars as $index => $llistarvideos){ ?>
            
                <li><a href="<?php echo $llistarvideos['link']; ?>"></a></li>
                
            <?php } ?>
        </ul>
            </div>
 
    </body>

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