<?php

require_once("config.php");

if (isset($_GET['idembalagem']) && $_GET['idembalagem'] != '') {
    $sql = "SELECT
            tamanho,
            estoque_minimo,
            estoque_ideal,
            valor,
            marca
        FROM
            embalagem
        WHERE
            idembalagem = " . $_GET['idembalagem'];
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $dados = mysqli_fetch_array($resultado);
        $idembalagem = $_GET['idembalagem'];
        $tamanho = $dados['tamanho'];
        $estoque_minimo = $dados['estoque_minimo'];
        $estoque_ideal = $dados['estoque_ideal'];
        $valor = $dados['valor'];
        $marca = $dados['marca'];
    } else {
        $idembalagem = "";
        $tamanho = "";
        $estoque_minimo = "";
        $estoque_ideal = "";
        $valor = "";
        $marca = "";
    }
} else {
    $idembalagem = "";
    $tamanho = "";
    $estoque_minimo = "";
    $estoque_ideal = "";
    $valor = "";
    $marca = "";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <title>Embalagem</title>


    <style type="text/css">
        body {
            background-image: url("imagens/carvao-mineral.png");
            background-repeat: no-repeat;
            background-size: 105%;
            color: #FFFFFF;
        }

        fieldset {
            border-radius: 15px;
            top: 50px;
            border: none;

            background-color: #2A2A2A;
        }

        form {
            background-color: #2A2A2A;
            border-radius: 10px;
            margin-bottom: 10px;

        }



        .header {

            position: absolute;
            background: #2A2A2A;
            width: 100%;


        }

        .pedido_header {

            position: absolute;
            width: 54px;
            height: 15px;
            left: 850px;
            top: 30px;
            text-decoration: none;



            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 25px;
            line-height: 12px;


            color: #FFFFFF;
        }

        .estoque_header {
            position: absolute;
            width: 54px;
            height: 15px;
            left: 700px;
            top: 30px;
            text-decoration: none;



            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 25px;
            line-height: 12px;


            color: #FFFFFF;

        }

        .cadastro_header {
            position: absolute;
            width: 54px;
            height: 15px;
            left: 1000px;
            top: 30px;
            text-decoration: none;



            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 25px;
            line-height: 12px;


            color: #FFFFFF;

        }

        .box {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            border-radius: 15px;

        }

        .box_titulo {
            text-align: center;
            position: absolute;
            background-color: #2A2A2A;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 30px;
            line-height: 15px;
            color: #FFFFFF;
            width: 65%;



            position: absolute;
            top: 25%;
            left: 17%;
            transform: translate(-15, -15%);
            border-radius: 5px;






        }

        .logo_cadastro {
            position: absolute;
            width: 7%;
            background: #EBCA57;
            border-radius: 5px;
            left: 5%;
            bottom: 15%;




        }

        .tamanho {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 10%;
            top: 25px;

        }

        .estoque_minimo {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 60%;
            top: 25px;

        }

        .estoque_atual {

            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 35%;
            top: 25px;

        }

        .valor {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 35%;
            top: 90px;
        }

        .marca {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 10%;
            top: 90px;
        }

        .btn_salvar {
            position: absolute;
            width: 127px;
            height: 40px;
            bottom: 20px;
            left: 35%;
            background: yellow;
            border-radius: 10px;
        }

        .btn_limpar {
            position: absolute;
            width: 127px;
            height: 40px;
            bottom: 20px;
            left: 50%;
            background: red;
            border-radius: 10px;
            color: #FFFFFF;

        }
    </style>
</head>


<body>
    <header class="header">
        <h1>LOGO</h1>
        <a class="pedido_header" href="pedido_lista.php">Pedidos</a>
        <a class="estoque_header" href="embalagem.php">Estoque</a>
        <a class="cadastro_header" href="index.php">Clientes</a>

    </header>

    <div class="box_titulo">
        <fieldset class="fieldset_titulo">

            <img class="logo_cadastro" src="imagens/entrega-de-pedido.png">
            <label class="cadastro_titulo">
                Embalagem
            </label>
        </fieldset>

    </div>
    <div class="box">

        <form action="embalagem_salvar.php" method="POST">
            <fieldset>
                <br><br>
                <input type="hidden" name="idembalagem" value="<?php echo $idembalagem; ?>">
                <div class="tamanho">
                    <label>Tamanho</label>
                    <input type="text" name="tamanho" maxlength="45" value="<?php echo $tamanho; ?>">
                </div>
                <br>
                <br>
                <div class="estoque_minimo">
                    <label>Estoque mínimo</label>
                    <input type="text" name="estoque_minimo" maxlength="5" value="<?php echo $estoque_minimo; ?>">
                </div>
                <br>
                <br>
                <div class="estoque_atual">
                    <label>Estoque Atual</label>
                    <input type="text" name="estoque_ideal" maxlength="10" value="<?php echo $estoque_ideal; ?>">
                </div>
                <br>
                <br>
                <div class="valor">
                    <label>Valor</label>
                    <input type="text" name="valor" maxlength="45" value="<?php echo $valor; ?>">
                </div>
                <br>
                <div class="marca">

                    <label>Marca</label>
                    <input type="text" name="marca" maxlength="45" value="<?php echo $marca; ?>">
                </div>
                <br>
                <br>

                <div>
                    <input type="submit" value="Salvar" class="btn_salvar">
                    <input type="reset" value="Limpar" class="btn_limpar">
                </div>
            </fieldset>
        </form>

    </div>
</body>

</html>