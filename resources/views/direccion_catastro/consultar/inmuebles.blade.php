@extends('layouts.app')

@section('content')
<div class="col-md-offset-2 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"
		style="background-color: #a90000; color: #e0e0d1;">
			Lista de Inmuebles
		</div>
        <div class="panel-body">
            <table class="table table-hover">
				<thead>
					<th>
						Ubicacion
					</th>
					<th>
						Acciones
					</th>
				</thead>
				<tobody>
					@foreach($inmuebles as $inmueble)
						<tr>
							<td>
								{{$inmueble->ubicacion}}
							</td>
							<td>
								<a href=" {{ route('inmueble.show',
									['id' => $inmueble->id])}} "
									class="btn btn-sm btn-danger">
									Detalle
								</a>
								<a href="#"
								class="btn btn-sm btn-success">
									Editar
								</a>
								@can('delete')
									<a href="#" class="btn btn-sm btn-danger">
										Eliminar
									</a>
								@else
									No puede eliminar este inmueble
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