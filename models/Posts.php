<?php
class Posts extends EntityModel{

    const table = "posts";
    
    private $id;
    private $title;
    private $content;
    private $creation_date;


    public function __construct(){
        parent::__construct();
        $array = [
           'id' => 'id',
           'title' => 'title',
           'content' => 'content',
           'creation_date' => 'creation_date'];
    }

    public function set_id($id){
        $this->id = $id;
        return $this;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_title($title){
        $this->title = $title;
        return $this;
    }

    public function get_title(){
        return $this->title;
    }

    public function set_content($content){
        $this->content = $content;
        return $this;
    }

    public function get_content(){
        return $this->content;
    }

    public function set_creation_date($creation_date){
        $this->creation_date = $creation_date;
        return $this;
    }

    public function get_creation_date(){
        return $this->creation_date;
    }


}