<?php

interface CRUDInterface {

    public function retrieve($id);

    public function update($id);

    public function delete($id);

    public function create($array_assoc);

}