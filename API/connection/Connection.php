<?php

class Connection extends Mysqli{
    function __construct(){
        parent::__construct('localhost', 'root', '','postman');
        $this->set_charset('utf8');

        $this->connect_error == NULL ? 'Conexion exitosa' : die ('ERROR EN LA CONEXION');

    }


}