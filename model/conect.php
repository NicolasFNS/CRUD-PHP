<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtosDB";

//conecta ao servidor
$conn = new mysqli($servername, $username, $password);
/*
o MySQL já pede para abrir a conexão apontando para produtosDB,
(antes eram usadas as variáveis $_POST que podiam continuar vazias pelo código por terem o valor usado diretamente)
agora se esse banco não existe ainda, o MySQL retorna imediatamente o erro Unknown database 'produtosdb'
por isso é selecionado o banco recém-criado em "$conn->select_db($dbname);" mais abaixo
*/

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//cria o banco se não existir
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

//seleciona o banco
$conn->select_db($dbname);

//cria a tabela se não existir
$sql = "CREATE TABLE IF NOT EXISTS MinhaTabela (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    descricao TEXT
)";
$conn->query($sql);

return $conn;
?>
