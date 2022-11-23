<?php
require_once('config.php');
if (!isset($_GET['idpedido']) || $_GET['idpedido'] == '') {
    header("location: pedido_lista.php");
}

$result = "SELECT
date_format( p.data ,'%d/%m/%Y')           AS data,
date_format ( p.data_entrega , '%d/%m/%Y' )    AS data_entrega,
date_format( p.data_pagamento , '%d/%m/%Y')  AS data_pagamento,
c.nome           AS nome  
FROM
pedido p 
LEFT JOIN cliente c ON c.idcliente = p.cliente_idcliente
WHERE
p.idpedido = " . $_GET['idpedido'];

$resultado_banco = mysqli_query($conexao, $result);
$dados = mysqli_fetch_array($resultado_banco);
$idpedido = $_GET['idpedido'];
$data = $dados['data'];
$data_entrega = $dados['data_entrega'];
$data_pagamento = $dados['data_pagamento'];
$nome = $dados['nome'];


?>


<script type="text/javascript" language="javascript">
    function valida_exc() {
        var retorno = confirm('Confirma exclusão do registro?');

        return (retorno);
    }
</script>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <title> Detalhe dos Pedidos </title>

    <style type="text/css">
        header {

            position: absolute;
            background: #2A2A2A;
            width: 80%;


        }

        body {
            background-image: url("imagens/carvao-mineral.png");
            background-repeat: no-repeat;
            background-size: 105%;
            color: #FFFFFF;
        }

        fieldset {
            border-radius: 15px;
          
            border: none;

            background-color: #2A2A2A;
        }
        h3{
            color: #FFFFFF;
            top: 15px;
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
            top: 20%;
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
            width: 80%;
            border-radius: 15px;

        }

        .btn_salvar{
            text-decoration: none;
            background-color: yellow;
            color: #2A2A2A;
            border-radius: 5px;
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
        
    </style>

</head>

<body>
    <header class="header">
        <h1>LOGO</h1>
        <a class="pedido_header" href="pedido_lista.php">Pedidos</a>
        <a class="estoque_header" href="embalagem.php">Estoque</a>
        <a class="cadastro_header" href="index.php">Cadastro</a>
</header>
    <br><br><br>

    <div class="box_titulo">
        <fieldset class="fieldset_titulo">

            <img class="logo_cadastro" src="imagens/arquivo.png">
            <label class="cadastro_titulo">
                Detalhe do Pedido
            </label>
        </fieldset>

    </div>
  
    <div class="box">
        <br><br><br><br><br>
        <div class="box_detalhe ">
        
            <fieldset>
        
            <label class="data">Data : </label><?php echo $data; ?>
            <br><br>
            <label class="data_entrega">Data de Entrega: </label><?php echo $data_entrega ?><br />
            <br><br>
            <label class="data_pagamento">Data de Pagamento:</label><?php echo $data_pagamento ?><br />
            <br><br>
            <label class="cliente">cliente:</label><?php echo $nome; ?><br />
        
          
            <h3>Itens</h3>

        <form action="pedido_item_salvar.php" method="POST">
            
            <input type="hidden" name="idpedido" value="<?php echo $idpedido; ?>" />
            <label>Quantidade</label>
            <br>
            <input type="text" name="qtd" />
            <select name="idembalagem">
                <option value="">--Selecione uma Embalagem--</option>
                <?php
                $sql_temp = "SELECT
                idembalagem,
                tamanho,
                marca
                    FROM
                    embalagem
                        ORDER BY
                        tamanho";
                $resultado_temp = mysqli_query($conexao, $sql_temp);
                while ($dados_temp = mysqli_fetch_array($resultado_temp)) {
                    $idembalagem = $dados_temp['idembalagem'];
                    $tamanho = $dados_temp['tamanho'];
                    $marca = $dados_temp['marca'];


                    echo "<option value='$idembalagem'>$tamanho - $marca</option>";
                }

                ?>


            </select>

            <br><br>
            <input type="submit" class="btn_salvar" value="Salvar">
        </form>

        <table width="100%">
            <tr>
                <th>ID</th>
                <th>Tamanho</th>
                <th>Marca</th>
                <th>valor</th>
                <th>Quantidade</th>
                <th></th>
            </tr>

            <?php
            //inicializa o contador de registros
            $x = 0;

            $sql = "SELECT
                pi.idpedido_item,
                e.tamanho,
                e.marca,
                e.valor,
                pi.qtd
            FROM
                pedido_item pi
                left join embalagem e on e.idembalagem = pi.embalagem_idembalagem
            where
                pi.pedido_idpedido = $idpedido
            order by
                pi.idpedido_item";

            //executa a consulta e transforma em uma matriz $resultado
            $resultado = mysqli_query($conexao, $sql);

            //percorre a matriz, extraindo a linha de cima a cada iteração e adiciona uma linha na tabela
            while ($dados = mysqli_fetch_array($resultado)) {
                //incrementa o contador de registros
                $x++;

                $idpedido_item = $dados['idpedido_item'];
                $tamanho = $dados['tamanho'];
                $marca = $dados['marca'];
                $qtd = $dados['qtd'];
                $valor = $dados['valor'] * $qtd;

                //alterna as cores conforme o resto da divisão do X por 2
                echo "<tr>
                    <td align='center'>$idpedido_item</td>
                    <td align='center'>$tamanho KG</td>
                    <td align='center'>$marca</td>
                    <td align='center'> R$ $valor</td>
                    <td align='center'>$qtd</td>
                    <td align='center' width='60'>
                        <a class='btn_excluir' href='pedido_item_excluir.php?idpedido_item=$idpedido_item&idpedido=$idpedido' onClick='return valida_exc();'>Excluir</a>
                    </td>
                </tr>";
            }

            ?>

        </table>
            </fieldset>
        </div>


     


        

    </div>



</body>

</html>