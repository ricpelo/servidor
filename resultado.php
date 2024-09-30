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

    if (isset($_GET['op1'])) {
        $op1 = trim($_GET['op1']);
        if (empty($op1)) {
            $errores[] = "El primer operando es obligatorio.";
        } else {
            if (!is_numeric($op1)) {
                $errores[] = "El primer operando no es un número.";
            }
        }
    }

    if (isset($_GET['op2'])) {
        $op2 = trim($_GET['op2']);
        if (empty($op2)) {
            $errores[] = "El segundo operando es obligatorio.";
        } else {
            if (!is_numeric($op2)) {
                $errores[] = "El segundo operando no es un número.";
            }
        }
    }

    if (isset($_GET['op'])) {
        $op = trim($_GET['op']);
        if (empty($op)) {
            $errores[] = "La operación es obligatoria.";
        } else {
            if (!in_array($op, ['+', '-', '*', '/'])) {
                $errores[] = "Operación incorrecta.";
            }
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
</body>

</html>
