<?php
class FavPost extends EntityModel{

    const table = "favPost";
    
    private $author_id;
    private $post_id;


    public function __construct(){
        parent::__construct();
        $array = [
           'author_id' => 'author_id',
           'post_id' => 'post_id'];
    }

    public function set_author_id($author_id){
        $this->author_id = $author_id;
        return $this;
    }

    public function get_author_id(){
        return $this->author_id;
    }

    public function set_post_id($post_id){
        $this->post_id = $post_id;
        return $this;
    }

    public function get_post_id(){
        return $this->post_id;
    }


}