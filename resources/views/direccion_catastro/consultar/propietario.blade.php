@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"
                style="background-color: #a90000;
                color: #e0e0d1;">Propietario
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="#">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" pattern="([^\s][A-zÀ-ž\s]+)"
                                minlength="2" maxlength="30"
                                type="text" class="form-control" name="name" 
                                value="{{ $propietario->nombre }}"
                                required autofocus disabled>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="last_name" pattern="([^\s][A-zÀ-ž\s]+)"
                                minlength="2" maxlength="30"
                                type="text" class="form-control"
                                name="last_name"
                                value="{{ $propietario->apellido }}"
                                required autofocus disabled>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                            <label for="cedula" class="col-md-4 control-label">Cédula</label>

                            <div class="col-md-1">
                                <select name="nacionalidad">
                                    <option value="
                                    {{ $propietario->nTipoNacionalidad->id
                                    }}">{{ $propietario->nTipoNacionalidad->letra }}</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <input id="cedula" type="number"
                                class="form-control" name="cedula"
                                value="{{ $propietario->cedula }}"
                                min="100000" max="999999999"
                                minlength="6" maxlength="9"
                                required autofocus disabled>

                                @if ($errors->has('cedula'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rif') ? ' has-error' : '' }}">
                            <label for="rif" class="col-md-4 control-label">Rif</label>

                            <div class="col-md-1">
                                <select name="rif_tipo">
                                    <option value="{{ $propietario->nTipoRif->id }}">
                                        {{ $propietario->nTipoRif->letra }}
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <input id="rif" type="number"
                                class="form-control" name="rif"
                                value="{{ $propietario->rif }}"
                                min="100000" max="999999999"
                                minlength="6" maxlength="9"
                                required autofocus disabled>

                                @if ($errors->has('rif'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rif') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Dirección</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address"
                                value="{{ $propietario->direccion }}"
                                required autofocus disabled>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div align="center">
                                @can('update')
                                <a href="{{ route('propietario.edit', ['id' => $propietario->id ]) }}"
									class="btn" style="background-color: #a90000;
                                    color: #e0e0d1;">
									Editar
								</a>
                                @endcan
                                <!-- no se puede eliminar si pertenece
									a una inscripcion
                                @can('delete')
                                <button disabled class="btn"
                                    style="background-color: #a90000;
                                    color: #e0e0d1;">
                                    Eliminar
                                </button>
                                @endcan
                                -->
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection