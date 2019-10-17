<!DOCTYPE html>
<html>
	<head>
		<title>{{ $title }}</title>
		<style>
			#column1 {
    			display: inline-block;
    			width: 30%;
			}
			#column2 {
    			display: inline-block;
    			width: 70%;
			}
			#column {
    			display: inline-block;
    			width:50%;
				text-align: center;
			}
		</style>
	<body>
		<header>
			<img src="./images/im1.jpg" height="70" width="150" style="margin-left: -3px;">
		</header>
		<header>
			<img src="./images/Escudo.png" height="75" width="50" style="display: block;margin-left: 677px;margin-top: -75px;">
		</header>
		<hr style="color: red;">
		<p style="margin-left: 599px;margin-top: -5px;font-size: 10px">
			DIRECCION DE CATASTRO
		</p>

		<div align="center">
			<h4>{{ $title }}</h4>
		</div>

		<div align="center">
			<p style="text-align: justify;">Por medio del presente documento se reporta la estadístca total de registros asociados a la siguiente información:
			<br><br>
			Fecha de consulta seleccionada: {{$fechaConsulta}}
			<br>
			Total de registros:  {{$inscripcion->count()}}</p>
		</div>
		<br><br><br><br>
		<div align="center">
			<p style="text-align: justify;">Lagunillas {{ $date }}</p>
		</div>
	</body>
</html>