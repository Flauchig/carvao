<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword= "1223batma";
$dbName = "carvao";

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
/* if ($conexao->connect_errno){
     echo "Error connecting";
 }
 else {
        echo "deu bom "; 
 }*/