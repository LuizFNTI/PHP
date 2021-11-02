<?php
	session_start();
	include_once('conn.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Salva IMC-Excel</title>
	<head>
	<body>
		<?php

		$arquivo = 'planilha_pessoa.xls';
		
		$html = '';
		$html .= '<table border="1">';
		$html .= '<tr>';
		$html .= '<td colspan="8">Planilha IMC</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td><b>ID</b></td>';
		$html .= '<td><b>Nome</b></td>';
		$html .= '<td><b>Sexo</b></td>';
		$html .= '<td><b>Idade</b></td>';
		$html .= '<td><b>Altura</b></td>';
		$html .= '<td><b>Peso</b></td>';
		$html .= '<td><b>IMC</b></td>';
		$html .= '<td><b>Situação</b></td>';
		$html .= '</tr>';
		
		$result = "SELECT * FROM IMC";
		$resultado_imc = mysqli_query($conn , $result);
		
		while($row_imc = mysqli_fetch_assoc($resultado_imc)) {
			$html .= '<tr>';
			$html .= '<td>'.$row_imc["id"].'</td>';
			$html .= '<td>'.$row_imc["nome"].'</td>';
			$html .= '<td>'.$row_imc["sexo"].'</td>';
			$html .= '<td>'.$row_imc["idade"].'</td>';
			$html .= '<td>'.$row_imc["altura"].'</td>';
			$html .= '<td>'.$row_imc["peso"].'</td>';
			$html .= '<td>'.$row_imc["imc"].'</td>';
			$html .= '<td>'.$row_imc["tipoob"].'</td>';
			$html .= '</tr>';
		}
	
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		
		echo $html;
		exit; ?>
	</body>
</html>