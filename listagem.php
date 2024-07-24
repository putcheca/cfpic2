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
        <a class="nav-link" href="registar.html">Registar Pessoas</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="container">
        <h1>Listagem de Pessoas</h1>><div </div>
        <div class="row">
            <div class="col-sm-3"><h4>Registo</h4></div>
            <div class="col-sm-6"><h4>Nome</h4></div>
            <div class="col-sm-3"><h4>Telefone</h4></div>
        </div>
        
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
        
            // Consuta à base de dados
        $sql = "SELECT id_pessoa, nome, telefone FROM pessoas ORDER BY id_pessoa ASC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Saída dos dados de cada linha
            while($row = $result->fetch_assoc()) {
                echo "<div class='row'>";
                echo "<div class='col-sm-3'><p>" . $row["id_pessoa"] . "</p></div>";
                echo "<div class='col-sm-6'><p>" . $row["nome"] . "<a href='editar.php?id=" . $row["id_pessoa"] . "'>✏️</a> <a href='apagar.php?id=" . $row["id_pessoa"] . "'>❌</a></p></div>";
                echo "<div class='col-sm-3'><p>" . $row["telefone"] . "</p></div>";
                echo "</div>";
            }
        } else {
            echo "<div class='row'><div class='col-12'><p>Nenhum registro encontrado</p></div></div>";
        }
        
        $conn->close();
        ?>
        
      </div>
      
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
