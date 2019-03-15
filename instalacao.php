<?php
  require('fpdf/fpdf.php');
  require('conexaodb.php');

  if(isset($_POST["submit-instalacao"])){

  // Attempt insert query execution
  try{
    $data = date("Y-m-d H:i:s");

    // Create prepared statement
    $sql = "INSERT INTO instalacao (titulo_instalacao,descricao_instalacao,data_instalacao) VALUES (:titulo_instalacao, :descricao_instalacao,:data_instalacao)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':titulo_instalacao', $_REQUEST['titulo_instalacao']);
    $stmt->bindParam(':descricao_instalacao', $_REQUEST['descricao_instalacao']);
    $stmt->bindParam(':data_instalacao', $data);

    
    // Execute the prepared statement
    $stmt->execute();
    echo "Records inserted successfully.";
  } catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
  }
}

// Close connection
unset($pdo);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Elogger</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>


<body>
  <div align="center" id="titulo">
    <h1>Elogger ADPAT2</h1>
    <h3>Instalações</h3>
  </div>
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#listar">Listar Instalações</a></li>
    <li><a data-toggle="tab" href="#adicionar-instalacao">Adicionar Item</a></li>
  </ul>
<form method="post" action="instalacao.php">
  <div class="tab-content">
    <div id="listar" class="tab-pane fade in active">
      <h3>Listar Instalações</h3>
      <p>Instalações presentes no servidor.</p>
      <?php   

    require('conexaodb.php');

    try { 
    $sql = "SELECT * FROM instalacao"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th>Título</th>"; 
        echo "<th>Descrição</th>"; 
        echo "<th>Data-Hora</th>"; 
        echo "</tr>"; 
        while ($row = $res->fetch()) { 
            echo "<tr>"; 
            echo "<td>".$row['titulo_instalacao']."</td>"; 
            echo "<td>".$row['descricao_instalacao']."</td>"; 
            echo "<td>".$row['data_instalacao']."</td>"; 
            echo "</tr>"; 
        } 
        echo "</table>"; 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. " 
                                .$e->getMessage()); 
} 
unset($pdo); 
?> 

    </div>
    <div id="adicionar-instalacao" class="tab-pane fade">
      <h3>Adicionar Item</h3>
      <p>Opção para adicionar instalacao do servidor.</p>
      <ul>
        Título do Registro
        <li>
          <input type="text" name="titulo_instalacao"/>
        </li>
        Registro
        <li>
          <input type="textarea" name="descricao_instalacao" style="width: 300px;height: 100px;">
        </li>
        <li>
          <input type='submit' name='submit-instalacao' class="registrar" value='Registrar'></input>    
      </li>
      </ul>
    </div>
  </div>
</form>
</div>
</body>
</html>
