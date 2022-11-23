<?php
    
    require_once("config.php");

    $idembalagem = $_POST['idembalagem'];
    $tamanho = $_POST['tamanho'];
    $estoque_minimo = $_POST['estoque_minimo'];
    $estoque_ideal = $_POST['estoque_ideal'];
    $valor = $_POST['valor'];
    $marca = $_POST['marca'];


    if ($idembalagem == '') {
        $sql = "insert into embalagem (
                tamanho,
                estoque_minimo,
                estoque_ideal,
                valor,
                marca)
            values (
                '$tamanho',
                $estoque_minimo,
                $estoque_ideal,
                $valor,
                '$marca')";
    }
    else {
        $sql = "update embalagem  set
                tamanho = '$tamanho',
                estoque_minimo = $estoque_minimo,
                estoque_ideal = $estoque_ideal,
                valor = $valor,
                marca = '$marca'
            where
                idembalagem = $idembalagem";
    }

    if (mysqli_query($conexao, $sql)) {
        header("location: embalagem.php?erro=0");
    }
    else {
        header("location: embalagem.php?erro=1");
        //se der erro mostra o sql executado e o erro
        //echo $sql . "; " . mysqli_error($conexao);
    }
?>
