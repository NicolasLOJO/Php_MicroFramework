<?php

class DAOGenerating {

    public static function generate($name, $table) {
        if(!file_exists("./core/dao/$name.php")){
            $createDao = fopen("./core/dao/$name.php", "w");

        $header = '<?php
class '.$name.' extends DAO{
    
    public function retrieve($id){
        //retourne entité
        $sql = "SELECT * FROM '.$table.' WHERE id = " . $id;
        $db = $this->pdo;
        $rep = $db->query($sql);
        return $rep->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id){
        //retourne boolean
    }

    public function delete($id){
        //retourne boolean
    }

    public function create($array_assoc){
        //retourne entité
    }

    public function getAllBy($array_assoc){
        //clause where et and dans array_assoc
    }

    public function getAll(){
        $sql = "SELECT * FROM '.$table.'";
        $db = $this->pdo;
        $rep = $db->query($sql);
        return $rep->fetchAll(PDO::FETCH_ASSOC);
    }
}';

        fwrite($createDao, $header);
        }
    }

}