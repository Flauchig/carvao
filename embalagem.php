<?php
require_once("config.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">


    <title>Embalagem</title>

    <script type="text/javascript" language="javascript">
        function valida_exc() {
            var retorno = confirm('Confirma exclusão do registro?');

            return (retorno);
        }
    </script>

    <style type="text/css">
        body {
            background-image: url("imagens/carvao-mineral.png");
            background-repeat: no-repeat;
            background-size: 100%;
            color: #FFFFFF;
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
            text-align: center;
            position: absolute;
            background-color: #2A2A2A;
            font-family: 'Inter';
            font-style: normal;
            font-weight: 400;
            font-size: 25px;
            line-height: 15px;
            color: #FFFFFF;
            width: 65%;




            position: absolute;
            top: 15%;
            left: 17%;
            transform: translate(-15, -15%);
            border-radius: 5px;

        }

        .logo_titulo {
            position: absolute;
            width: 7%;
            background: #EBCA57;
            border-radius: 5px;
            left: 5%;
            bottom: 15%;
        }

        .container {
            background-color: #2A2A2A;


            border-radius: 5px;

        }

        .btn_editar {
            text-decoration: none;
            background-color: yellow;
            color: #2A2A2A;
            border-radius: 5px;
            appearance: button;
            padding: 5px 10px;


        }

        .btn_excluir {
            text-decoration: none;
            background: red;
            color: #2A2A2A;
            border-radius: 5px;
            appearance: button;
            padding: 5px 10px;
            color: #FFFFFF;
        }
        th{
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>LOGO</h1>
        <a class="pedido_header" href="pedido_lista.php">Pedidos</a>
        <a class="estoque_header" href="embalagem.php">Estoque</a>
        <a class="cadastro_header" href="index.php">Cadastro</a>

    </header>
    <br><br><br><br><br>
    <div class="box">
        <fieldset>
            <img src="imagens/preparar.png" class="logo_titulo">
            <h1>Lista de Embalagens</h1>
    </div>
    <br><br><br><br>
    <div class="container" role="main">

        <div>

            <button type="button" class="btn btn-xs btn-primary" onclick="location.href='embalagem_editar.php'">Novo Cadastro</button>
            <br><br>
            </fieldset>
        </div>


        <div class="container">
            <table width="100%">
                <tr>
                    <th>ID</th>
                    <th>Tamanho em KG</th>

                    <th>Estoque atual</th>
                    <th>Estoque mínimo</th>
                    <th>valor</th>
                    <th>marca</th>
                    <th></th>
                </tr>

        </div>

        <?php
        $x = 0;

        $sql = "SELECT
                idembalagem,
                tamanho,
                estoque_ideal,
                estoque_minimo,
                valor,
                marca
                FROM embalagem";



        //executa a consulta e transforma em uma matriz $resultado
        $resultado = mysqli_query($conexao, $sql);

        //percorre a matriz, extraindo a linha de cima a cada iteração e adiciona uma linha na tabela
        while ($dados = mysqli_fetch_array($resultado)) {
            //incrementa o contador de registros
            $x++;


            $idembalagem = $dados['idembalagem'];
            $tamanho = $dados['tamanho'];
            $estoque_ideal = $dados['estoque_ideal'];
            $estoque_minimo = $dados['estoque_minimo'];
            $valor = $dados['valor'];
            $marca = $dados['marca'];



            echo "<tr>
                <td align='center'>$idembalagem<hr></td>
                 <td align='center'>$tamanho<hr></td>
                <td align='center'>$estoque_ideal<hr></td>
                <td align='center'>$estoque_minimo<hr></td>
                <td align='center'>$valor<hr></td>
                <td align='center'>$marca<hr></td>
                <td align='center' width='160'>
                   <a class='btn_editar' href='embalagem_editar.php?idembalagem=$idembalagem'>Editar</a> 
                    <a class='btn_excluir' href='embalagem_excluir.php?idembalagem=$idembalagem' onClick='return valida_exc();'>Excluir</a>                                          
                </td>
            </tr>";
        }

        ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"> </script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#registros').DataTable({
                    "language": {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'

                    }
                });
            });
        </script>



</body>

</html>