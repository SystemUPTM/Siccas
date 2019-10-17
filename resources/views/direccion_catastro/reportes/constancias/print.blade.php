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
	</head>
	<body>
		<header>
			<img src="./images/im1.jpg" height="70" width="150" style="margin-left: -3px;">
		</header>
		<header>
			<img src="./images/Escudo.png" height="75" width="50" style="display: block;margin-left: 677px;margin-top: -75px;">
		</header>
		<hr style="color: red;">
		<p style="margin-left: 599px;margin-top: -5px;font-size: 10px">DIRECCION DE CATASTRO</p>

		<div align="center">
			<h4>{{ $title }}</h4>
		</div>
		<div align="center">
			<p style="text-align: justify;">Quien Suscribe Directora (E) de Catastro de la Alcaldia Bolivariana del Municipio Sucre del Estado Mérida. Geografa MARIA MILAGRO DAVILA UZCATEGUI, por medio de la presente:</p>
		</div>
		<div align="center">
			<h4>{{ $title2 }}</h4>
		</div>

		<div align="center">
			<p style="text-align: justify;">Que la persona natural: {{ $inscripcion->propietario->nombre." ".$inscripcion->propietario->apellido}},
				@if ($inscripcion->propietario->genero == 'M')
    				{{"venezolano"}}
    			@elseif($inscripcion->propietario->genero == 'F')
    				{{"venezolana"}}
				@endif, mayor de edad, titular de la cédula de identidad N° V-{{$inscripcion->propietario->cedula}}, quien posee un inmueble contentivo de dos lotes de terreno, signados con el Lote 14 y Lote 15, ubicados en el sector Los Caracoles, Parroquia San Juan, Municipio Sucre del Estado Mérida, según se evidencia en documento protocolizado de fecha: {{ $DateDocument = date("d", strtotime($inscripcion->documento->fecha))." de ".$DateDocument = date("F", strtotime($inscripcion->documento->fecha))." de ".$DateDocument = date("Y", strtotime($inscripcion->documento->fecha))}}, matriculado bajo el N° XXXXX, Trimestre
				@if ($inscripcion->documento->trimestre == 1 || $inscripcion->documento->trimestre == 3)
    				{{$inscripcion->documento->trimestre."ero"}}
    			@elseif($inscripcion->documento->trimestre == 2)
    				{{$inscripcion->documento->trimestre."ndo"}}
				@elseif($inscripcion->documento->trimestre == 4)
					{{$inscripcion->documento->trimestre."to"}}
				@endif.
				@if ($inscripcion->documento->observacion)Adicionando como observación: {{$inscripcion->documento->observacion}}@endif.
			</p>
		</div>
		<div align="center">
			<p style="text-align: justify;">Para el momento dicho inmueble No posee un número Catastral especifico pero si esta inscrito en la Dirección de Catastro.</p>
		</div>
		<div align="center">
			<p style="text-align: justify;">Constancia que se expide a petición verbal de parte interesada y para efectos legales en Lagunillas a los {{$d=date("d")." dias del mes de ".$m=date("F")." de ".$y=date("Y")}}.</p>
		</div>
		<br><br><br><br><br><br>
		<div align="center">
			<p style="text-align: center;">{{$ndirec}}</p>
			<p style="text-align: center;">{{$direc}}</p>
		</div>
		</div>
		<img src="./images/im2.jpg" height="70" width="800" style="margin-left: -3px;">
		<div align="center" style="line-height:5px;">
			<p style="text-align: right;">AV.5</p>
			<p style="text-align: right;">Las palmas, con transversal a la cancha TECHADA</p>
			<p style="text-align: right;">Edificio de Gobierno Municipal</p>
			<p style="text-align: right;">Parroquia Lagunillas</p>
			<p style="text-align: right;">Municipio Sucre</p>
			<p style="text-align: right;">Estado Bolivariano de Mérida</p>
		</div>
	</body>
</html>