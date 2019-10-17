@extends('layouts.app')
@section('content')
<div class="col-md-offset-2 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"
		style="background-color: #a90000; color: #e0e0d1;">

			<form class="form-horizontal" method="POST"
			action="{{ route('propietarios') }}">
				{{ csrf_field() }}

				<div class="form-group{{ $errors->has('search')
					? ' has-error' : '' }}">
					<div class="row">
							<div class="col-md-5">
								Lista de Propietarios
							</div>
							<div class="col-md-5">
									<input id="search" type="number"
										class="form-control" name="search"
										value="{{ old('search') }}"
										min="100000" max="999999999"
										minlength="6" maxlength="9"
										placeholder="buscar por cédula o rif"
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
			@if(Session::has('error'))
				<div class="alert alert-success" role="alert">{{ Session::get('error') }}...</div>
			@else
			<table class="table table-hover">
					<thead>
						<th>
							Nombres
						</th>
						<th>
							Acciones
						</th>
					</thead>
					<tobody>
						@foreach($propietarios as $propietario)
							<tr>
								<td>
									{{$propietario->nombre}}
								</td>
								<td>
									<a href=" {{ route('propietario.show',
										['id' => $propietario->id])}} "
										class="btn btn-sm btn-danger">
										Detalle
									</a>
									@can('update')
									<a href="{{ route('propietario.edit', ['id' => $propietario->id ]) }}"
									class="btn btn-sm btn-success">
										Editar
									</a>
									@endcan
									<!-- no se puede eliminar si pertenece
									a una inscripcion
									@can('delete')
										<a href="{{ route('propietario.destroy', $propietario->id) }}"
											class="btn btn-sm btn-danger">
											Eliminar
										</a>
									@endcan
									-->
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