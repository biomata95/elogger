<?php
  require('fpdf/fpdf.php');
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
  <div id='conteudo' align="center">
    <h1>Elogger ADPAT2</h1>
    <h3>Registro de logs do servidor ADPAT2</h3>
    <ul>
      <li>
        <input type='button' id='introducao' class="test" value='Introdução' onClick="Javascript:window.location.href = 'introducao.php';"></li>
      </li>
      <li>
        <input type='button' id='hardware' class="test" value='Hardware' onClick="Javascript:window.location.href = 'hardware.php';"></input>    
      </li>
      <li>
        <input type='button' id='inventario' class="test" value='Inventário' onClick="Javascript:window.location.href = 'inventario.php';"></input>    
      </li>
      <li>
        <input type='button' id='documentacao' class="test" value='Documentação Técnica' onClick="Javascript:window.location.href = 'documentacao-tecnica.php';"></input>    
      </li>
      <li>
        <input type='button' id='midia' class="test" value='Mídias' onClick="Javascript:window.location.href = 'midias.php';"></input>    
      </li>
      <li>
        <input type='button' id='instalacao' class="test" value='Instalação' onClick="Javascript:window.location.href = 'instalacao.php';"></input>    
      </li>
      <li>
        <input type='button' id='manutencoes' class="test" value='Manutenções' onClick="Javascript:window.location.href = 'manutencoes.php';"></input>    
      </li>
      <li>
        <input type='button' id='teste' class="test" value='Testes' onClick="Javascript:window.location.href = 'testes.php';"></input>    
      </li>
      <li>
        <input type='button' id='conclusao' class="test" value='Conclusão' onClick="Javascript:window.location.href = 'conclusao.php';"></input>    
      </li>
      <li>
        <input type='button' id='gerar_pdf' class="test" value='Gerar PDF' onClick="Javascript:window.location.href = 'gerar_pdf.php';"></input>    
      </li>
    </ul>
  </div>
</body>
</html>
