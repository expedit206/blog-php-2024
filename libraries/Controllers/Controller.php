<?php 
namespace libraries\Controllers;

abstract class Controller{
protected $controllerName;
protected $model;
    public function __construct(){
    $this ->model =new $this->controllerName;
}
}