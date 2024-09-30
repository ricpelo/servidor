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

    if (!isset($_GET['op1'])) {
        $errores[] = "Falta el primer operando.";
    } else {
        $op1 = trim($_GET['op1']);
        if ($op1 == '') {  // mb_strlen($op1) === 0
            $errores[] = "El primer operando es obligatorio.";
        } elseif (!is_numeric($op1)) {
            $errores[] = "El primer operando no es un número.";
        }
    }

    if (!isset($_GET['op2'])) {
        $errores[] = "Falta el segundo operando.";
    } else {
        $op2 = trim($_GET['op2']);
        if ($op2 == '') {
            $errores[] = "El segundo operando es obligatorio.";
        } elseif (!is_numeric($op2)) {
            $errores[] = "El segundo operando no es un número.";
        }
    }

    if (!isset($_GET['op'])) {
        $errores[] = "Falta la operación";
    } else {
        $op = trim($_GET['op']);
        if ($op == '') {
            $errores[] = "La operación es obligatoria.";
        } elseif (!in_array($op, ['+', '-', '*', '/'])) {
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
