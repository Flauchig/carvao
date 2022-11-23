<?php
ini_set('display_errors', '0');

include_once('config.php');
if (isset($_POST['submit'])) {
    //  print_r($_POST['nome']); 
    //print_r($_POST['telefone']); 
    //print_r($_POST['cpf_cnpj']); 
    //print_r($_POST['cep']);
    //print_r($_POST['cidade']); 
    //print_r($_POST['bairro']); 
    //print_r($_POST['complemento']); 
    $idcliente = $_POST['idcliente'];
    $nome = $_POST['nome'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    if ($idcliente == '') {
        $result = mysqli_query($conexao, "INSERT INTO cliente(nome,cpf_cnpj,telefone,cep,cidade,bairro,complemento) VALUES('$nome' , '$cpf_cnpj' , '$telefone', '$cep','$cidade' ,'$bairro','$complemento' ) ");
        header("location: formulario.php");
    } else {
        $result = mysqli_query($conexao, "UPDATE cliente  SET nome= '$nome',cpf_cnpj= '$cpf_cnpj',telefone = '$telefone',cep = '$cep',cidade = '$cidade',bairro = '$bairro',complemento = '$complemento'  WHERE idcliente = $idcliente ");
        # aqui usei para validar meus dados ver se estava funcionando.!!! 
        //echo "UPDATE cliente  SET nome= '$nome',cpf_cnpj= '$cpf_cnpj',telefone = '$telefone',cep = '$cep',cidade = '$cidade',bairro = '$bairro',complemento = '$complemento'  WHERE idcliente = $idcliente ";
    }
} else {
    $idcliente = '';
    $nome = '';
    $cpf_cnpj = '';
    $telefone = '';
    $cep = '';
    $cidade = '';
    $bairro = '';
    $complemento = '';
}

if (isset($_GET['idcliente'])) {
    $idcliente = $_GET['idcliente'];
    $sql = "SELECT nome,cpf_cnpj,telefone,cep,cidade,bairro,complemento FROM cliente WHERE idcliente = $idcliente";
    $result = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($result);
    $nome = $dados['nome'];
    $cpf_cnpj = $dados['cpf_cnpj'];
    $telefone = $dados['telefone'];
    $cep = $dados['cep'];
    $cidade = $dados['cidade'];
    $bairro = $dados['bairro'];
    $complemento = $dados['complemento'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <title>Cadastro de clientes</title>

    <style type="text/css">
        body {
            background-image: url("imagens/carvao-mineral.png");
            background-repeat: no-repeat;
            background-size: 105%;
            color: #FFFFFF;
        }

        label {
            color: white;
        }


        fieldset {
            border-radius: 15px;
            top: 50px;
            border: none;
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
            margin-top: 60px;
            width: 80%;
            border-radius: 15px;
         


        }

        .fieldset_titulo {
            border-color: white;
        }

        .cadastro_nome {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 10%;
            top: 42px;

        }

        .cadastro_cpf_cnpj {

            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 40%;
            top: 42px;


        }

        .cadastro_telefone {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 10%;
            top: 32%;

        }

        .cadastro_cep {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 70%;
            top: 42px;


        }

        .cadastro_cidade {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 70%;
            top: 32%;

        }

        .cadastro_bairro {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 40%;
            top: 32%;

        }

        .cadastro_complemento {
            position: absolute;
            width: 216px;
            border-radius: 10px;
            text-align: center;
            left: 40%;
            top: 50%;

        }

        .btn_enviar {
            position: absolute;
            width: 127px;
            height: 40px;
            bottom: 50px;
            left: 35%;
            background: yellow;
            border-radius: 10px;
        }

        .btn_voltar {
            position: absolute;
            width: 127px;
            height: 40px;
            bottom: 50px;
            left: 50%;
            background: red;       
            border-radius: 10px;
            color: white;
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
    <br><br>
    <br><br><br>

    <div class="box_titulo">
        <fieldset class="fieldset_titulo">

            <img class="logo_cadastro" src="imagens/aperto-de-mao.png">
            <label class="cadastro_titulo">
                Cadastro de Clientes
            </label>
        </fieldset>

    </div>

    <div class="box">
        <br>
        <fieldset>
            <form action="formulario.php" method="POST">
                <fieldset>
                    <br>
                    <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $idcliente; ?>">
                    <div class="cadastro_nome">
                        <label for="nome" class="nome_texto">Nome ou Razão Social </label>
                        <br>
                        <input type="text" name="nome" id="nome" class="nome_campo" required value="<?php echo $nome; ?>">
                    </div>
                    <br><br>
                    <div class="cadastro_cpf_cnpj">
                        <label for="cpf_cnpj" class="labelInput">CPF ou CNPJ </label>
                        <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="inputuser" maxlength="18" required value="<?php echo $cpf_cnpj; ?>">
                    </div>
                    <br><br>
                    <div class="cadastro_telefone">
                        <label for="telefone" class="labelInput">Telefone</label>
                        <input type="tel" name="telefone" id="telefone" class="inputuser" required value="<?php echo $telefone; ?>">
                    </div>
                    <br><br>
                    <div class="cadastro_cep">
                        <label for="cep" class="labelInput">CEP </label>
                        <input type="text" name="cep" id="cep" class="inputuser" maxlength="8" required value="<?php echo $cep; ?>">
                    </div>
                    <br><br>
                    <div class="cadastro_cidade">
                        <label for="cidade" class="labelInput">Cidade </label>
                        <input type="text" name="cidade" id="cidade" class="inputuser" required value="<?php echo $cidade; ?>">
                    </div>
                    <br><br>
                    <div class="cadastro_bairro">
                        <label for="bairro" class="labelInput">Bairro </label>
                        <input type="text" name="bairro" id="bairro" class="inputuser" required value="<?php echo $bairro; ?>">
                    </div>
                    <br><br>
                    <div class="cadastro_complemento">
                        <label for="complemento" class="labelInput">Complemento </label>
                        <input type="text" name="complemento" id="complemento" class="inputuser" required value="<?php echo $complemento; ?>">
                    </div>
                    <br><br>

                    <div>
                        <input type="submit" name="submit" id="submit" class="btn_enviar">
                        <input type="button" class="btn_voltar" onclick="location.href='index.php'" value="Voltar">
                    </div>


                </fieldset>

            </form>


    </div>

</body>

</html>