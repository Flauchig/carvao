<?php


if (isset($_GET['idcliente'])) {
    include_once("config.php");

    $id =$_GET['idcliente'];

    $sql_select = "SELECT * FROM cliente WHERE idcliente = $id";

    $result = $conexao ->query($sql_select);

    if($result -> num_rows > 0){ 

        $sql_delete = "DELETE FROM cliente WHERE idcliente = $id";
        
        $result_delete = $conexao ->query($sql_delete);

    }
    
    header('location: index.php');
}
