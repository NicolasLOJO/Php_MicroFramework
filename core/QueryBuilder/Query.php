<?php

class Query {

    private $query = [];
    private $table;
    private $where = [];
    private $execute = [];

    public function __construct($table = null){
        if($table){
            $this->table = $table;
        }
    }

    public function table($table){
        $this->table = $table;
        return $this;
    }

    public function select($selection){
        $sql = "SELECT ";
        if(is_array($selection)){
            $select = implode(", ", $selection);
            $sql .= "$select FROM ".$this->table."";
        } else {
            $sql .= "$selection FROM ".$this->table."";
        }
        $this->query[0] = $sql;
        return $this;
    }

    public function delete(){
        $sql = "DELETE FROM ".$this->table."";
        $this->query[0] = $sql;
        return $this;
    }

    public function insert($array_assoc){
        $val = [];
        foreach($array_assoc as $key => $value){
            if(!is_null($value)){
                $val[$key] = $value;
            }
        }
        $valueToInsert = implode(", ",array_keys($val));
        $attr = "";
        foreach($val as $key => $value){
            if($value == "NOW()" || strtolower($value) == "now"){
                $date = $key;
                if(end($val) == $value){
                    $attr .= "NOW()";
                } else {
                    $attr .= "NOW(), ";
                }
            } else {
                if(end($val) == $value){
                    $attr .= ":$key";
                } else {
                    $attr .= ":$key, ";
                }
            }
        }
        unset($val[$date]);
        $sql = "INSERT INTO ".$this->table."($valueToInsert) VALUE ($attr)";
        $this->execute = $val;
        $this->query[0] = $sql;
        return $this;
    }

    public function update($entity){
        $val = [];
        foreach($entity as $key => $value){
            if($key != 'id' && !is_null($value)){
                $val[$key] = $value;
            }
        }
        $attr = "";
        foreach($val as $key => $value){
            if($value == "NOW()" || strtolower($value) == "now"){
                $date = $key;
                if(end($val) == $value){
                    $attr .= "$key = NOW()";
                } else {
                    $attr .= "$key = NOW(), ";
                }
            } else {
                if(end($val) == $value){
                    $attr .= "$key = :$key";
                } else {
                    $attr .= "$key = :$key, ";
                }
            }
        }
        if(isset($date)){
            unset($val[$date]);
        }
        $sql = "UPDATE ".$this->table." SET $attr";
        $this->execute = $val;
        $this->query[0] = $sql;
        return $this;
    }

    public function where($where){
        $operand = [];
        $index = 0;
        if(array_key_exists(1, $this->query)){
            if(is_array($where)){
                foreach($where as $key => $value){
                    for($i = 0; $i < strlen($value); $i++){
                        if(preg_match("/(=|<|>)/", $value)){
                            array_push($operand, $value);
                        }
                    }
                }
                array_walk($where, array($this, 'value'));
            } else {
                for($i = 0; $i < strlen($where); $i++){
                    if(preg_match("/(=|<|>)/", $where[$i])){
                        array_push($operand, $where[$i]);
                    }
                }
                $test = array($where);
                array_walk($test, array($this, 'value'));
            }
            foreach($this->where as $key => $value){
                if(preg_match("/\(\)$/", $value)){
                    $sql = "AND $key $operand[$index] $value";
                } else {
                    $sql = "AND $key $operand[$index] :$key";
                }
                $index++;
            }
            $this->query[2] = $sql;
        } else {
            if(is_array($where)){
                foreach($where as $key => $value){
                    for($i = 0; $i < strlen($value); $i++){
                        if(preg_match("/(=|<|>)/", $value)){
                            array_push($operand, $value);
                        }
                    }
                }
                array_walk($where, array($this, 'value'));
            } else {
                for($i = 0; $i < strlen($where); $i++){
                    if(preg_match("/(=|<|>)/", $where[$i])){
                        array_push($operand, $where[$i]);
                    }
                }
                $test = array($where);
                array_walk($test, array($this, 'value'));
            }
            $first = current($this->where);
            foreach($this->where as $key => $value){
                if($value == $first){
                    if(preg_match("/\(\)$/", $value)){
                        $sql = "WHERE $key ".$operand[$index]." $value";
                    } else {
                        $sql = "WHERE $key ".$operand[$index]." :$key";
                    }
                } else {
                    $sql .= " AND $key ".$operand[$index]." :$key";
                }
                $index++;
            }
            $this->query[1] = $sql;
        }
        $this->execute = $this->where;
        return $this;
    }

    public function getQuery(){
        return implode(' ', $this->query);
    }

    public function getValue(){
        return $this->execute;
    }

    private function value($val, $key){
        $nums = array_map('trim', preg_split("/(=|<|>)/", $val));
        $this->where[$nums[0]] = $nums[1];
    }
}