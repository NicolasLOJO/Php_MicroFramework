<?php

interface CRUDInterface {

    public function retrieve($id);

    public function update($entity, $id);

    public function delete($id);

    public function create($array_assoc);

}