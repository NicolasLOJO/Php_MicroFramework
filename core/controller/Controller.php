<?php

abstract class Controller {

    private $get; //Valeur de la superglobal $_GET
    private $post; //Valeur de la superglobal $_POST

    //Initialisation des attribut get et post avec les valeur des super global
    public function __construct(){
        $this->get = $_GET;
        $this->post = $_POST;
    }

    //inputGet recupere valeur get
    protected function inputGet(){
        return $this->get;
    }

    //inputGet recupere valeur post
    protected function inputPost(){
        return $this->post;
    }

    final protected function render($path, $data = null){
        $views = "./views/$path.php";
        if($data){
            foreach($data as $key => $value){
                $$key = $value;
            }
        }
        require_once($views);
    }

}