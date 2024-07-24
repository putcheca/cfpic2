<!DOCTYPE html>
<html lang="pt-pt">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="p-3 mb-2 bg-success text-white"> <div class="font-weight-bold">GESTÃO DE PESSOAS</div></div>
    <title>Gestão de Indivíduos - Listagem</title>
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
<div class="row">
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

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o id_pessoa
    $id_pessoa = intval($_POST['id_pessoa']);
    
    // Verifica se o id_pessoa é válido
    if ($id_pessoa > 0) {
        // Apaga o registo da base de dados
        $sql = "DELETE FROM pessoas WHERE id_pessoa=$id_pessoa";
        if ($conn->query($sql) === TRUE) {
            echo "<div class=\"col-sm-12\"> registo apagado com sucesso. <a href='listagem.php'>Voltar à lista</a></div>";
        } else {
            echo "<div class=\"col-sm-12\"> Erro ao apagar registo: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class=\"col-sm-12\"> ID inválido.</div>";
    }
} else {
    echo "<div class=\"col-sm-12\"> Método de solicitação inválido.</div>";
}
    
$conn->close();
?>
</div>
</div>