<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>

<body>
    <?php
    $errores = [];

    function comprobar_parametro($par, $mensaje)
    {
        global $errores;

        if (!isset($_GET[$par])) {
            $errores[] = $mensaje;
        }
    }

    function comprobar_no_vacio($cadena, $mensaje)
    {
        global $errores;

        if ($cadena == '') {
            $errores[] = $mensaje;
        }
    }

    function comprobar_numerico($numero, $mensaje)
    {
        global $errores;

        if (!is_numeric($numero)) {
            $errores[] = $mensaje;
        }
    }

    function no_hay_errores()
    {
        global $errores;
        return empty($errores);
    }

    function comprobar_primer_operando()
    {
        comprobar_parametro('op1', "Falta el primer operando.");
    }

    function comprobar_segundo_operando()
    {
        comprobar_parametro('op2', "Falta el segundo operando.");
    }

    function comprobar_operacion()
    {
        comprobar_parametro('op', "Falta la operación.");
    }

    comprobar_primer_operando();
    if (no_hay_errores()) {
        $op1 = trim($_GET['op1']);
        comprobar_no_vacio($op1, "El primer operando es obligatorio.");
        if (no_hay_errores()) {
            comprobar_numerico($op1, "El primer operando no es un número.");
        }
    }

    comprobar_segundo_operando();
    if (no_hay_errores()) {
        $op2 = trim($_GET['op2']);
        comprobar_no_vacio($op2, "El segundo operando es obligatorio.");
        if (no_hay_errores()) {
            comprobar_numerico($op2, "El segundo operando no es un número.");
        }
    }

    comprobar_operacion();
    if (no_hay_errores()) {
        $op = trim($_GET['op']);
        comprobar_no_vacio($op, "La operación es obligatoria.");
        if (!in_array($op, ['+', '-', '*', '/'])) {
            $errores[] = "Operación incorrecta.";
        } elseif ($op == '/' && $op2 == '0') {
            $errores[] = "No se puede dividir entre cero.";
        }
    }

    if (!empty($errores)):
        foreach ($errores as $error): ?>
            <h3><?= $error ?></h3><?php
        endforeach;
    else:
        switch ($op):
            case '+':
                $res = $op1 + $op2;
                break;
            case '-':
                $res = $op1 - $op2;
                break;
            case '*':
                $res = $op1 * $op2;
                break;
            case '/':
                $res = $op1 / $op2;
                break;
        endswitch; ?>
        <p>La operación <?= $op1 ?> <?= $op ?> <?= $op2 ?> vale <?= $res ?>.</p><?php
    endif; ?>
    <a href="calculadora.html"><button>Volver</button></a>
</body>

</html>
