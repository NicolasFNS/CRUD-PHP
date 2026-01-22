<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <h1>Adicionar Novo Produto</h1>
    <form class="form" action="../controller/save.php" method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required><br>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" required>
        <br>

        <label>Descrição:</label>
        <textarea name="descricao" required></textarea>
        <br>
        <button type="submit">Salvar Produto</button>
        <br><br>
    </form>

    <h1>Excluir Produto por ID</h1> 
    <!--mais fácil criar um form por tipo de botão de envio-->
    <form class="form" action="../controller/exclude.php" method="POST">
        <label>ID:</label> 
        <input type="number" name="exclusao" step="1" required> 
        <input type="submit" value="Apagar por ID"/> 
    </form>

    <table>
        <tr>
            <?php include("../model/list.php"); ?>
        </tr>
    </table>
    
    
</body>
</html>