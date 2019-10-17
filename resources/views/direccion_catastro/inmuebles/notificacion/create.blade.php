<script type="text/javascript">

    function onChange(selectObj) {
        var idx = selectObj.selectedIndex;
        var id_parroquia= selectObj.options[idx].index + 1;
        console.log("wich: ", id_parroquia)
        var xhttp;
        xhttp = new XMLHttpRequest();
        var sectores = [];
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log('response: ' + this.responseText);
                sectores = JSON.parse(this.responseText);
                var sectoresElement = document.getElementById("sectores");

                console.log('sectores ' + sectores);
                while (sectoresElement.options.length) {
                    sectoresElement.remove(0);
                }
                for(var i = 0; i < sectores.length; i++){
                    var selected = false;
                    console.log('sector id: ' + sectores[i].id);
                    console.log('sector nombre: ' + sectores[i].nombre);
                    sectoresElement.options[sectoresElement.options.length] = new Option(sectores[i].nombre, sectores[i].nombre, selected, selected);
                }
            }
        };
        console.log('id_parroquia: ' + id_parroquia);
        var url = '{{ route("direcciones.sectores", ":id_parroquia")}}';
        url = url.replace(':id_parroquia', id_parroquia );
        console.log('url: ' + url);
        xhttp.open("GET", url);
        xhttp.send();
    }
    /* end select sectores */

    // get default values
    window.onload = function(){
        document.getElementById("fecha").value = "{{ $data['date'] }}";
        document.getElementById("tasa_anual").value = 1;
        document.getElementById("tasa_trimestral").value = 1;

                var xhttp;
        xhttp = new XMLHttpRequest();
        var parroquias = [];
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log('response: ' + this.responseText);
                parroquias = JSON.parse(this.responseText);
                var parroquiasElement = document.getElementById("parroquias");

                console.log('parroquias ' + parroquias);
                for(var i = 0; i < parroquias.length; i++){
                    var selected = false;
                    console.log('parroquia id: ' + parroquias[i].id);
                    if(parroquias[i].nombre == 'Lagunillas'){
                        console.log('selected: ' + selected);
                        selected = true;
                        console.log('selected: ' + selected);
                    }
                    parroquiasElement.options[parroquiasElement.options.length] = new Option(parroquias[i].nombre, parroquias[i].nombre, selected, selected);
                }
                onChange(document.getElementById("parroquias"));

            }
        };
        xhttp.open("GET", "{{ route('direcciones.parroquias')}}");
        xhttp.send();
    }

    function onChangeTasa(tasa) {
        console.log('tasa: ', tasa.value);
        if(tasa.value > 100)
            tasa.value = 100;
        if(tasa.value < 0)
            tasa.value = 1;
    }
</script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"
                style="background-color: #a90000;
                color: #e0e0d1;">Notificación de Impuesto Inmobiliario del Propietario
                {{ $data['propietario']->nombre }}
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('inmuebles.notificacion.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="Referencia del Documento" class="col-md-4">
                                Referencia del Documento
                            </label>
                        </div>
                        
                        <div class="form-group{{ $errors->has('numero_notificacion') ? ' has-error' : '' }}">
                            <label for="N°" class="col-md-1 control-label">
                                N° 
                            </label>
    
                            <div class="col-md-2">
                                <input type="number" class="form-control"
                                    name="numero_notificacion"
                                    value="{{ $data['last_nro'] + 1 }}"
                                    required autofocus readonly>
    
                                @if ($errors->has('numero_notificacion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numero_notificacion') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <label for="fecha" class="col-md-1 control-label">Fecha</label>

                            <div class="col-md-5">
                                <input id="fecha" type="date" class="form-control"
                                    name="fecha"
                                    required autofocus>

                                @if ($errors->has('fecha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="tomo" class="col-md-1 control-label">Tomo</label>
                            <div class="col-md-2">
                                <input name="tomo" id="tomo" type="number" class="form-control"
                                    value="{{ $data['last_tomo'] + 1 }}"
                                    required autofocus readonly>

                                @if ($errors->has('tomo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tomo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="notificacion_impuesto_inmobiliario" class="col-md-6">
                                Notificación de Impuesto Inmobiliario
                            </label>
                        </div>
                        
                        <input name="id_impuesto_calculado"
                            value="{{ $data['calculado']->id }}" hidden>

                        <div class="form-group{{ $errors->has('calculado') ? ' has-error' : '' }}">
                            <label for="calculado" class="col-md-3 control-label">
                                Total a pagar
                            </label>

                            <div class="col-md-6">
                                <input minlength="3" maxlength="30"
                                type="number" class="form-control"
                                value="{{ $data['calculado']->cantidad }}" required autofocus disabled>

                                @if ($errors->has('calculado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('calculado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-3 control-label">Tipo</label>
    
                            <div class="col-md-6">
                                <select name="id_n_tipo_impuesto" id="id_n_tipo_impuesto"
                                    class="form-control">
                                    @foreach($data['tipos'] as $tipo)
                                        <option value="{{ $tipo->id }}">
                                            {{ $tipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-3 control-label">Dirección</label>
                            <div class="col-md-3">
                                <select name="parroquia" id="parroquias" onchange="onChange(this);">
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="sector" id="sectores">
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_solicitante') ? ' has-error' : '' }}">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6">
                                <input id="address_solicitante" type="text" class="form-control" name="address_solicitante" value="{{ old('address_solicitante') }}" required autofocus>

                                @if ($errors->has('address_solicitante'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_solicitante') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('trimestre') ? ' has-error' : '' }}">
                            <label for="trimestre" class="col-md-3 control-label">Trimestre</label>

                            <div class="col-md-6">
                                <select name="id_n_tipo_trimestre" id="id_n_tipo_trimestre"
                                    class="form-control">
                                    @foreach($data['trimestres'] as $trimestre)
                                        <option value="{{ $trimestre->id }}"
                                        >{{ $trimestre->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tasa_anual') ? ' has-error' : '' }}">
                            <label for="tasa_anual" class="col-md-3 control-label">
                                Tasa Anual
                            </label>

                            <div class="col-md-6">
                                <input id="tasa_anual" type="number" class="form-control"
                                name="tasa_anual" value="{{ old('tasa_anual') }}"
                                min="0" max="100" minlength="1" maxlength="3"
                                required autofocus onchange="onChangeTasa(this);">

                                @if ($errors->has('tasa_anual'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tasa_anual') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tasa_trimestral') ? ' has-error' : '' }}">
                            <label for="tasa_anual" class="col-md-3 control-label">
                                Tasa Trimestral
                            </label>
    
                            <div class="col-md-6">
                                <input id="tasa_trimestral" type="number" class="form-control"
                                    name="tasa_trimestral" value="{{ old('tasa_trimestral') }}"
                                    min="0" max="100" minlength="1" maxlength="3"
                                    required autofocus onchange="onChangeTasa(this);">
    
                                @if ($errors->has('tasa_trimestral'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tasa_trimestral') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('observaciones') ? ' has-error' : '' }}">
                            <label for="observaciones" class="col-md-3 control-label">
                                Observaciones
                            </label>

                            <div class="col-md-6">
                                <input id="observaciones" type="text" class="form-control"
                                    name="observaciones" value="{{ old('observaciones') }}"
                                    autofocus>

                                @if ($errors->has('observaciones'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('observaciones') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div align="center">
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
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection