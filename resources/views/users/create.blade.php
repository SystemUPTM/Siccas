<script type="text/javascript">
    var preguntas = [];
    var preguntasElements = [];
    var currentSelected = '';
    var previousSelected = '';
    // get default values
    window.onload = function(){
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log('response: ' + this.responseText);
                preguntas = JSON.parse(this.responseText);
                preguntasElements.push(document.getElementById("pregunta1"));
                preguntasElements.push(document.getElementById("pregunta2"));

                console.log('preguntas ' + preguntas);
                for(var i = 0; i < preguntas.length; i++){
                    var selected = false;
                    console.log('pregunta id: ' + preguntas[i].id);
                    if(i == 0){
                        selected = true;
                        preguntasElements[0].options[preguntasElements[0].options.length] = new Option(preguntas[i].pregunta, preguntas[i].pregunta, selected, selected);
                    } else {
                        if(i == 1){
                            selected = true;
                            preguntasElements[1].options[preguntasElements[1].options.length] = new Option(preguntas[i].pregunta, preguntas[i].pregunta, selected, selected);
                        } else{
                            preguntasElements[0].options[preguntasElements[0].options.length] = new Option(preguntas[i].pregunta, preguntas[i].pregunta, selected, selected);
                            preguntasElements[1].options[preguntasElements[1].options.length] = new Option(preguntas[i].pregunta, preguntas[i].pregunta, selected, selected);
                        }
                        // preguntasElement2.options[preguntasElement2.options.length] = new Option(preguntas[i].pregunta, preguntas[i].nombre, selected, selected);
                        
                    }
                   //  preguntasElement1.options[preguntasElement1.options.length] = new Option(preguntas[i].pregunta, preguntas[i].nombre, selected, selected);
                }
                console.log('current select: ', 
                preguntasElements[0].options[preguntasElements[0].selectedIndex].value);
                console.log('previous select: ', 
                preguntasElements[1].options[preguntasElements[1].selectedIndex].value);
                currentSelected = preguntasElements[0].options[preguntasElements[0].selectedIndex].value;
                previousSelected = preguntasElements[1].options[preguntasElements[1].selectedIndex].value;
            }
        };
        xhttp.open("GET", "{{ route('recuperacion.preguntas')}}");
        xhttp.send();

    }
    /* end get default values */

    function onChange(selectObj) {
        // ordening list to have the select element in the first
        // position
        
        var auxListElements = [];
        auxListElements.push(selectObj);
        console.log('auxListElements:', auxListElements);
        console.log('preguntasElements:', preguntasElements);
        for (var elementId = 0; elementId < preguntasElements.length; elementId++){
            console.log('select name id: ', preguntasElements[elementId]);
            console.log('select name aux: ', auxListElements[0].name);
            if(preguntasElements[elementId].name !== auxListElements[0].name){
                auxListElements.push(preguntasElements[elementId]);
                console.log('selectObj.name.distint: ', preguntasElements[elementId]);
            }

        }
        preguntasElements = auxListElements;
        currentSelected = preguntasElements[0].options[preguntasElements[0].selectedIndex].value;
        previousSelected = preguntasElements[1].options[preguntasElements[1].selectedIndex].value;

        for(var elementId = 0; elementId < preguntasElements.length; elementId++){

            currentSelected = preguntasElements[elementId].options[preguntasElements[elementId].selectedIndex].value;
                
            // elimino todas las pregunta del select actual
            while (preguntasElements[elementId].options.length) {
                preguntasElements[elementId].remove(0);
            }

            for(var i = 0; i < preguntas.length; i++){
                var selectedCurrent = false;

                if(preguntas[i].pregunta === currentSelected) {
                    selectedCurrent = true;
                    console.log('preguntaSeleccionada: ', currentSelected);
                }
                if(preguntas[i].pregunta !== previousSelected){
                    preguntasElements[elementId].options[preguntasElements[elementId].options.length] = new Option(preguntas[i].pregunta, preguntas[i].pregunta, selectedCurrent, selectedCurrent);
                }

            }
            if(elementId < preguntasElements.length -1){
                previousSelected = currentSelected;
            }
        }
    }
    /* end select sectores */

    function onlyOne(checkbox) {

        var checkboxes = document.getElementsByName('roles')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
            else {
                if(item.id == 'super-admin') {
                    // document.getElementById('company').style.display = "none";
                    item.checked = true;
                    // console.log(item.id);
                } else if (item.id == 'admin'){
                    // document.getElementById('company').style.display = "block";
                    item.checked = true;
                }
            }
        })
    }
</script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrar Usuario</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        
                            @foreach($roles as $n)
                            <div class="form-group">
                                @if($n->id === 1)
                                    <label for="Rol" class="col-md-4 control-label">Roles</label>
                                @else
                                    <label for="Roles" class="col-md-4 control-label"></label>
                                @endif
                                <div class="col-md-6">
                                    <input id="{{ $n->name }}" type="checkbox" name="roles" value="{{ $n->id }}"
                                    @if(!isset($edit))
                                    {{ $n->name == 'admin' ? 'checked' : '' }} onclick="onlyOne(this)"> {{ $n->name }}
                                    @else
                                    {{ $users->hasRole($n->name) ? 'checked' : '' }} onclick="onlyOne(this)"> {{ $n->name }}
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        

                        <!-- pregunta 1 inicio -->
                        <div class="form-group">
                            <label for="pregunta 1" class="col-md-4 control-label">Pregunta Recuperación 1</label>
    
                            <div class="col-md-6">
                                <select name="pregunta1" id="pregunta1" onchange="onChange(this);" class="form-control">
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="respuesta 1" class="col-md-4 control-label">Respuesta</label>
        
                            <div class="col-md-6">
                                <input id="respuesta1" type="text" class="form-control" name="respuesta1" required>
                            </div>
                        </div>
                        <!-- pregunta 1 fin -->
                        <!-- pregunta 2 inicio -->
                        <div class="form-group">
                            <label for="pregunta 2" class="col-md-4 control-label">Pregunta Recuperación 2</label>
                                
                            <div class="col-md-6">
                                <select name="pregunta2" id="pregunta2" onchange="onChange(this);" class="form-control">
                                </select>
                            </div>
                        </div>
                            
                        <div class="form-group">
                            <label for="respuesta 2" class="col-md-4 control-label">Respuesta</label>
                                    
                            <div class="col-md-6">
                                <input id="respuesta2" type="text" class="form-control" name="respuesta2" required>
                            </div>
                        </div>
                        <!-- pregunta 2 fin -->

                        <div class="form-group">
                            <div align="center">
                                <button type="submit" class="btn" style="background-color: #a90000;
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
