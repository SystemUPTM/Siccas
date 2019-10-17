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
    /* end get default values */

</script>


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
          <ul class="nav nav-pills">
            <li role="presentation"><a href="{{ route('propietario/create') }}">Propietario</a></li>
            <li role="presentation"><a href="{{ route('solicitante') }}">Solicitante</a></li>
            <li role="presentation" class="active"><a href="{{ route('inmueble/create') }}">Inmueble</a></li>
            <li role="presentation"><a href="{{ route('linderos') }}">Linderos</a></li>
            <li role="presentation"><a href="{{ route('documento') }}">Documento</a></li>
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"
                style="background-color: #a90000;
                color: #e0e0d1;">Inmueble</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('inmueble/store') }}">
                        {{ csrf_field() }}

                        <!-- Inmueble -->

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="ubicacion" class="col-md-4 control-label">Ubicación</label>
                            <div class="col-md-3">
                                <select name="parroquia" id="parroquias" onchange="onChange(this);" class="form-control">
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="sector" id="sectores" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ubicacion_inmueble') ? ' has-error' : '' }}">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-6">
                                <input id="ubicacion_inmueble" type="text" class="form-control" name="ubicacion_inmueble" value="{{ old('ubicacion_inmueble') }}" required autofocus>

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
                                type="number" step="0.00001"
                                min="1" max="99999999"
                                minlength="1" maxlength="8"
                                class="form-control"
                                name="area_inmueble"
                                value="{{ old('area_inmueble') }}" required autofocus>

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
                                type="number" step="0.00001" class="form-control" name="valor_inmueble" value="{{ old('valor_inmueble') }}" required autofocus>

                                @if ($errors->has('valor_inmueble'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('valor_inmueble') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- Inmueble -->

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