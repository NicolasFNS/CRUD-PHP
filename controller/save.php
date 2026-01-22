<?php
require("../model/conect.php");

//insere dados (somente se for POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    /*o código acima equivale ao abaixo, mas é mais seguro (evita que dados brutos de $_POST sejam usados diretamente)
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
     */

    if ($nome && $preco !== false && $descricao) {
        /* 
        é $preco !== false para garantir que o filtro VALIDATE_FLOAT funcionou
        o php considera que 0.0 é "falsy" e nisso um valor 0.0 seria rejeitado se usássemos apenas "if ($preco)"
        */

        $stmt = $conn->prepare("INSERT INTO MinhaTabela (nome, preco, descricao) VALUES (?, ?, ?)");
        $stmt->bind_param("sds", $nome, $preco, $descricao);
        /*
        precisa criar uma variável como o "stmt" por que método bind_param() precisa de um objeto com declaração preparada
        "sds" indica os tipos dos parâmetros: string, double, string, as duas linhas acima evitam SQL Injection
        */

        if ($stmt->execute()) {
            echo "Registro criado com sucesso";
            header("Location: ../view/index.php");
            exit;
        } else {
            echo "Erro ao inserir: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Dados inválidos.";
    }
}

$conn->close();
?>