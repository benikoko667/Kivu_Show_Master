<?php

    try{
        $acces = new pdo('mysql:host=localhost;dbname=spectacle;charset=utf8','root','');
        $acces->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch(Exception $e) {
        $e->getMessage();
    }
    
?>