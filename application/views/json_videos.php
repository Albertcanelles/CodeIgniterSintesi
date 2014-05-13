<?php 
$this->output->set_header('Conctent-Type: application/json; charset=utf-8');
echo "{Concert:",json_encode($json), "}";