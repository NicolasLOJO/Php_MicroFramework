<?php

class ViewController extends Controller{

    public function getView(){
        $datas = array(
            "users"=> (new DAOUser())->getAll()
            );
            $this->render("liste_utilisateurs",$datas);
    }

    public function getHome(){
        $this->render("default/home");
    }
}