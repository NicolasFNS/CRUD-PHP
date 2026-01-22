<?php
require("../model/conect.php");

$excluir = filter_input(INPUT_POST, 'excluir', FILTER_VALIDATE_INT);

if (!$excluir) {
    die("ID inválido.");
}
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$stmt = $conn->prepare("DELETE FROM MinhaTabela WHERE id = ?");
$stmt->bind_param("i", $excluir);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    header("Location: ../view/index.php");
    exit;//garante que o script pare aqui após o redirecionamento
} else {
    echo "Erro ao excluir ou registro não encontrado.";
}

$stmt->close();
$conn->close();
?>