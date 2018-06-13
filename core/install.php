<?php

class install {

    private $config;
    private $pdo;

    public function __construct(){
        $this->config = json_decode(file_get_contents("./config/install.json"), true);
        $this->pdo = Database::connect();
    }

    public function install(){
        if($this->config['install'] == "on"){
            if(!empty($this->config['dbname'])){
                $db = $this->pdo;
                $sql = "SHOW TABLES FROM ".$this->config['dbname'];
                $rep = $db->query($sql);
                $table = $rep->fetchAll(PDO::FETCH_COLUMN);
                $this->createEntity($table);
            } else {
                echo "La table n'est pas défini dans le fichier /config/install.json";
            }
        } else {
            echo "Installation déjà faite ou /config/install.json reglé sur off";
        }
    }

    private function createEntity($array_table){
        $error = 0;
        foreach($array_table as $key => $value){
            //var_dump(ucfirst($value));
            $name = ucfirst($value);
            if(!file_exists("./models/$name.php")){
                DAOGenerating::generate("DAO$name", $value);
                $modelGenerate = fopen("./models/$name.php", "w");
                $model =
//*********************************************************************//             
'<?php
class '.$name.' extends EntityModel{

    const table = "'.$value.'";
    
'.$this->createAttr($value).'

    public function __construct(){
        parent::__construct();
        $array = [
'.$this->createConstruct($value).'
    }

    public function hydrate($array){
        foreach($array as $key => $value){
            $setter = "set_$key";
            $this->$setter($value);
        }
        return $this;
    }

'.$this->createFunction($value).'
}';
//*********************************************************************//
                fwrite($modelGenerate, $model);
                //var_dump($model);
                echo "Le model $name a été créer avec succès<br>";
            } else {
                echo "Impossible de créer le model $name.php (déjà existant)<br>";
                $error++;
            }
        }
        if($error == 0){
            echo "<br>L'installation c'est terminé sans erreur";
        } else {
            echo "<br>L'installation c'est terminé avec $error erreur(s)";
        }

    }

    private function createAttr($value){
        $db = $this->pdo;
        $sql = "SHOW FIELDS FROM $value";
        $rep = $db->query($sql);
        $attr = "";
        foreach($rep->fetchAll(PDO::FETCH_COLUMN) as $key => $value){
            $attr .= 
//***********************************************************************/
'    private $'.$value.';
';
//***********************************************************************/
        }
        return $attr;
    }

    private function createConstruct($value){
        $db = $this->pdo;
        $sql = "SHOW FIELDS FROM $value";
        $rep = $db->query($sql);
        $constructor = "";
        $array = $rep->fetchAll(PDO::FETCH_COLUMN);
        foreach($array as $key => $value){
            if(end($array) == $value){
                $constructor .= 
//***********************************************************************/
"           '$value' => '$value'];";
//***********************************************************************/
            } else {
                $constructor .= 
//***********************************************************************/
"           '$value' => '$value',
";
//***********************************************************************/
            }
        }
        return $constructor;
    }

    private function createFunction($value){
        $db = $this->pdo;
        $sql = "SHOW FIELDS FROM $value";
        $rep = $db->query($sql);
        $myFunction = "";
        $array = $rep->fetchAll(PDO::FETCH_COLUMN);
        foreach($array as $key => $value){
            $myFunction .= 
/************************************************************************/
'    public function set_'.$value.'($'.$value.'){
        $this->'.$value.' = $'.$value.';
        return $this;
    }

    public function get_'.$value.'(){
        return $this->'.$value.';
    }

';
/************************************************************************/
        }
        return $myFunction;
    }
}