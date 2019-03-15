<?php
  require('fpdf/fpdf.php');
  require('conexaodb.php');

  if(isset($_POST["submit-documentacao"])){

  // Attempt insert query execution
  try{
    $data = date("Y-m-d H:i:s");

    // Create prepared statement
    $sql = "INSERT INTO documentacao (titulo_documentacao,descricao_documentacao,data_documentacao) VALUES (:titulo_documentacao, :descricao_documentacao,:data_documentacao)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':titulo_documentacao', $_REQUEST['titulo_documentacao']);
    $stmt->bindParam(':descricao_documentacao', $_REQUEST['descricao_documentacao']);
    $stmt->bindParam(':data_documentacao', $data);

    
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
    <h3>Documentação Técnica</h3>
  </div>
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#listar">Visualizar Documentação Técnica</a></li>
    <li><a data-toggle="tab" href="#adicionar-documentacao">Adicionar Item</a></li>
  </ul>
<form method="post" action="documentacao-tecnica.php">
  <div class="tab-content">
    <div id="listar" class="tab-pane fade in active">
      <h3>Visualizar Documentação</h3>
      <p>Documentação.</p>
      <?php   

    require('conexaodb.php');

    try { 
    $sql = "SELECT * FROM documentacao"; 
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
            echo "<td>".$row['titulo_documentacao']."</td>"; 
            echo "<td>".$row['descricao_documentacao']."</td>"; 
            echo "<td>".$row['data_documentacao']."</td>"; 
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
    <div id="adicionar-documentacao" class="tab-pane fade">
      <h3>Adicionar Item</h3>
      <p>Opção para adicionar item à documentação.</p>
      <ul>
        Título do Registro
        <li>
          <input type="text" name="titulo_documentacao"/>
        </li>
        Registro
        <li>
          <input type="textarea" name="descricao_documentacao" style="width: 300px;height: 100px;">
        </li>
        <li>
          <input type='submit' name='submit-documentacao' class="registrar" value='Registrar'></input>    
      </li>
      </ul>
    </div>
  </div>
</form>
</div>
</body>
</html>
