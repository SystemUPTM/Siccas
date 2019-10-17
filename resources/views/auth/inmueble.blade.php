@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"
                style="background-color: #a90000;
                color: #e0e0d1;">Inmueble
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="#">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('ubicacion_inmueble') ? ' has-error' : '' }}">
                            <label for="ubicacion_inmueble" class="col-md-4 control-label">Ubicacion</label>
    
                            <div class="col-md-6">
                                <input id="ubicacion_inmueble" 
                                type="text" class="form-control"
                                name="ubicacion_inmueble"
                                value="{{ $inmueble->ubicacion }}"
                                required autofocus disabled>
    
                                @if ($errors->has('ubicacion_inmueble'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ubicacion_inmueble') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('area_inmueble') ? ' has-error' : '' }}">
                            <label for="area_inmueble" class="col-md-4 control-label">Área</label>
    
                            <div class="col-md-6">
                                <input id="area_inmueble"
                                    type="number"
                                    min="1" max="99999999"
                                    minlength="1" maxlength="8"
                                    class="form-control"
                                    name="area_inmueble"
                                    value="{{ $inmueble->area }}"
                                    required autofocus disabled>
    
                                @if ($errors->has('area_inmueble'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('area_inmueble') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('valor_inmueble') ? ' has-error' : '' }}">
                            <label for="valor_inmueble" class="col-md-4 control-label">Valor</label>
    
                            <div class="col-md-6">
                                <input id="valor_inmueble"
                                    min="1" max="99999999"
                                    minlength="1" maxlength="8"
                                    type="number"
                                    class="form-control"
                                    name="valor_inmueble"
                                    value="{{ $inmueble->valor }}"
                                    required autofocus disabled>
    
                                @if ($errors->has('valor_inmueble'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('valor_inmueble') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div align="center">
                                <button disabled class="btn"
                                    style="background-color: #a90000;
                                    color: #e0e0d1;">
                                    Editar
                                </button>
                                <button disabled class="btn"
                                    style="background-color: #a90000;
                                    color: #e0e0d1;">
                                    Eliminar
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection