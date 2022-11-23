<?php
    require_once("config.php");

    $idpedido = $_POST['idpedido'];
    $idembalagem = $_POST['idembalagem'];
    $qtd = $_POST['qtd'];

    $sql = "insert into pedido_item (
            pedido_idpedido,
            embalagem_idembalagem,
            qtd)
        values (
            $idpedido,
            $idembalagem,
            $qtd)";
       
          

    if (mysqli_query($conexao, $sql)) {
        $sql = "SELECT
            estoque_ideal
           
                FROM
                embalagem
                WHERE
                    idembalagem = $idembalagem";

            $resultado = mysqli_query($conexao, $sql);
            $dados = mysqli_fetch_array($resultado);
            $estoque_ideal = $dados ['estoque_ideal'];
            $estoque_ideal -= $qtd;

      
        mysqli_query($conexao, "UPDATE embalagem SET estoque_ideal = $estoque_ideal WHERE idembalagem = $idembalagem ");
        header("location: pedido_item.php?idpedido=$idpedido");
    }
    else {
        header("location: pedido_item.php?idpedido=$idpedido&erro=1");
        //se der erro mostra o sql executado e o erro
        //echo $sql . "; " . mysqli_error($conexao);
    }
