<?php

abstract class Controller {

    private $get;
    private $post;

    public function __construct(){
        $this->get = $_GET;
        $this->post = $_POST;
    }

    protected function get_get(){
        return $this->get;
    }

    protected function get_post(){
        return $this->post;
    }

    public function render($path, $data){

    }

}