@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
          <ul class="nav nav-pills">
            <li role="presentation"><a href="{{ route('propietario/create') }}">Propietario</a></li>
            <li role="presentation"><a href="{{ route('solicitante') }}">Solicitante</a></li>
            <li role="presentation"><a href="{{ route('inmueble/create') }}">Inmueble</a></li>
            <li role="presentation" class="active"><a href="{{ route('linderos') }}">Linderos</a></li>
            <li role="presentation"><a href="{{ route('documento') }}">Documento</a></li>
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"
                style="background-color: #a90000;
                color: #e0e0d1;">Linderos y Medidas Actuales</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('create_linderos') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('frente_linderos') ? ' has-error' : '' }}">
                            <label for="frente_linderos" class="col-md-4 control-label">Frente</label>

                            <div class="col-md-6">
                                <input id="frente_linderos"
                                type="number" step="0.00001"
                                class="form-control"
                                name="frente_linderos"
                                value="{{ old('frente_linderos') }}"
                                required autofocus
                                min="1" max="99999999"
                                minlength="1" maxlength="8">

                                @if ($errors->has('frente_linderos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('frente_linderos') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fondo_linderos') ? ' has-error' : '' }}">
                            <label for="fondo_linderos" class="col-md-4 control-label">Fondo</label>

                            <div class="col-md-6">
                                <input id="fondo_linderos"
                                type="number" step="0.00001"
                                class="form-control"
                                name="fondo_linderos"
                                value="{{ old('fondo_linderos') }}"
                                required autofocus
                                min="1" max="99999999"
                                minlength="1" maxlength="8">

                                @if ($errors->has('fondo_linderos'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fondo_linderos') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ld_linderos') ? ' has-error' : '' }}">
                            <label for="ld_linderos" class="col-md-4 control-label">Lindero Derecho</label>

                            <div class="col-md-3">
                                <input id="ld_linderos"
                                type="number" step="0.00001"
                                class="form-control"
                                name="ld_linderos"
                                value="{{ old('ld_linderos') }}"
                                required autofocus
                                min="1" max="99999999"
                                minlength="1" maxlength="8">

                                @if ($errors->has('ld_linderos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('ld_linderos') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <select name="unidad_medida_ld"
                                    class="form-control">
                                    <option value="metros">metros</option>
                                    <option value="hectareas">hectáreas</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('li_linderos') ? ' has-error' : '' }}">
                            <label for="li_linderos" class="col-md-4 control-label">Lindero Izquierdo</label>

                            <div class="col-md-3">
                                <input id="li_linderos"
                                type="number" step="0.00001" class="form-control"
                                name="li_linderos"
                                value="{{ old('li_linderos') }}"
                                required autofocus
                                min="1" max="99999999"
                                minlength="1" maxlength="8">

                                @if ($errors->has('li_linderos'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('li_linderos') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="col-md-3">
                                <select name="unidad_medida_li"
                                    class="form-control">
                                    <option value="metros">metros</option>
                                    <option value="hectareas">hectáreas</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div align="center">
                                <!-- <button type="submit"
                                    style="background-image: url('./images/save.png');
                                    width: 60px; height: 60px;" title="Registrar">
                                </button> -->
                                <button type="submit" class="btn"
                                    style="background-color: #a90000;
                                    color: #e0e0d1;">
                                    Registrar
                                </button>
                                <button class="btn"
                                    style="background-color: #a90000;
                                    color: #e0e0d1;">
                                    Editar
                                </button>
                                <a href="{{ url()->previous() }}"
									class="btn" style="background-color: #a90000;
                                    color: #e0e0d1;">
									Regresar
								</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection