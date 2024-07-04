<?php 
namespace libraries;
 class Http{
     

public static function redirect($url) : void{
    header('Location: '. $url);
exit();
}
 }
 ?>