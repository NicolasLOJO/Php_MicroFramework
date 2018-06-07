<?php
    spl_autoload_register( function($class) {
        //var_dump($class);
        if(file_exists('./core/'.$class.'.php')):
            include'./core/'.$class.'.php';
        elseif(file_exists('./models/'.$class.'.php')):
            include'./models/'.$class.'.php';
        elseif(file_exists('./controller/'.$class.'.php')):
            include'./controller/'.$class.'.php';
        elseif(file_exists('./core/dao/'.$class.'.php')):
            include"./core/dao/$class.php";
        elseif(file_exists('./core/interfaces/'.$class.'.php')):
            include"./core/interfaces/$class.php";
        endif;
    });