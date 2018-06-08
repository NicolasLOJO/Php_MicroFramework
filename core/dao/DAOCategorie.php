<?php
class DAOCategorie extends DAO{
    
    public function retrieve($id){
        //retourne entité
        $sql = "SELECT * FROM categorie WHERE id = " . $id;
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
        $sql = "SELECT * FROM categorie";
        $db = $this->pdo;
        $rep = $db->query($sql);
        return $rep->fetchAll(PDO::FETCH_ASSOC);
    }
}