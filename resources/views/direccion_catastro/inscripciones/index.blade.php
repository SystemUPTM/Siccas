@extends('layouts.app')

@section('content')
<div class="col-md-offset-2 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"
		style="background-color: #a90000; color: #e0e0d1;">

			<form class="form-horizontal" method="POST"
			action="{{ route('inscripciones') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('search')
					? ' has-error' : '' }}">
					<div class="row">
							<div class="col-md-5">
								Lista de Inscripciones
							</div>
							<div class="col-md-5">
									<input id="search" type="number"
										class="form-control" name="search"
										value="{{ old('search') }}"
										min="100000" max="999999999"
										minlength="6" maxlength="9"
										placeholder="cédula de propietario"
										required autofocus>

									@if ($errors->has('search'))
										<span class="help-block">
											<strong>{{ $errors->first('search') }}</strong>
										</span>
									@endif
								</div>
								<div class="col-md-2">
									<button type="submit" class="btn"
										style="background-color: #a90000;
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
            <table class="table table-hover">
				<thead>
					<th>
						NI
					</th>
					<th>
						Propietario
					</th>
					<th>
					</th>
				</thead>
				<tobody>
					@foreach($inscripciones as $inscripcion)
						<tr>
							<td>
								{{ $inscripcion->ni }}
							</td>
							<td>
								{{ $inscripcion->propietario->nombre
								.' '.$inscripcion->propietario->cedula }}
							</td>
							<td>
								<a href="#"
									class="btn btn-sm btn-danger">
									Seleccionar
								</a>
							</td>
						</tr>
					@endforeach
				</tobody>
			</table>
		</div>
	</div>
</div>
@endsection