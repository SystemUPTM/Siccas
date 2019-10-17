@extends('layouts.app')

@section('content')
<div class="col-md-offset-2 col-md-8 col-md-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading"
		style="background-color: #a90000; color: #e0e0d1;">
			Bitácora
		</div>
        <div class="panel-body">
            <table class="table table-hover">
				<thead>
					<th>
						#
					</th>
					<th>
						Usuario
					</th>
					<th>
						Acciones realizadas
					</th>
					<th>
						Fecha
					</th>
				</thead>
				<tobody>
					@foreach($bitacora as $index => $bitacoras)
						<tr>
                            <td>
							@if($bitacora->onFirstPage())
                                {{$index + 1}}
                            @else
                            	{{$index + 11}}
                            @endif
                            </td>
							<td>
								{{$bitacoras->usuario->name}}
							</td>
							<td>
								{{$bitacoras->log}}
							</td>
							<td>
								{{$bitacoras->fecha}}
							</td>
						
						</tr>
					@endforeach
				</tobody>
			</table>
			{{ $bitacora->links() }}
		</div>
	</div>
</div>
@endsection