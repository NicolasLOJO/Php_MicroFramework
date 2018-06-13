<?php
class Comments extends EntityModel{

    const table = "comments";
    
    private $id;
    private $author;
    private $comment;
    private $comment_date;
    private $billet_id;


    public function __construct(){
        parent::__construct();
        $array = [
           'id' => 'id',
           'author' => 'author',
           'comment' => 'comment',
           'comment_date' => 'comment_date',
           'billet_id' => 'billet_id'];
    }

    public function hydrate($array){
        foreach($array as $key => $value){
            $setter = "set_$key";
            $this->$setter($value);
        }
        return $this;
    }

    public function set_id($id){
        $this->id = $id;
        return $this;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_author($author){
        $this->author = $author;
        return $this;
    }

    public function get_author(){
        return $this->author;
    }

    public function set_comment($comment){
        $this->comment = $comment;
        return $this;
    }

    public function get_comment(){
        return $this->comment;
    }

    public function set_comment_date($comment_date){
        $this->comment_date = $comment_date;
        return $this;
    }

    public function get_comment_date(){
        return $this->comment_date;
    }

    public function set_billet_id($billet_id){
        $this->billet_id = $billet_id;
        return $this;
    }

    public function get_billet_id(){
        return $this->billet_id;
    }


}