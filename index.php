<!DOCTYPE html>
<html lang="es">
<?php include 'fronted/head.php';?>
<body id="body">
    <div class="hide">
        <h1 id="title">Calculando la transpuesta de una matriz</h1>
    </div>

    <div class="container hide2">

        <form id="establecerMatriz">
            <label>Dimensión de la matriz: </label>
            <input type="number" name="filas" id="filas" onkeyup="" placeholder="N" required>
            <label>X</label>
            <input type="number" name="columnas" id="columnas" placeholder="N" required>
            <input type="submit" value="Establecer matriz" id="btnEstablecerMatriz">
        </form>

    </div>

    <ul class="card-wrapper hide-matriz">
        <li class="card">
            <label>Matriz</label>
            <div align = "center" class="hide-matriz-2">
                <table>
                    <thead>
                    </thead>
                    <tbody id="tbodyMatriz">
                       
                    </tbody>
                </table>
            </div>
            <p>
                <input type="button" value="Llenar" id="llenarMatriz">
                <input type="button" value="Limpiar" id="limpiarMatriz">
                <input type="button" value="Calcular" id="calcularMatriz">
            </p>
        </li>
        <li class="card hide-matriz-trans">
            <label>Matriz Transpuesta</label>
        </li>
    </ul>

</body>
</html>
<script>
    $(document).ready(function() {
        showDivs();

        $('#establecerMatriz').submit(function(e) {
            e.preventDefault();
            paintInputsMatriz();
        });

        $('#filas')   .keyup(() => $('#columnas').val($('#filas').val()));
        $('#columnas').keyup(() => $('#columnas').val($('#filas').val()));
        
        $('#llenarMatriz')  .click(() => llenarMatriz());
        $('#limpiarMatriz') .click(() => limpiarMatriz());
        $('#calcularMatriz').click(() => calculateTransposedMatriz());

    });

    function showDivs() {
        $('.hide').hide();
        $('.hide2').hide();
        $('.hide-matriz').hide();
        $('.hide-matriz-trans').hide();
        setTimeout(() => {
            $('.hide').show(1000);
        }, 1500);
        setTimeout(() => {
            $('.hide2').show(1000);
        }, 2500);
    }

    function paintInputsMatriz() {

        $('.hide-matriz-trans').hide();

        let filas    = parseInt($('#filas').val());
        let columnas = parseInt($('#columnas').val());

        let cad = ``;
        let cad2 = ``;
        
        if (filas > 0 && columnas > 0) {
            $('.hide-matriz-2').hide();
            for (let i = 0; i < filas; i++) {

                for (let j = 0; j < columnas; j++) {

                    cad += `<th><input type="number" class="inputMatriz" id=""></th>`;

                }

                cad2 += `<tr>${cad}</tr>`;
                cad   = ``;
            }

            $('#tbodyMatriz').html(cad2);
            $('.hide-matriz-2').show(1000);
            $('.hide-matriz').show(1000);
        }
    }

    function calculateTransposedMatriz() {

        $('.hide-matriz-trans').hide();

        var matriz = [];

        $.ajax({
            type: 'post',
            url : 'backend/ajaxRequest.php',
            data: {matriz}
        }).done((result) => {
            console.log(result);
            $('.hide-matriz-trans').show(1000);
        });
    }

    function llenarMatriz() {
        
    }

    function limpiarMatriz() {
        
    }

</script>