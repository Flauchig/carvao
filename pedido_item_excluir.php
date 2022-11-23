<?php
if (isset($_GET['idpedido_item'] )) {
    include_once("config.php");

    $idpedido_item = $_GET['idpedido_item'];

    $sql = "SELECT
                embalagem_idembalagem,
                qtd
            FROM
                pedido_item 
                            where
                idpedido_item = $idpedido_item";
                 $resultado = mysqli_query($conexao, $sql);
                 $dados = mysqli_fetch_array($resultado);
                 $embalagem_idembalagem = $dados['embalagem_idembalagem'];
                 $qtd = $dados ['qtd'];
              


    $sql = "SELECT
        estoque_ideal
       
            FROM
            embalagem
            WHERE
                idembalagem = $embalagem_idembalagem";

    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
    $estoque_ideal = $dados['estoque_ideal'];
    $estoque_ideal += $qtd;


    mysqli_query($conexao, "UPDATE embalagem SET estoque_ideal = $estoque_ideal WHERE idembalagem = $embalagem_idembalagem ");


    if ($resultado->num_rows > 0) {

        $sql_select = " DELETE FROM
        pedido_item 
        
    where
        idpedido_item = $idpedido_item";
        
  

        $result_delete = $conexao->query($sql_select);
    }

    header("location: pedido_item.php?idpedido_item=$idpedido_item");
}
