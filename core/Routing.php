<?php

class Routing {
    
    private $config; //Assoc array of config routing file
    private $uri; //Array of all URI cut
    private $route; //result of key config array
    private $controller; //finding controller
    private $args = []; //Array of argument for tell controller
    private $method; //method requested

    public function __construct(){
        $configFile = file_get_contents('./config/routing.json');
        $this->config = json_decode($configFile, true);
    }

    //Methode qui execute le cheminemant des route pour voir si elle existe ou non
    public function execute(){
        $this->uri = explode("/", $_SERVER['REQUEST_URI']);
        foreach($this->config as $key => $value){
            $this->controller = $this->getValue($value);
            $this->route = explode("/", $key);
            $this->sanitize();
            if($this->isEqual()){
                if($this->compare()){
                    $this->invoke();
                    exit;
                }
            }
        }
        echo "Error 404";
    }

    //IsEqual verifie que la longueur de la route testé est egal a la longueur de l'uri
    private function isEqual(){
        if(sizeof($this->route) == sizeof($this->uri)){
            return true;
        } else {
            return false;
        }
    }

    //getValue Recupere le controller et la fonction lié a la route testé
    private function getValue($value){
        if(is_array($value)){
            foreach($value as $method => $controller){
                if($method == $_SERVER['REQUEST_METHOD']){
                    return explode(':', $controller);
                }
            }
        } else {
            return explode(":", $value);
        }
    }

    //addArgument recupere tout les argument de la route testé
    private function addArgument($index){
        if($this->route[$index] == "(:)"){
            array_push($this->args, $this->uri[$index]);
        }
    }

    //compare sert a comparer si la route testé est bien la meme que l'uri
    private function compare(){
        foreach($this->route as $key => $value){
            if($value != $this->uri[$key]){
                if($value == "(:)"){
                    $this->addArgument($key);
                } else {
                    return false;
                }
            }
        }
        return true;
    }

    //invoke sert a appeller le controller ainsi que sont action en faisant passer les arguments si il y en a
    private function invoke(){
        $ctrl = $this->controller[0];
        $action = $this->controller[1];
        $controller = new $ctrl();
        if(!empty($this->args)){
            $args = implode($this->args, ',');
            $controller->$action($args);
        } else {
            $controller->$action();
        }
    }

    //sanitize sert a rendre les route plus propre en retirant les entré vide du tableau
    private function sanitize(){
        foreach($this->route as $key => $value){
            if($value == ""){
                unset($this->route[$key]);
            }
        }
        foreach($this->uri as $key => $value){
            if($value == ""){
                unset($this->uri[$key]);
            }
        }
    }
}