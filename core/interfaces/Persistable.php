<?php

interface Persistable {
    public function load();

    public function update();

    public function remove();
}