<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <?php
    require 'auxiliar.php';

    $errores = [];

    $op1 = comprobar_primer_operando($errores);
    $op2 = comprobar_segundo_operando($errores);
    $op = comprobar_operacion($op2, $errores);

    if (hay_errores($errores)) {
        mostrar_mensajes_error($errores);
    } else {
        $res = calcular_operacion($op1, $op2, $op);
        mostrar_resultado($op1, $op2, $op, $res);
    }
    ?>
    <a href="calculadora.html"><button>Volver</button></a>
</body>

</html>
