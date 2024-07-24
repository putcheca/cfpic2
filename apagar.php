<?php
// Definições da base de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exemplo";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);
    
// Verifica concexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtem o id_pessoa da URL
$id_pessoa = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Inicializa variáveis
$nome = "";
$telefone = "";

// Busca os dados atuais da pessoa na base de dados
if ($id_pessoa > 0) {
    $sql = "SELECT nome, telefone FROM pessoas WHERE id_pessoa=$id_pessoa";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $telefone = $row["telefone"];
    } else {
        echo "registo não encontrado.";
        ecit;
    }
} else {
    echo "ID inválido.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="p-3 mb-2 bg-success text-white"> <div class="font-weight-bold">GESTÃO DE PESSOAS</div></div>
    <title>Apagar Pessoa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="listagem.php">Listagem de Pessoas<span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registar.html" target="_blank">Registar Pessoas</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">
        <h1>Apagar Pessoa</h1>
        <?php if (!empty($nome) && !empty($telefone)): ?>
        <p>Tem a certeza que deseja apagar o seguinte registo?</p>
        <div class="row">
            <div class="col-sm-3"><strong>ID:</strong></div>
            <div class="col-sm-9"><?php echo $id_pessoa; ?></div>
        </div>
            <div class="row">
            <div class="col-sm-3"><strong>Nome:</strong></div>
            <div class="col-sm-9"><?php echo htmlspecialchars($nome); ?></div>
        </div>
            <div class="row">
            <div class="col-sm-3"><strong>Telefone:</strong></div>
            <div class="col-sm-9"><?php echo htmlspecialchars($telefone); ?></div>
        </div>
        <form action="confirmar_apagar.php" method="post">
            <input type="hidden" name="id_pessoa" value="<?php echo $id_pessoa; ?>">
            <button type="submit" class="btn btn-danger">Apagar</button>
            <a href="listagem.php" class="btn btn-secondary">Cancelar</a>
        </form>
        <?php else: ?>
        <p>registo não encontrado ou inválido.</p>
        <?php endif; ?>
    </div>
                  
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
