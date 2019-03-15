<?php
require('fpdf/fpdf.php');
require('conexaodb.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','',20);

// Centered text in a framed 20*10 mm cell and line break
$pdf->SetXY(70, 130);
$pdf->Cell(1,1,'Elogger Servidor ADPAT2',0,1);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','',14);
$pdf->SetXY(102, 260);
$pdf->Cell(1,1,'Curitiba',0,1);
$data = date("d/m/Y H:i:s");
$pdf->SetXY(90, 270);
$pdf->Cell(1,1,$data,0,1);
$pdf->AddPage();
$item = 1;
$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.iconv('utf-8','iso-8859-1',' Introdução'),0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);
$pdf->Cell(40,10,iconv('utf-8','iso-8859-1','A proposta deste servidor é hospedar o projeto SIGA Access e demais arquivos relacionados.'));
$pdf->Ln(10);
$pdf->Ln(10);
$item++;
$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.' Hardware',0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);

try { 
    $sql = "SELECT * FROM hardware"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        while ($row = $res->fetch()) { 
            $pdf->Cell(40,10,$item.'.'.$row['id_hardware'].' '.iconv('utf-8','iso-8859-1',$row['titulo_hardware']).' | '.$row['data_hardware']);
            $pdf->Ln(10);
            $pdf->Cell(40,10,iconv('utf-8','iso-8859-1',$row['descricao_hardware']));
            $pdf->Ln(15);
        } 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. ".$e->getMessage()); 
} 

$item++;

$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.iconv('utf-8','iso-8859-1',' Inventário'),0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);

try { 
    $sql = "SELECT * FROM inventario"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        while ($row = $res->fetch()) { 
            $pdf->Cell(40,10,$item.'.'.iconv('utf-8','iso-8859-1',$row['id_inventario']).' '.iconv('utf-8','iso-8859-1',$row['titulo_inventario']).' | '.$row['data_inventario']);
            $pdf->Ln(10);
            $pdf->Cell(40,10,iconv('utf-8','iso-8859-1',$row['descricao_inventario']));
            $pdf->Ln(15);
        } 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. ".$e->getMessage()); 
} 

$item++;

$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.iconv('utf-8','iso-8859-1',' Documentação Técnica'),0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);

try { 
    $sql = "SELECT * FROM documentacao"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        while ($row = $res->fetch()) { 
            $pdf->Cell(40,10,$item.'.'.$row['id_documentacao'].' '.iconv('utf-8','iso-8859-1',$row['titulo_documentacao']).' | '.$row['data_documentacao']);
            $pdf->Ln(10);
            $pdf->Cell(40,10,iconv('utf-8','iso-8859-1',$row['descricao_documentacao']));
            $pdf->Ln(15);
        } 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. ".$e->getMessage()); 
} 

$item++;

$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.iconv('utf-8','iso-8859-1',' Mídias'),0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);

try { 
    $sql = "SELECT * FROM midia"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        while ($row = $res->fetch()) { 
            $pdf->Cell(40,10,$item.'.'.$row['id_midia'].' '.iconv('utf-8','iso-8859-1',$row['titulo_midia']).' | '.$row['data_midia']);
            $pdf->Ln(10);
            $pdf->Cell(40,10,iconv('utf-8','iso-8859-1',$row['descricao_midia']));
            $pdf->Ln(15);
        } 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. ".$e->getMessage()); 
} 

$item++;

$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.iconv('utf-8','iso-8859-1',' Instalações'),0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);

try { 
    $sql = "SELECT * FROM instalacao"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        while ($row = $res->fetch()) { 
            $pdf->Cell(40,10,$item.'.'.$row['id_instalacao'].' '.iconv('utf-8','iso-8859-1',$row['titulo_instalacao']).' | '.$row['data_instalacao']);
            $pdf->Ln(10);
            $pdf->Cell(40,10,iconv('utf-8','iso-8859-1',$row['descricao_instalacao']));
            $pdf->Ln(15);
        } 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. ".$e->getMessage()); 
} 

$item++;

$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.iconv('utf-8','iso-8859-1',' Manutenções'),0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);

try { 
    $sql = "SELECT * FROM manutencoes"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        while ($row = $res->fetch()) { 
            $pdf->Cell(40,10,$item.'.'.$row['id_manutencoes'].' '.iconv('utf-8','iso-8859-1',$row['titulo_manutencoes']).' | '.$row['data_manutencoes']);
            $pdf->Ln(10);
            $pdf->Cell(40,10,iconv('utf-8','iso-8859-1',$row['descricao_manutencoes']));
            $pdf->Ln(15);
        } 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. ".$e->getMessage()); 
} 


$item++;

$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.' Testes',0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);

try { 
    $sql = "SELECT * FROM testes"; 
    $res = $pdo->query($sql); 
    if ($res->rowCount() > 0) { 
        while ($row = $res->fetch()) { 
            $pdf->Cell(40,10,$item.'.'.$row['id_testes'].' '.iconv('utf-8','iso-8859-1',$row['titulo_testes']).' | '.$row['data_testes']);
            $pdf->Ln(10);
            $pdf->Cell(40,10,iconv('utf-8','iso-8859-1',$row['descricao_testes']));
            $pdf->Ln(15);
        } 
        unset($res); 
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
catch (PDOException $e) { 
    die("ERROR: Could not able to execute $sql. ".$e->getMessage()); 
} 

$item++;

$pdf->SetFont('Times','',17);
$pdf->Cell(1,1,$item.iconv('utf-8','iso-8859-1',' Conclusão'),0,1);
$pdf->SetFont('Times','',14);
$pdf->Ln(10);
$pdf->Cell(40,10,iconv('utf-8','iso-8859-1','A proposta deste servidor é hospedar o projeto SIGA Access e demais arquivos relacionados.'));

unset($pdo); 
$pdf->Output();
?>

