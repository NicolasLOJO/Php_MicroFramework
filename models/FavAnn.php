<?php
class FavAnn extends EntityModel{

    const table = "favAnn";
    
    private $author_id;
    private $annonce_id;


    public function __construct(){
        parent::__construct();
        $array = [
           'author_id' => 'author_id',
           'annonce_id' => 'annonce_id'];
    }

    public function hydrate($array){
        foreach($array as $key => $value){
            $setter = "set_$key";
            $this->$setter($value);
        }
        return $this;
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


}