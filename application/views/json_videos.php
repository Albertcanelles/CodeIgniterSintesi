<?php 
$this->output->set_header('Conctent-Type: application/json; charset=utf-8');
echo "{Videos:",json_encode($json), "}";