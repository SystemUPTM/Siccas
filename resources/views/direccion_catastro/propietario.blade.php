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
            <li role="presentation" class="active"><a href="{{ route('propietario/create') }}">Propietario</a></li>
            <li role="presentation"><a href="{{ route('solicitante') }}">Solicitante</a></li>
            <li role="presentation"><a href="{{ route('inmueble/create') }}">Inmueble</a></li>
            <li role="presentation"><a href="{{ route('linderos') }}">Linderos</a></li>
            <li role="presentation"><a href="{{ route('documento') }}">Documento</a></li>
          </ul>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"
                style="background-color: #a90000;
                color: #e0e0d1;">Propietario
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('propietario/store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" pattern="([^\s][A-zÀ-ž\s]+)"
                                minlength="2" maxlength="30"
                                type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

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
                                type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('genero') ? ' has-error' : '' }}">
                            <label for="genero" class="col-md-4 control-label">Género</label>

                            <div class="col-md-6">
                                <select name="genero" class="form-control">
                                    <option value="">{{old('genero')}}</option>
                                    <option value="F">Femenino</option>
                                    <option value="M">Masculino</option>
                                </select>
                            </div>
                            @if ($errors->has('genero'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('genero') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('vivienda') ? ' has-error' : '' }}">
                            <label for="vivienda" class="col-md-4 control-label">Vivienda</label>

                            <div class="col-md-6">
                                <select name="vivienda" class="form-control">
                                    <option value="">{{old('vivienda')}}</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            @if ($errors->has('vivienda'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('vivienda') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('cedula') ? ' has-error' : '' }}">
                            <label for="cedula" class="col-md-4 control-label">Cédula</label>

                            <div class="col-md-1">
                                <select name="nacionalidad" class="form-control">
								    <option value="">-</option>
                                    <option value="1">V</option>
                                    <option value="2">E</option>
                                </select>
                            </div>

                            <div class="col-md-5">
                                <input id="cedula" type="number"
                                class="form-control" name="cedula"
                                value="{{ old('cedula') }}"
                                min="100000" max="999999999"
                                minlength="6" maxlength="9"
                                required autofocus>

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
                                <select name="rif_tipo" class="form-control">
                                    <option value="">-</option>
                                    <option value="1">V</option>
                                    <option value="2">E</option>
                                    <option value="3">P</option>
                                    <option value="4">G</option>
                                    <option value="5">J</option>
                                    <option value="6">C</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input id="rif" type="number"
                                class="form-control" name="rif"
                                value="{{ old('rif') }}"
                                min="100000" max="999999999"
                                minlength="6" maxlength="9"
                                required autofocus>

                                @if ($errors->has('rif'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rif') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-2">
                                <input id="rif_numero" type="number"
                                class="form-control" name="rif_numero"
                                value="{{ old('rif_numero') }}"
                                minlength="1" maxlength="1"
                                required autofocus>

                                @if ($errors->has('rif_numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('rif_numero') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Dirección</label>
                            <div class="col-md-3">
                                <select name="parroquia" id="parroquias" onchange="onChange(this);" class="form-control">
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="sector" id="sectores" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
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
