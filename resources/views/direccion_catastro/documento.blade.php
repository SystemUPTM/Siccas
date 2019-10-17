@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
          <ul class="nav nav-pills">
            <li role="presentation"><a href="{{ route('propietario/create') }}">Propietario</a></li>
            <li role="presentation"><a href="{{ route('solicitante') }}">Solicitante</a></li>
            <li role="presentation"><a href="{{ route('inmueble/create') }}">Inmueble</a></li>
            <li role="presentation"><a href="{{ route('linderos') }}">Linderos</a></li>
            <li role="presentation" class="active"><a href="{{ route('documento') }}">Documento</a></li>
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"
                style="background-color: #a90000;
                color: #e0e0d1;">Datos del Documento</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('create_documento') }}">
                        {{ csrf_field() }}

                        <!-- Document data-->
                        <div class="form-group{{ $errors->has('tipo_adjudicacion') ? ' has-error' : '' }}">
                            <label for="tipo_adjudicacion" class="col-md-4 control-label">Tipo de Operación</label>
                            <div class="col-md-6">
                            <select name="tipo_adjudicacion" class="form-control">
                                <option value="1">Compra y Venta</option>
                                <option value="2">Declaración de Inmuebles</option>
                                <option value="3">Terrenos del INTI</option>
                                <option value="4">Terrenos del Municipio</option>
                                <option value="5">Aclaratoria</option>
                                <option value="6">Dacion</option>
                                <option value="7">Loteamiento</option>
                                <option value="8">Permiso de Ocupacion</option>
                                <option value="9">Carta Agraria</option>
                                <option value="10">Sentencias</option>
                            </select>                                
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('numero_documento') ? ' has-error' : '' }}">
                            <label for="numero_documento" class="col-md-4 control-label">N° del Documento</label>

                            <div class="col-md-6">
                                <input id="numero_documento"
                                type="number"
                                class="form-control"
                                name="numero_documento"
                                value="{{ old('numero_documento') }}"
                                required autofocus
                                min="1" max="99999999"
                                minlength="1" maxlength="8">

                                @if ($errors->has('numero_documento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('numero_documento') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('folios_documento') ? ' has-error' : '' }}">
                            <label for="folios_documento" class="col-md-4 control-label">Folios Documento</label>

                            <div class="col-md-6">
                                <input id="folios_documento"
                                type="number"
                                class="form-control"
                                name="folios_documento"
                                value="{{ old('folios_documento') }}"
                                required autofocus
                                min="1" max="99999999"
                                minlength="1" maxlength="8">

                                @if ($errors->has('folios_documento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('folios_documento') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('protocolo_documento') ? ' has-error' : '' }}">
                            <label for="protocolo_documento" class="col-md-4 control-label">Protocolo</label>

                            <div class="col-md-6">
                                <input id="protocolo_documento"
                                type="number"
                                class="form-control"
                                name="protocolo_documento"
                                value="{{ old('protocolo_documento') }}"
                                required autofocus
                                min="1" max="99999999"
                                minlength="1" maxlength="8">

                                @if ($errors->has('protocolo_documento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('protocolo_documento') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tomo_documento') ? ' has-error' : '' }}">
                            <label for="tomo_documento" class="col-md-4 control-label">Tomo</label>

                            <div class="col-md-6">
                                <input id="tomo_documento"
                                type="number" class="form-control"
                                name="tomo_documento"
                                value="{{ old('tomo_documento') }}"
                                required autofocus
                                min="1" max="99999999"
                                minlength="1" maxlength="8">

                                @if ($errors->has('tomo_documento'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tomo_documento') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('trimestre_documento') ? ' has-error' : '' }}">
                            <label for="trimestre_documento" class="col-md-4 control-label">Trimestre</label>
                            <div class="col-md-2">
                            <select name="trimestre_documento" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('fecha_documento') ? ' has-error' : '' }}">
                            <label for="fecha_documento" class="col-md-4 control-label">Fecha</label>

                                <div class="col-md-6">
                                    <input id="fecha_documento" type="date" class="form-control" name="fecha_documento" value="{{ old('fecha_documento') }}" required autofocus>

                                    @if ($errors->has('fecha_documento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fecha_documento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="form-group{{ $errors->has('area_documento') ? ' has-error' : '' }}">
                            <label for="area_documento" class="col-md-4 control-label">Área Total</label>

                                <div class="col-md-6">
                                    <input id="area_documento"
                                    type="number" step="0.00001"
                                    class="form-control"
                                    name="area_documento"
                                    value="{{ old('area_documento') }}"
                                    required autofocus
                                    min="1" max="99999999"
                                    minlength="1" maxlength="8">

                                    @if ($errors->has('area_documento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('area_documento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>

                        <div class="form-group{{ $errors->has('valor_documento') ? ' has-error' : '' }}">
                            <label for="valor_documento" class="col-md-4 control-label">Valor Total</label>

                                <div class="col-md-6">
                                    <input id="valor_documento"
                                    type="number" step="0.00001"
                                    class="form-control"
                                    name="valor_documento"
                                    value="{{ old('valor_documento') }}"
                                    required autofocus
                                    min="1" max="99999999"
                                    minlength="1" maxlength="8">

                                    @if ($errors->has('valor_documento'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('valor_documento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('observacion_documento') ? ' has-error' : '' }}">
                            <label for="observacion_documento" class="col-md-4 control-label">Observaciones</label>

                            <div class="col-md-6">
                                <textarea id="observacion_documento" pattern="([^\s][A-zÀ-ž\s]+)"
                                minlength="2" maxlength="150"
                                type="text" class="form-control" name="observacion_documento" value="{{ old('observacion_documento') }}" rows="1" required autofocus>                                    
                                </textarea> 

                                @if ($errors->has('observacion_documento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observacion_documento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Document -->

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
                                <button type="reset" class="btn"
                                    style="background-color: #a90000;
                                    color: #e0e0d1;">
                                    Limpiar
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
