<?php
namespace libraries;

  class Renderer{
   public static function render(string $path, array $tab=[]){

        extract($tab);
        ob_start();
    
  if(strlen($path)>=25){

    require("templates/". $path ."_html.php");
  }else{

    require("../templates/". $path ."_html.php");
  };
          
  
  
  
  // Récupération du contenu du tampon de sortie
  $pageContent = ob_get_clean();
        
        // Inclusion du fichier de template pour afficher la mise en page
          

        
        if(strlen($path) >=25){
      
          require('templates/layout_html.php');
        }else{
      
          require('../templates/layout_html.php');
        };
                
          // require('templates/layout_html.php');

        
    } 
  }
  ?>