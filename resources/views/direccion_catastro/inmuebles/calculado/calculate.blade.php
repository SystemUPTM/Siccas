<script type="text/javascript">
    // get default values
    window.onload = function(){
        document.getElementById("resultado_1").value = 
            document.getElementById("base").value * document.getElementById("porcentaje").value;
        document.getElementById("base2").value = document.getElementById("resultado_1").value;

        document.getElementById("resultado_2").value = 
            document.getElementById("base2").value * (document.getElementById("porcentaje2").value/100);
        document.getElementById("base3").value = document.getElementById("resultado_2").value;

        document.getElementById("resultado_3").value = 
            document.getElementById("base3").value / document.getElementById("porcentaje3").value;
        document.getElementById("result_3").value = document.getElementById("resultado_3").value;

    }
    /* begin 1st calculo */
    // get resultado_1 by changes in porcentaje input
    function onChangePorcentaje(porcentaje) {
        console.log('porcentaje: ', porcentaje.value);
        if(porcentaje.value > 0 && porcentaje.value < 101){
            document.getElementById("resultado_1").value = 
                document.getElementById("base").value * porcentaje.value/100;
            document.getElementById("base2").value = document.getElementById("resultado_1").value;
        } else {
            if(porcentaje.value > 100)
                porcentaje.value = 100;
            if(porcentaje.value <= 0)
                porcentaje.value = 1;
        }
    }

    function onChange(selectObj) {
        var idx = selectObj.selectedIndex;
        var which = selectObj.options[idx].value;
        console.log("wich: ", which)
        // var result = 0;
        
        if(which == 0){
            document.getElementById("resultado_1").value = 
                document.getElementById("base").value * document.getElementById("porcentaje").value;
        }
        if(which == 1){
            document.getElementById("resultado_1").value = 
                document.getElementById("base").value / document.getElementById("porcentaje").value;
        }
        if(which == 2){
            document.getElementById("resultado_1").value = 
                document.getElementById("base").value + document.getElementById("porcentaje").value;
        }
        if(which == 3){
            document.getElementById("resultado_1").value = 
                document.getElementById("base").value + document.getElementById("porcentaje").value;
        }
    }
    /* end 1st calculo */

    /* begin 2 calculo */
    // get resultado_2 by changes in porcentaje input
    function onChangePorcentaje2(porcentaje2) {
        console.log('porcentaje2: ', porcentaje2.value);
        if(porcentaje2.value > 0 && porcentaje2.value < 101){
            document.getElementById("resultado_2").value = 
                document.getElementById("resultado_1").value * porcentaje2.value/100;

            document.getElementById("base3").value = document.getElementById("resultado_2").value;
        } else {
            if(porcentaje2.value > 100)
                porcentaje2.value = 100;
            if(porcentaje2.value <= 0)
                porcentaje2.value = 1;
        }
    }

    function onChange2(selectObj2) {
        var idx2 = selectObj2.selectedIndex;
        var which2 = selectObj2.options[idx2].value;
        console.log("wich2: ", which2)
        
        if(which2 == 0){
            document.getElementById("resultado_2").value = 
                document.getElementById("base2").value * document.getElementById("porcentaje2").value;
        }
        if(which2 == 1){
            document.getElementById("resultado_2").value = 
                document.getElementById("base2").value / document.getElementById("porcentaje2").value;
        }
        if(which2 == 2){
            document.getElementById("resultado_2").value = 
                document.getElementById("base2").value + document.getElementById("porcentaje2").value;
        }
        if(which2 == 3){
            document.getElementById("resultado_2").value = 
                document.getElementById("base2").value + document.getElementById("porcentaje2").value;
        }
    }
    /* end 2 calculo */

    /* begin 3 calculo */
    // get resultado_3 by changes in porcentaje input
    function onChangePorcentaje3(porcentaje3) {
        console.log('porcentaje3: ', porcentaje3.value);
        if(porcentaje3.value > 0 && porcentaje3.value < 10000){
            document.getElementById("resultado_3").value = 
                document.getElementById("resultado_3").value * porcentaje3.value/100;

            document.getElementById("result_3").value = document.getElementById("resultado_3").value;
        } else {
            if(porcentaje3.value > 10000)
                porcentaje3.value = 10000;
            if(porcentaje3.value <= 0)
                porcentaje3.value = 1;
        }
    }

    function onChange3(selectObj3) {
        var idx3 = selectObj3.selectedIndex;
        var which3 = selectObj3.options[idx3].value;
        console.log("wich3: ", which3)
        
        if(which3 == 0){
            document.getElementById("resultado_3").value = 
                document.getElementById("base3").value * document.getElementById("porcentaje3").value;
            document.getElementById("result_3").value = document.getElementById("resultado_3").value;
        }
        if(which3 == 1){
            document.getElementById("resultado_3").value = 
                document.getElementById("base3").value / document.getElementById("porcentaje3").value;
            document.getElementById("result_3").value = document.getElementById("resultado_3").value;
        }
        if(which3 == 2){
            document.getElementById("resultado_3").value = 
                document.getElementById("base3").value + document.getElementById("porcentaje3").value;
            document.getElementById("result_3").value = document.getElementById("resultado_3").value;
        }
        if(which3 == 3){
            document.getElementById("resultado_3").value = 
                document.getElementById("base3").value + document.getElementById("porcentaje3").value;
            document.getElementById("result_3").value = document.getElementById("resultado_3").value;
        }
    }
    /* end 3 calculo */
</script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #a90000; color: #e0e0d1;">
                        Calcular Impuesto del propietario 
                        {{ $inscripcion->propietario->nombre }}
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" onSubmit="return false">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="Metros" class="col-md-2 control-label">Metros</label>
                            <label for="Multplicación" class="col-md-1 control-label">x</label>
                            <label for="Valor" class="col-md-2 control-label">Valor</label>
                            <label for="Metros" class="col-md-1 control-label">=</label>
                            <label for="Impuesto Base" class="col-md-4 control-label">
                                Impuesto Base
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="Área total" class="col-md-2 control-label">
                                {{ $inscripcion->documento->area_total }}
                            </label>
                            <label for="Multipliación" class="col-md-1 control-label">x</label>
                            <label for="Valor total" class="col-md-2 control-label">
                                    {{ $inscripcion->documento->valor_total }}
                                </strong>
                            </label>
                            <label for="Igualdad" class="col-md-1 control-label">=</label>
                            <label for="Impuesto base" class="col-md-4 control-label">
                                {{ $inscripcion->documento->impuesto_base }}
                            </label>
                        </div>
                        <hr>

                        <!-- begin resultado_1 -->
                        <div class="form-group">
                            <label for="Impuesto Base" class="col-md-3 control-label">
                                Impuesto Base
                            </label>
                            <label for="Operación" class="col-md-2 control-label">
                                Operación
                            </label>
                            <label for="Porcentaje" class="col-md-2 control-label">
                            </label>
                            <label for="Igualdad" class="col-md-1 control-label">=</label>
                            <label for="Resultado 1" class="col-md-3 control-label">
                                Resultado 1
                            </label>
                        </div>
                        
                        <div class="form-group{{ $errors->has('porcentaje') ? ' has-error' : '' }}">
                            <div class="col-md-3" align="center">
                                <input id="base" type="number"
                                    class="form-control" name="base"
                                    value="{{ $inscripcion->documento->impuesto_base }}"
                                    required autofocus disabled>
                            </div>
                            <label for="Operación" class="col-md-2 control-label">
                                <select name="operacion" onchange="onChange(this);">
                                    <option value="0">x</option>
                                    <option value="1">/</option>
                                    <option value="2">+</option>
                                    <option value="3">-</option>
                                </select>
                            </label>
                            <div class="col-md-2">
                                <input id="porcentaje" type="number"
                                    onchange="onChangePorcentaje(this);"
                                    class="form-control" name="porcentaje"
                                    value="5" min="1" max="100"
                                    minlength="1" maxlength="3"
                                    required autofocus>
                            </div>
                            <label for="Igualdad" class="col-md-1 control-label">=</label>
                            <div class="col-md-3">
                                <input id="resultado_1" type="number"
                                    class="form-control" name="resultado_1"
                                    required autofocus disabled>
                            </div>
    
                            <div class="col-md-6">
    
                                @if ($errors->has('porcentaje'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('porcentaje') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <!-- end resultado_1 -->

                        <!-- begin resultado_2 -->
                        <div class="form-group">
                            <label for="Resultado 1" class="col-md-3 control-label">
                                Resultado 1
                            </label>
                            <label for="Operación" class="col-md-2 control-label">
                                Operación
                            </label>
                            <label for="Porcentaje" class="col-md-2 control-label">
                                Porcentaje
                            </label>
                            <label for="Igualdad" class="col-md-1 control-label">=</label>
                            <label for="Resultado 2" class="col-md-3 control-label">
                                Resultado 2
                            </label>
                        </div>

                        <div class="form-group{{ $errors->has('porcentaje2') ? ' has-error' : '' }}">
                            <div class="col-md-3" align="center">
                                <input id="base2" type="number"
                                    class="form-control" name="base2"
                                    required autofocus disabled>
                            </div>
                            <label for="Operación" class="col-md-2 control-label">
                                <select name="operacion2" onchange="onChange2(this);">
                                    <option value="0">x</option>
                                    <option value="1">/</option>
                                    <option value="2">+</option>
                                    <option value="3">-</option>
                                </select>
                            </label>
                            <div class="col-md-2">
                                <input id="porcentaje2" type="number"
                                    onchange="onChangePorcentaje2(this);"
                                    class="form-control" name="porcentaje"
                                    value="30" min="1" max="100"
                                    minlength="1" maxlength="3"
                                    required autofocus>
                            </div>
                            <label for="Igualdad" class="col-md-1 control-label">=</label>
                            <div class="col-md-3">
                                <input id="resultado_2" type="number"
                                    class="form-control" name="resultado_2"
                                    required autofocus disabled>
                            </div>
        
                            <div class="col-md-6">
                                @if ($errors->has('porcentaje2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('porcentaje2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <!-- end resultado_2 -->

                        <!-- begin resultado_3 -->
                        <div class="form-group">
                            <label for="Resultado 2" class="col-md-3 control-label">
                                Resultado 2
                            </label>
                            <label for="Operación" class="col-md-2 control-label">
                                Operación
                            </label>
                            <label for="Porcentaje" class="col-md-2 control-label">
                            </label>
                            <label for="Igualdad" class="col-md-1 control-label">=</label>
                            <label for="Resultado 3" class="col-md-3 control-label">
                                Impuesto total
                            </label>
                        </div>

                        <div class="form-group{{ $errors->has('porcentaje3') ? ' has-error' : '' }}">
                            <div class="col-md-3" align="center">
                                <input id="base3" type="number"
                                    class="form-control" name="base3"
                                    required autofocus disabled>
                            </div>
                            <label for="Operación" class="col-md-2 control-label">
                                <select name="operacion3" onchange="onChange3(this);">
                                    <option value="0">x</option>
                                    <option value="1" selected>/</option>
                                    <option value="2">+</option>
                                    <option value="3">-</option>
                                </select>
                            </label>
                            <div class="col-md-2">
                                <input id="porcentaje3" type="number"
                                    onchange="onChangePorcentaje3(this);"
                                    class="form-control" name="porcentaje3"
                                    value="1000" min="1" max="100"
                                    minlength="1" maxlength="3"
                                    required autofocus>
                            </div>
                            <label for="Igualdad" class="col-md-1 control-label">=</label>
                            <div class="col-md-3">
                                <input id="resultado_3" type="number"
                                    class="form-control" name="resultado_3"
                                    required autofocus disabled>
                            </div>
        
                            <div class="col-md-6">
                                @if ($errors->has('porcentaje3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('porcentaje3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <!-- end resultado_3 -->
                    </form>
                    <!-- end form to calculate -->

                    <!-- begin form to send data -->
                    <form id="form2" name="form2" action="{{ route('store_calculo_impuesto') }}">

                        <input id="result_3" name="result_3" hidden>
                        <input name="id_propietario" value="{{ $inscripcion->propietario->id }}"
                            hidden>
                        <div class="form-group">
                            <div align="center">
                                <button class="btn"
                                    style="background-color: #a90000;
                                    color: #e0e0d1;">
                                    Registrar
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