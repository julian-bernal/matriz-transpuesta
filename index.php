<!DOCTYPE html>
<html lang="es">
<?php include 'fronted/head.php';?>
<body id="body">
    <div class="hide">
        <h1 id="title">Calculando la transpuesta de una matriz</h1>
    </div>

    <div class="container hide2">

        <form method="post" id="establecerMatriz">
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
            <form method="post" id="formCalculateMatriz">
                <div align = "center" class="hide-matriz-2">
                        <table id="table">
                            <thead>
                            </thead>
                            <tbody id="tbodyMatriz">
                            
                            </tbody>
                        </table>
                </div>
                <p>
                    <input type="button" value="Llenar" title="Llena la matriz con numeros aleatorios" id="llenarMatriz">
                    <input type="button" value="Limpiar" id="limpiarMatriz">
                    <input type="submit" value="Calcular" id="calcularMatriz">
                </p>
            </form>
        </li>
        <li class="card hide-matriz-trans">
            <label>Matriz Transpuesta</label>
            <div align = "center">
                <table id="tableMatrizTrans">
                    <thead>
                    </thead>
                    <tbody id="tbodyMatrizTrans">
                    </tbody>
                </table>
            </div>
            <p><p></p></p>
        </li>
    </ul>
</body>
</html>
<?php include 'fronted/scriptIndex.php';?>