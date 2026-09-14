<?php
include '../../infra/conexao.php';

$id = $_GET['id'];
$cliente = $_POST['cliente'];
$produto = $_POST['produto'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "UPDATE produtos SET nome = ?, descricao = ?, preco = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdi", $nome, $descricao, $preco, $id);

    if ($stmt->execute()) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar produto: " . $stmt->error;
    }
} else {
    $sql = "SELECT * FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $produto = $result->fetch_assoc();

    if ($produto) {
        $nome = $produto['nome'];
        $descricao = $produto['descricao'];
        $preco = $produto['preco'];
    } else {
        echo "Produto não encontrado.";
        exit;
    }
}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
</head>
<body>
    <h2>Editar Produto</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
        <br><br>
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo $descricao; ?>" required>
        <br><br>
        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" value="<?php echo $preco; ?>" step="0.01" required>
        <br><br>
    </form> 
    <br>  
</body>
</html>