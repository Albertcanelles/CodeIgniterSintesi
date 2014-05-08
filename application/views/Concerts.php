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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery.multiselect.css');?>" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/prettify.css');?>" /> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css');?>" /> 
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.multiselect.js');?>"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/js/prettify.js');?>"></script> 
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
        <form class="bl_form" align="center" method="post" action="insertarconcert">
          <p><input type="text"  class="label_better" data-new-placeholder="Concert" placeholder="Concert" name="Concert"></p>
          <p><input type="text"   class="label_better" data-new-placeholder="Lloc" placeholder="Lloc" name="Lloc"  ></p>
          <p><input type="text"   class="label_better" data-new-placeholder="Roba" placeholder="Roba" name="Roba" ></p>
         <p><input type="text"     class="label_better" id="datetimepicker" placeholder="Dia Hora" name="Diahora" ></p>
         <p>Passacarrers? </p>
         
            <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Si
            </label>
     
        <label>
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
        No
        </label>

        <p>
        <select name="ListPartitures" multiple="multiple" style="width:300" >
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
        <option value="option4">Option 4</option>
        <option value="option5">Option 5</option>
        <option value="option6">Option 6</option>
        <option value="option7">Option 7</option>
        </select>
    </p>
        <button type="submit" class="btn btn-success" name="insertConcert">Acceptar</button>
        
        </form>
        
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
            <script type="text/javascript">
    $('#datetimepicker').datetimepicker()
    .datetimepicker({value:'Dia Hora',step:10});

    $('#datetimepicker_mask').datetimepicker({
    mask:'9999/19/39 29:59'
});

    $(function(){

    $("select").multiselect({
        selectedList: 10
    });
    
});
    </script>   
    
    </body>
    

</html>
