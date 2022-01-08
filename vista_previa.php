<?php 
$reporte = $_GET['reporte'];

if($reporte != null || $reporte != ""){
	header("index.html");
}

date_default_timezone_set("America/Mexico_City");
$hoy = date('Y-m-d G:i:s', time());
// Require composer autoload
require_once __DIR__ . '/mpdf/vendor/autoload.php';

$html = '
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	 <table class="table_footer">
	    <tr>
	        <td rowspan="3"><img src="logoITA.png" with="100px" height="75px" class="logo_ita_header"></td>
	        <td><strong>Nombre del Documento: Formato para  Solicitud de Mantenimiento Correctivo</strong></td>
	        <td><strong>Código: ITA- AD-PO-001-02</strong></td>
	    </tr>
	    <tr>
	        <td rowspan="2"><strong>Referencia a la Norma ISO 9001:2015 6.1, 7.1, 7.2, 7.4, 7.5.1, 8.1</strong></td>
	        <td><strong>Revisión: 0</strong></td>
	    </tr>
	    <tr>	        
	        <td><strong>Página 1 de 2</strong></td>
	    </tr>
	</table>
	<p class="titulo"><strong>SOLICITUD MANTENIMIENTO CORRECTIVO</strong></p>
	
	<table class="tabla_1">
		<tr>
	        <td width="200px"><strong>Recursos Materiales y Servicios</strong></td>
	        <td width="35px"></td>
	    </tr>
	    <tr>
	        <td ><strong>Mantenimiento de Equipo</strong></td>
	        <td></td>
	    </tr>
	    <tr>	        
	        <td ><strong>Centro de Cómputo</strong></td>
	        <td></td>
	    </tr>
	</table>	
	
	<table class="folio">
		<tr>
	        <td ><strong>Folio:</strong></td>
	        <td width="45px" class="input">'.$reporte.'</td>
	    </tr>
	</table>

	<table class="area_solicitante" width="100%">
		<tr>
	        <td ><strong>Área Solicitante:</strong> Sistemas</td>	        
	    </tr>
	</table>

	<table class="tabla_descripcion" width="100%">
		<tr>
	        <td ><strong>Nombre y Firma del Solicitante:</strong> </td>	        
	    </tr>
	    <tr>
	        <td ><strong>Fecha de Elaboración:</strong> '.$hoy.'</td>
	    </tr>
	    <tr>
	        <td ><strong>Descripción del servicio solicitado o falla a reparar:</strong> <p>Lorem, ipsum dolor sit amet, consectetur adipisicing elit. Provident amet doloremque architecto qui vero temporibus ut suscipit, harum repudiandae quod eveniet voluptate quisquam placeat facere asperiores nobis in reiciendis consequuntur!</p></td>
	    </tr>
	    <tr class="large_input">
	       <td class="large_input">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
	       </td>
	    </tr>
	</table>
	<div class="texto_departamento">
		c.c.p. Departamento de Planeación Programación y Presupuestación
		<br>
		c.c.p. Área Solicitante
	</div>
</body>
</html>
';

$html_page2='
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	 <table class="table_footer">
	    <tr>
	        <td rowspan="3"><img src="logoITA.png" with="100px" height="75px" class="logo_ita_header"></td>
	        <td><strong>Nombre del Documento: Formato para  Solicitud de Mantenimiento Correctivo</strong></td>
	        <td><strong>Código: ITA- AD-PO-001-02</strong></td>
	    </tr>
	    <tr>
	        <td rowspan="2"><strong>Referencia a la Norma ISO 9001:2015 6.1, 7.1, 7.2, 7.4, 7.5.1, 8.1</strong></td>
	        <td><strong>Revisión: 0</strong></td>
	    </tr>
	    <tr>	        
	        <td><strong>Página 2 de 2</strong></td>
	    </tr>
	</table>
	
	<p class="titulo"><strong>INSTRUCTIVO DE LLENADO</strong></p>

	<table class="tabla_instructivo">
		<tr>
	        <td><strong>Número</strong></td>
	        <td><strong>Descripción</strong></td>
	    </tr>
	    <tr>
	        <td >0</td>
	        <td>Marcar con una <strong>X</strong> el Departamento a quien se dirige la solicitud</td>
	    </tr>
	    <tr>	        
	        <td >1</td>
	        <td>El Departamento a quien va dirigida la solicitud asigna número de folio a la solicitud recibida.</td>
	    </tr>
	    <tr>	        
	        <td >2</td>
	        <td>El solicitante anota nombre del área correspondiente, (Dirección, Subdirección, Departamento ó División). La solicitud puede ser llenada por cualquier trabajador de la institución.</td>
	    </tr>
	    <tr>	        
	        <td >3</td>
	        <td>El Jefe del área anota su nombre y firma en la solicitud de mantenimiento.</td>
	    </tr>
	</table>
	<p class="titulo">SOLICITUD MANTENIMIENTO CORRECTIVO</p>
</body>
</html>
';

// Indicamos la ruta del archivo css en el cual trabajaremos.
$css = file_get_contents('css/styles.css');

// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Añadimos el html de la primera página
$mpdf->WriteHTML($html);
// Añadimos una nueva página
$mpdf->AddPage();
// Añadimos el html de la segunda página
$mpdf->WriteHTML($html_page2);
// Agregamos el footer
$mpdf->SetHTMLFooter('
<table width="100%" class="footer">
    <tr>
        <td width="33%">ITA -AD-PO-001-02</td>
        <td width="33%" align="center"></td>
        <td width="33%" style="text-align: right;">Rev. 0</td>
    </tr>
</table>');
// Agregamos los estilos css con la variable anteriormente cargada con la ruta del archivo
$mpdf -> WriteHTML($css,1);
// Output a PDF file directly to the browser
$mpdf->Output();

?>


