<?php
class Favori extends EntityModel{

    const table = "favori";
    
    private $id;
    private $author_id;
    private $annonce_id;
    private $post_id;


    public function __construct(){
        parent::__construct();
        $array = [
           'id' => 'id',
           'author_id' => 'author_id',
           'annonce_id' => 'annonce_id',
           'post_id' => 'post_id'];
    }

    public function set_id($id){
        $this->id = $id;
        return $this;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_author_id($author_id){
        $this->author_id = $author_id;
        return $this;
    }

    public function get_author_id(){
        return $this->author_id;
    }

    public function set_annonce_id($annonce_id){
        $this->annonce_id = $annonce_id;
        return $this;
    }

    public function get_annonce_id(){
        return $this->annonce_id;
    }

    public function set_post_id($post_id){
        $this->post_id = $post_id;
        return $this;
    }

    public function get_post_id(){
        return $this->post_id;
    }


}