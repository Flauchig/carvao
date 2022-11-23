<?php


if (isset($_GET['idembalagem'])) {
    include_once("config.php");

    $id =$_GET['idembalagem'];

    $sql_select = "SELECT * FROM embalagem WHERE idembalagem = $id";

    $result = $conexao ->query($sql_select);

    if($result -> num_rows > 0){ 

        $sql_delete = "DELETE FROM embalagem WHERE idembalagem = $id";
        
        $result_delete = $conexao ->query($sql_delete);

    }
    
    header('location: embalagem.php');
}