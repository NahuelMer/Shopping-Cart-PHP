<?php

spl_autoload_register(function ($classname){
    if(file_exists(__DIR__."/core/".$classname.".php")){
        require_once("core/".$classname.".php");
    }
    
    if(file_exists(__DIR__."/app/models/".$classname.".php")){
        require_once("app/models/".$classname.".php");
    }    
});
