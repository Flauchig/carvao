<?php
require_once("config.php");
if (isset($_POST['submit'])) {
    //  print_r($_POST['idcliente']); 
    //print_r($_POST['data']); 
    //print_r($_POST['data_entrega']); 
    //print_r($_POST['data_pagamamento']);
    $idcliente = $_POST['cliente'];
    $data = date("Y-m-d");
    $data_entrega = $_POST['data_entrega'];
    $data_pagamento = $_POST['data_pagamento'];

    $result = mysqli_query($conexao, "INSERT INTO pedido(data,data_entrega,data_pagamento,cliente_idcliente) VALUES('$data' , '$data_entrega' , '$data_pagamento', '$idcliente') ");
    header("location: pedido.php");


    /* echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    */
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pedidos</title>
    <style type="text/css">
        header {

            position: absolute;
            background: #2A2A2A;
            width: 100%;


        }

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

        .box {
            position: absolute;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 55%;
            border-radius: 15px;

        }

        .cliente {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 10%;
            top: 25px;

        }

        .data_entrega {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 35%;
            top: 25px;
        }

        .data_pagamento {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 60%;
            top: 25px;

        }

        .btn_enviar {
            position: absolute;
            width: 127px;
            height: 40px;
            bottom: 20px;
            left: 35%;
            background: yellow;
            border-radius: 10px;
        }

        .btn_voltar {
            position: absolute;
            width: 127px;
            height: 40px;
            bottom: 20px;
            left: 55%;
            background: red;
            border-radius: 10px;
            color: white;
        }


        .header {

            position: absolute;
            background: #2A2A2A;
            width: 100%;






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
                Cadastro de Pedidos
            </label>
        </fieldset>
          </div>
    <div class="box">
        <form action="pedido.php" method="POST">
            <fieldset>
                <div class="cliente">
                    <label for="cliente" class="LabelInput"><b>Cliente</b></label>
                    <br>
                    <select type="select" name="cliente" id="cliente" class="inputuser" required>
                        <option value=""> Selecione um Cliente </option>
                        <?php
                        $sql = "SELECT  idcliente, nome FROM cliente  ORDER BY nome";
                        $resultado = mysqli_query($conexao, $sql);
                        while ($dados = mysqli_fetch_array($resultado)) {
                            $idcliente = $dados['idcliente'];
                            $nome = $dados['nome'];
                            echo "<option value = '$idcliente'>$nome</option>";
                        }
                        ?>
                    </select>
                </div>
                <br>
                <div class="data_entrega">
                    <label for="data_pagamento"><b>Data de Entrega </b></label>
                    <input type="date" name="data_entrega" id="data_entrega" class="inputuser" value="<?php echo date('d/m/y'); ?>" required>

                </div>
                <br><br><br><br><br>
                <div class="data_pagamento">
                    <label for="data_pagamento"><b>Data de Pagamento </b></label>
                    <input type="date" name="data_pagamento" id="data_pagamento" class="inputuser" value="<?php echo date('d/m/y'); ?>" required>
                </div>
                <br>
                <div>


                    <input type="submit" name="submit" id="submit" class="btn_enviar">
                    <input type="button" class="btn_voltar" onclick="location.href='pedido_lista.php'" value="Voltar">

                </div>


            </fieldset>




        </form>


    </div>

</body>

</html>