<?php

class ViewController extends Controller{


    public function getHome(){
        $this->render("default/home");
    }

    public function getDoc(){
        $this->render("default/doc");
    }
}