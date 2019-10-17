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
			<p style="font-size: 10px; text-align: center; width: 40%;">
				REPÚBLICA BOLIVARIANA DE VENEZUELA
				<br>
				ALCALDÍA BOLIVARIANA DEL MUNICIPIO SUCRE
				<br>
				LAGUNILLAS ESTADO MÉRIDA
				<br>
				<img src="./images/Escudo.png"
				height="75" width="50">
				<br>
				DIRECCIÓN DE CATASTRO
			</p>
		</header>

		<div align="center">
			{{ $date }}
		</div>

		<div align="right" style="font-size: 12px;">
			N.I.: {{ $inscripcion->ni }}
			<br>
			Mcpio: Sucre
			Sect: {{ $inscripcion->sector }}
			Manz: {{ $inscripcion->sector }}
		</div>

		<div align="center">
			<h4>{{ $title }}</h4>
		</div>

		<b>
			A.-Declaración del Propietario:
		</b>
		<br>
		1.-Propietario: {{ $inscripcion->propietario->nombre." ".$inscripcion->propietario->apellido }}
		<br>
		<div id="column1">
			C.I.: {{ $inscripcion->propietario->cedula }}
		</div>
		<div id="column2">
			Dirección: {{ $inscripcion->propietario->direccion }}
		</div>
		<br>
		2.- Solicitante: {{ $inscripcion->solicitante->nombre." ".$inscripcion->solicitante->apellido }}
		<br>
		<div id="column1">
			C.I.: {{ $inscripcion->solicitante->cedula }}
		</div>
		<div id="column2">
			Dirección: {{ $inscripcion->solicitante->direccion }}
		</div>
		<br>
		3.- Datos del inmueble:
		<br>
		Ubicación: {{ $inscripcion->inmueble->ubicacion }}
		<br>
		<div id="column1">
			Área del Terreno M²: {{ $inscripcion->inmueble->area }}
		</div>
		<div id="column2">
			Valor total en BsF. {{ $inscripcion->inmueble->valor }}
		</div>
		<br>
		<b>
			3.-Linderos y Medidas Actuales:
		</b>
		<br>
		<div id="column1">
			Frente: {{ $inscripcion->linderos->frente }}
		</div>
		<div id="column2">
			Mts: {{ $inscripcion->linderos->unidad_medida_li }}
		</div>
		<br>
		<div id="column1">
			Fondo: {{ $inscripcion->linderos->fondo }}
		</div>
		<div id="column2">
			Mts: {{ $inscripcion->linderos->unidad_medida_li }}
		</div>
		<br>
		<div id="column1">
			Lindero Derecho: {{ $inscripcion->linderos->ld }}
		</div>
		<div id="column2">
			Mts: {{ $inscripcion->linderos->unidad_medida_ld }}
		</div>
		<br>
		<div id="column1">
			Lindero Izquierdo: {{ $inscripcion->linderos->li }}
		</div>
		<div id="column2">
			Mts: {{ $inscripcion->linderos->unidad_medida_li }}
		</div>
		<br>
		<b>
			B.- Datos del Documento:
		</b>
		<br>
		1.- Tipo de Operación: {{ $inscripcion->documento->nTipoAdjudicacion->nombre }}
		Nº del documento: {{ $inscripcion->documento->nro_documento }}
		<br>
		Folios: {{ $inscripcion->documento->folios }} 
		Protocolo: {{ $inscripcion->documento->protocolo }}
		Tomo: {{ $inscripcion->documento->tomo }}
		<br>
		Trimestre: {{ $inscripcion->documento->trimestre }}
		Fecha: {{ $inscripcion->documento->fecha }}
		<br>
		2.- Área Total M²: {{ $inscripcion->documento->area_total }}
		Valor Total en Bs. {{ $inscripcion->documento->valor_total }}
		<br>
		<br>
		<b>
			Observaciones:
		</b>
		<br>
		{{ $inscripcion->documento->observacion }}
		<br>
		<p style="font-size: 14px;">
			Declaro que son ciertos los datos que sobre el valor del inmueble y documentos de 
			propiedad, en esta planilla emito.
		</p>
		<br>
		<div id="column">
			______________________
		</div>
		<div id="column">
			______________________
		</div>
		<br>
		<div id="column">
			Firma del propietario
		</div>
		<div id="column">
			Firma del solicitante
		</div>
		<br>
			Revisado por: ___________________
		</div>
	</body>
</html>