<?php
class Annonce extends EntityModel{

    const table = "annonce";
    
    private $id;
    private $author_id;
    private $title;
    private $description;
    private $categorie_id;
    private $region_id;
    private $price;
    private $img;
    private $created_date;


    public function __construct(){
        parent::__construct();
        $array = [
           'id' => 'id',
           'author_id' => 'author_id',
           'title' => 'title',
           'description' => 'description',
           'categorie_id' => 'categorie_id',
           'region_id' => 'region_id',
           'price' => 'price',
           'img' => 'img',
           'created_date' => 'created_date'];
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

    public function set_title($title){
        $this->title = $title;
        return $this;
    }

    public function get_title(){
        return $this->title;
    }

    public function set_description($description){
        $this->description = $description;
        return $this;
    }

    public function get_description(){
        return $this->description;
    }

    public function set_categorie_id($categorie_id){
        $this->categorie_id = $categorie_id;
        return $this;
    }

    public function get_categorie_id(){
        return $this->categorie_id;
    }

    public function set_region_id($region_id){
        $this->region_id = $region_id;
        return $this;
    }

    public function get_region_id(){
        return $this->region_id;
    }

    public function set_price($price){
        $this->price = $price;
        return $this;
    }

    public function get_price(){
        return $this->price;
    }

    public function set_img($img){
        $this->img = $img;
        return $this;
    }

    public function get_img(){
        return $this->img;
    }

    public function set_created_date($created_date){
        $this->created_date = $created_date;
        return $this;
    }

    public function get_created_date(){
        return $this->created_date;
    }


}