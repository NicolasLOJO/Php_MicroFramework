<?php
class DAOFavAnn extends DAO{
    
    public function retrieve($id){
        //retourne entité
        $qb = new Query();
        $sql = $qb->table("favAnn")->select("*")->where("id = $id")->getQuery();
        $value = $qb->getValue();
        var_dump($sql);
        $db = $this->pdo;
        $rep = $db->prepare($sql);
        $rep->execute($value);
        return $rep->fetch(PDO::FETCH_ASSOC);
    }

    public function update($entity, $id){
        $qb = new Query();
        $sql = $qb->table("favAnn")->update($entity)->where("id = $id")->getQuery();
        $value = $qb->getValue();
        $db = $this->pdo;
        $req = $db->prepare($sql);
        return $req->execute($value);
    }

    public function delete($id){
        $qb = new Query();
        $sql = $qb->table("favAnn")->delete()->where("id = $id")->getQuery();
        $value = $qb->getValue();
        $db = $this->pdo;
        $req = $db->prepare($sql);
        return $req->execute($value);
        //retourne boolean
    }

    public function create($array_assoc){
        //retourne entité
        $qb = new Query();
        $sql = $qb->table("favAnn")->insert($array_assoc)->getQuery();
        $value = $qb->getValue();
        $db = $this->pdo;
        $req = $db->prepare($sql);
        $req->execute($value);
        return $this->retrieve("LAST_INSERT_ID()");
    }

    public function getAllBy($array_assoc){
        //clause where et and dans array_assoc
        $qb = new Query();
        $sql = $qb->table("favAnn")->select('*')->where($array_assoc)->getQuery();
        $value = $qb->getValue();
        $db = $this->pdo;
        $req = $db->prepare($sql);
        $req->execute($value);
        return $rep->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll(){
        $qb = new Query();
        $sql = $qb->table("favAnn")->select('*')->getQuery();
        $db = $this->pdo;
        $rep = $db->query($sql);
        var_dump($rep->fetchAll(PDO::FETCH_ASSOC));
        return $rep->fetchAll(PDO::FETCH_ASSOC);
    }
}