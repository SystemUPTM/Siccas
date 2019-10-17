@extends('layouts.app')

@section('content')
<div class="col-md-offset-2 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"
		style="background-color: #a90000; color: #e0e0d1;">

			<form class="form-horizontal" method="POST"
			action="{{ route('notificaciones') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('search')
					? ' has-error' : '' }}">
					<div class="row">
						<div class="col-md-5">
							Lista de Notificaciones
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
						N°
					</th>
					<th>
						Propietario
					</th>
					<th>
						Impuesto a pagar
					</th>
					<th>
						Acciones
					</th>
				</thead>
				<tobody>
					@foreach($notificaciones as $notificacion)
						<tr>
							<td>
								{{ $notificacion->nro }}
							</td>
							<td>
								{{ $notificacion->impuestoCalculado->propietario->nombre
									.' '.$notificacion->impuestoCalculado->propietario->cedula }}
							</td>
							<td>
								{{ $notificacion->impuestoCalculado->cantidad }}
							</td>
							<td>
								@can('update')
									<a href="#"
										class="btn btn-sm btn-success">
										Editar
									</a>
								@endcan
								@can('delete')
									<a href="{{ route('notificacion.destroy', $notificacion->id) }}"
										class="btn btn-sm btn-danger">
										Eliminar
									</a>
								@endcan
							</td>
						</tr>
					@endforeach
				</tobody>
			</table>
		</div>
	</div>
</div>
@endsection