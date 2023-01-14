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
        $('#limpiarMatriz') .click(() => llenarMatriz(true));

        $('#formCalculateMatriz').submit(function(e) {
            e.preventDefault();
            calculateTransposedMatriz();
        });
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

        let cad  = ``;
        let cad2 = ``;
        
        if (filas > 0 && columnas > 0) {
            $('.hide-matriz-2').hide();
            for (let i = 0; i < filas; i++) {

                for (let j = 0; j < columnas; j++) {

                    cad += `<th><input type="number" class="inputMatriz" id="${i}-${j}" required></th>`;
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

        var matriz   = getValuesMatriz();
        

        $.ajax({
            type: 'post',
            url : 'backend/ajaxRequest.php',
            data: {matriz}
        }).then((result) => {

            const {code, error, data} = JSON.parse(result);

            if (code == 'SUCCESS') {

                let sizeMatrizTrans = data.length;

                let cad  = ``;
                let cad2 = ``;

                for (let i = 0; i < sizeMatrizTrans; i++) {

                    for (let j = 0; j < sizeMatrizTrans; j++) {

                        cad += `<th><input type="number" class="inputMatriz" id="${i}-${j}" value = "${data[i][j]}" disabled></th>`;
                    }

                    cad2 += `<tr>${cad}</tr>`;
                    cad   = ``;
                }

                $('#tbodyMatrizTrans').html(cad2);
                $('.hide-matriz-trans').show(1000);
            }
        }).fail((error) => {
            alert(`Comportamiento inesperado: ${error}`);
        });
    }

    function llenarMatriz(clear = false) {
        $('#table tbody tr').each(function(index) {
            $(this).children('th').each(function(index) {
                if(clear){
                    return $(this).children('input').val(``);
                }
                $(this).children('input').val(Math.floor(Math.random() * 999));
            });
        })
    }

    function getValuesMatriz() {
        var valuesMatriz = [];
        var tmpArray     = null;
        $('#table tbody tr').each(function(index) {
            tmpArray = [];
            $(this).children('th').each(function(index2) {
                tmpArray.push($(this).children('input').val());
            });
            valuesMatriz.push(tmpArray);
        });

        return valuesMatriz;
    }

</script>