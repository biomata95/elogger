<?php
  require('fpdf/fpdf.php');
  require('conexaodb.php');

  if(isset($_POST["submit-testes"])){

  // Attempt insert query execution
  try{
    $data = date("Y-m-d H:i:s");

    // Create prepared statement
    $sql = "INSERT INTO testes (titulo_testes,descricao_testes,data_testes) VALUES (:titulo_testes, :descricao_testes,:data_testes)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':titulo_testes', $_REQUEST['titulo_testes']);
    $stmt->bindParam(':descricao_testes', $_REQUEST['descricao_testes']);
    $stmt->bindParam(':data_testes', $data);

    
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
    <h3>Testes</h3>
  </div>
    <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#listar">Listar Manutenções</a></li>
    <li><a data-toggle="tab" href="#adicionar-testes">Adicionar Item</a></li>
  </ul>
<form method="post" action="testes.php">
  <div class="tab-content">
    <div id="listar" class="tab-pane fade in active">
      <h3>Listar Testes</h3>
      <p>Testes presentes no servidor.</p>
      <?php   

    require('conexaodb.php');

    try { 
    $sql = "SELECT * FROM testes"; 
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
            echo "<td>".$row['titulo_testes']."</td>"; 
            echo "<td>".$row['descricao_testes']."</td>"; 
            echo "<td>".$row['data_testes']."</td>"; 
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
    <div id="adicionar-testes" class="tab-pane fade">
      <h3>Adicionar Item</h3>
      <p>Opção para adicionar teste do servidor.</p>
      <ul>
        Título do Registro
        <li>
          <input type="text" name="titulo_testes"/>
        </li>
        Registro
        <li>
          <input type="textarea" name="descricao_testes" style="width: 300px;height: 100px;">
        </li>
        <li>
          <input type='submit' name='submit-testes' class="registrar" value='Registrar'></input>    
      </li>
      </ul>
    </div>
  </div>
</form>
</div>
</body>
</html>
