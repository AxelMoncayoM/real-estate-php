<?php 

    function conectar_db() : mysqli{
        $db = mysqli_connect('localhost', 'root', 'root', 'realestate_crud');

        if(!$db){
            echo "No se conecto";
            exit;
        } 

        return $db;
    }