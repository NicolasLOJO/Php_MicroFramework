<?php

class UserController extends Controller {

    public function getUserId($id){
        $user = new User();
        $user->set_id($id);
        if($user->load() == false){
            echo "Utilisateur non existant";
        } else {
            $data = array("user" => $user->load());
            $this->render("liste_utilisateurs", $data);
        }
    }

    public function createUser(){
        $user = new User();
        $post = $this->inputPost();
        if($post['pass'] == $post['pass_confirm']){
            $pass = password_hash($post['pass'], PASSWORD_DEFAULT);
            $user->set_author($post['author'])->set_pass($pass)->set_signin_date("NOW()");
            var_dump($user->update());
        }
    }

    public function deleteUser($id){
        $user = new User();
        $user->set_id($id);
        if($user->load() == false){
            echo "Utilisateur non existant";
        } else {
            $user->remove();
        }
    }

    public function updateUser($id){
        $user = new User();
        $post = $this->inputPost();
        if($post['_method'] == "put"){
            $user->set_id($id)->set_author($post['author'])->set_pass($post['pass']);
            var_dump($user->update());
        }
    }
}