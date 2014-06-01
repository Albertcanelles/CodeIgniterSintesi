<html lang="en-ES">
<meta charset="utf-8">
    <head>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap3.min.css');?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.datetimepicker.css');?>"/>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <meta name="description" content="BlocksIt.js jQuery plugin Demonstration #2 Pinterest dynamic grid with CSS3 Transitions by inWebson.com"/>
<meta name="keywords" content="demonstration,demo,jquery,blocksit.js,css3,dynamic,grid,layout,inwebson"/>
<link rel='stylesheet' href='<?php echo base_url('assets/css/pinterest.css');?>' media='screen' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo base_url('assets/js/blocksit.js');?>"></script>
<script>
$(document).ready(function() {
  //vendor script
  $('#header')
  .css({ 'top':-50 })
  .delay(1000)
  .animate({'top': 0}, 800);
  
  $('#footer')
  .css({ 'bottom':-15 })
  .delay(1000)
  .animate({'bottom': 0}, 800);
  
  //blocksit define
  $(window).load( function() {
    $('#container').BlocksIt({
      numOfCol: 4,
      offsetX: 8,
      offsetY: 8
    });
  });
  
  //window resize
  var currentWidth = 1100;
  $(window).resize(function() {
    var winWidth = $(window).width();
    var conWidth;
    if(winWidth < 660) {
      conWidth = 440;
      col = 2
    } else if(winWidth < 880) {
      conWidth = 660;
      col = 3
    } else if(winWidth < 1100) {
      conWidth = 880;
      col = 4;
    } else {
      conWidth = 1100;
      col = 5;
    }
    
    if(conWidth != currentWidth) {
      currentWidth = conWidth;
      $('#container').width(conWidth);
      $('#container').BlocksIt({
        numOfCol: col,
        offsetX: 8,
        offsetY: 8
      });
    }
  });
});
</script>
    </head>
    <body>
  <div class="navbar navbar-inverse">
    <div class="navbar-header">     
        <a class="navbar-brand" href="<?php echo base_url('index.php/welcome/welcomemembers');?>"><span class="glyphicon glyphicon-music"></span>
Banda de Jesús</a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse">
        <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('index.php/welcome/concert');?>">Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/assajs');?>">Assajos</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/partitura');?>">Partitures</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/video');?>">YouTube</a></li>
       <li><a href="<?php echo base_url('index.php/welcome/membre');?>">Membres</a></li>
        <li ><a href="<?php echo base_url('index.php/welcome/vistaconcertadmin');?>"> Vista Concerts</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistaassajadmin');?>">Vista Assajos</a></li>
        <li class="active"><a href="<?php echo base_url('index.php/welcome/vistapartituresadmin');?>">Vista Partitures</a></li>
        <li><a href="<?php echo base_url('index.php/welcome/vistavideosadmin');?>">Vista YouTube</a></li>
          <li><a href="<?php echo base_url('index.php/home/logout');?>">Sortir</a></li>
      </ul>
    </div>
  </div>
<section id="wrapper">

   <?php foreach($this->_ci_cached_vars as $index => $llistarpartitures){ ?>
  <div class="grid">
    <div class="imgholder">
      <img src="http://www.inwebson.com/demo/blocksit-js/demo2/images/img27.jpg" />
    </div>
    <strong><a href='<?php echo $llistarpartitures['Partitura'];?>'><?php echo $llistarpartitures['Nom']; ?> </a></strong>

  </div>
   <?php } ?>
   
  </section>
 
    </body>
</html>