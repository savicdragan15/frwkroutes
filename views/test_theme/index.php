<?php


var_dump($this->data);
$this->partial->data=$this->data;
$this->partial->render('view');