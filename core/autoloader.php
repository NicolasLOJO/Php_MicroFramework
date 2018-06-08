<?php
    spl_autoload_register( function($class) {
        //var_dump($class);
        if(file_exists('./core/'.$class.'.php')):
            include'./core/'.$class.'.php';
        elseif(file_exists('./models/'.$class.'.php')):
            include'./models/'.$class.'.php';
        elseif(file_exists('./controllers/'.$class.'.php')):
            include'./controllers/'.$class.'.php';
        elseif(file_exists('./core/dao/'.$class.'.php')):
            include"./core/dao/$class.php";
        elseif(file_exists('./core/interfaces/'.$class.'.php')):
            include"./core/interfaces/$class.php";
        elseif(file_exists('./core/controller/'.$class.'.php')):
            include"./core/controller/$class.php";
        endif;
    });