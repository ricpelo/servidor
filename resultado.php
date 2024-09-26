<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <p>
        <?php
        if (isset($_GET['op1']) && !empty($_GET['op1']) && is_numeric($_GET['op1'])) {
            $op1 = trim($_GET['op1']);
        } else {
            echo "<h3>El primer operando no es correcto.</h3>";
        }

        if (isset($_GET['op2']) && !empty($_GET['op2']) && is_numeric($_GET['op2'])) {
            $op2 = trim($_GET['op2']);
        } else {
            echo "<h3>El segundo operando no es correcto.</h3>";
        }

        if (isset($_GET['op']) && !empty($_GET['op'])) {


        if (isset($op1, $op2)) {
            $res = $op1 + $op2;  // int|float

            $mensaje = "La suma de $op1 y $op2 es $res.";
            ?>
            <?= $mensaje ?>
        <?php
        }
        ?>
    </p>
</body>
</html>
