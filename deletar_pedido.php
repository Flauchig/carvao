<?php


if (isset($_GET['idpedido'])) {
    include_once("config.php");

    $id =$_GET['idpedido'];

    $sql_select = "SELECT * FROM pedido WHERE idpedido = $id";

    $result = $conexao ->query($sql_select);
    
    
    

    if($result -> num_rows > 0){ 

        $sql_delete = "DELETE FROM pedido WHERE idpedido = $id";
        
        $result_delete = $conexao ->query($sql_delete);

    }
    
    header('location: pedido_lista.php');
}
