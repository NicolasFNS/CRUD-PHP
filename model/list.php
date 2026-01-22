<?php
    include("conect.php");
    $sql = "SELECT * FROM MinhaTabela";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {       
    while($row = $result->fetch_assoc()) {
        echo 
        "
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
        <td>" . htmlspecialchars($row["id"]) . "</td>
        <td>" . htmlspecialchars($row["nome"]) . "</td>
        <td>" . htmlspecialchars($row["preco"]) . "</td>
        <td>" . htmlspecialchars($row["descricao"]) . "</td>
        <td>
        <form method='post' action='../controller/delete.php'>
        <input type='hidden' name='excluir' value='" . htmlspecialchars($row["id"]) . "'/>
        <input type='submit' value='Apagar'/>
        </form>
        </td>
        </tr>";
    }
    } else {
    echo "<tr><td colspan='5'>0 resultados</td></tr>";
    }

    $conn->close();
?>