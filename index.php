<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo Dados</title>
    <link rel="shortcut icon" href="./img/base-de-dados.png">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="container">
        <div class="containerForm">
            <div class="formContent">

            <!-- O php pega os valores correspondentes de cada input pelo name deles(!!!SEMPRE que for começar um formulario usar o form)
                e o method indica o que este formulario vai fazer e o action, para onde vai nos mandar depois do submit -->
                <form action="" method="post" name="formulario">
                    <label for="nome_do_produto">Insira o nome do produto: </label>
                    <input type="text" name="nome_do_produto">
                    <br><br>
                    <label for="embalagem">Qual o tipo de embalagem?: </label>
                    <input type="text" name="embalagem">
                    <br><br>
                    <label for="codigo_do_produto">Qual o codigo do produto?: </label>
                    <input type="text" name="codigo_do_produto">
                    <br><br>
                    <button type="submit" class="envia">Cadastrar Produto</button>
                </form>
            </div>
        </div>
    </div>
    <div class="list">
        <a href="../Ex001/index.php" class="linkLista">Mostrar itens</a>
    </div>
</body>

</html>

<?php

require_once "./Class/ConexaoDB.class.php";

//Funciona praticamente do mesmo jeito quando usamos o PDO para ver os elementos

//Crio uma validação para quand houver um $_POST eu executo toda a função abaixo
if ($_POST) {

    //Variavel instanciando a conexão com o banco de dados
    $connectedDB = new ConexaoDB();


    //tente executar este codigo
    try {
        //Query onde faço a inserção de itens nos campos da Database (SET não funciona aqui!!)
        $query = 'INSERT INTO tabela_de_produtos (CODIGO_DO_PRODUTO, NOME_DO_PRODUTO, EMBALAGEM)
                  VALUES ("' . $_POST['codigo_do_produto'] . '", "' . $_POST['nome_do_produto'] . '", "' . $_POST['embalagem'] . '")';


        //Preparo o arquivo para evitar ataques e logo apos executo
        $qr = $connectedDB->conn->prepare($query);
        //Aqui sera enviado para a Database. Não é necessario usar o fetchall, pois não estou querendo ver os dados e sim adicionar
        $qr->execute();

    //caso não funcione pegue o erro e me devolva na variavel $e
    } catch (Exception $e) {
        echo "Ops, deu erro: " . $e;
    }
} else {
    
}
