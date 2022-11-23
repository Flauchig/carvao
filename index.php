<?php
include_once("config.php");
$result = "SELECT * FROM cliente";
$resultado_banco = mysqli_query($conexao, $result);


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listagem</title>

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            background-image: url("imagens/carvao-mineral.png");
            background-repeat: no-repeat;
            background-size: 100%;
            color: #FFFFFF;
        }

        thead {
            color: #FFFFFF;
        }

        table {




            border-radius: 15px;
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

        .table {
            top: 500px;
          

            color: #FFFFFF;
        }

        .container {
            background-color: #2A2A2A;
            
          
            border-radius: 5px;

        }
    </style>
</head>

<body>
    <header class="header">
        <h1>LOGO</h1>
        <a class="pedido_header" href="pedido_lista.php">Pedidos</a>
        <a class="estoque_header" href="embalagem.php">Estoque</a>
        <a class="cadastro_header" href="home.php">Cadastro</a>

    </header>
    <br><br><br><br><br>

    <div class="box">
        <fieldset>
            <img src="imagens/visualizador-de-dados.png" class="logo_titulo">
            <h1>Listar Clientes</h1>
        </div>
        <br><br><br><br>
    <div class="container" role="main">
       
        <div>

            <button type="button" class="btn btn-xs btn-primary" onclick="location.href='formulario.php'">Novo Cadastro</button>
            <br><br>
            </fieldset>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table " id="registros">
                    <thead>
                        <tr>
                            <th>Nome ou Razão Social</th>
                            <th>CPF ou CNPJ</th>
                            <th>telefone</th>
                            <th>CEP</th>
                            <th>Cidade</th>
                            <th>Bairro</th>
                            <th>Complemento</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($tabela_cliente = mysqli_fetch_assoc($resultado_banco)) { ?>
                            <tr>
                                <td><?php echo $tabela_cliente['nome']; ?></td>
                                <td><?php echo $tabela_cliente['cpf_cnpj']; ?></td>
                                <td><?php echo $tabela_cliente['telefone']; ?></td>
                                <td><?php echo $tabela_cliente['cep']; ?></td>
                                <td><?php echo $tabela_cliente['cidade']; ?></td>
                                <td><?php echo $tabela_cliente['bairro']; ?></td>
                                <td><?php echo $tabela_cliente['complemento']; ?></td>
                                <td>

                                    <button type="button" class="btn btn-xs btn-warning" onclick="location.href='formulario.php?idcliente=<?php echo $tabela_cliente['idcliente']; ?>'">Editar</button>
                                    <button type="button" class="btn btn-xs btn-danger" onclick="location.href='deletar.php?idcliente=<?php echo $tabela_cliente['idcliente']; ?>'">Apagar</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>+
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