@extends('layouts.app')

@section('content')
<div class="col-md-offset-2 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"
		style="background-color: #a90000; color: #e0e0d1;">

			<form class="form-horizontal" method="POST"
			action="{{ route('estadisticaAnual_search') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('search')
					? ' has-error' : '' }}">
					<div class="row">
						<div class="col-md-5">
							Ingrese el año a consultar
						</div>
						<div class="col-md-5">
							<input id="search" type="year"
								class="form-control" name="search" value="{{ old('search') }}" required autofocus>

							@if ($errors->has('search'))
								<span class="help-block">
									<strong>{{ $errors->first('search') }}</strong>
								</span>
							@endif
						</div>
						<div class="col-md-2">
							<button type="submit" class="btn" style="background-color: #a90000;
								color: #e0e0d1;">
								Buscar
							</button>
						</div>
					</div>

				</div>
			</form>
		</div>
	</div>
        <div class="panel-body">
			@if(Session::has('error'))
				<div class="alert alert-success" role="alert">{{ Session::get('error') }}...</div>
			@else
			<div class="row">
				<div class="col-md-7">
					<h4>Total de Registros:  {{$inscripciones['inscritos']->count()}}</h4>
				</div>
				<div class="col-md-2">						
					@if($inscripciones['inscritos']->count()>0)
					<a href="{{ route('estadisticaAnual.imprimir',
					['fecha' => $inscripciones['fechaConsul']])}}"
						class="btn btn-sm btn-success">
						Imprimir
					</a>
					@endif		
				</div>
			</div>
			<br>
			<table class="table table-hover">
				<thead>
                    <th>
                        #
                    </th>
					<th>
						Fecha
					</th>
					<th>
						Propietario
					</th>
				</thead>
				<tobody>
					@foreach($inscripciones['inscritos'] as $index => $inscripcion)
						<tr>
                            <td>
                                {{$index + 1}}
                            </td>
							<td>
								{{$inscripcion->fecha}}
							</td>
							<td>
								{{$inscripcion->propietario->nombre}}
							</td>
						</tr>
					@endforeach
				</tobody>
			</table>
			@endif
		</div>
	</div>
</div>
@endsection