<?php

/**
 * Añade un error al array de errores en la clave correcta según
 * el parámetro con el que está asociado el error.
 *
 * @param  string $par
 * @param  string $mensaje
 * @param  array  $errores
 * @return void
 */
function agregar_error(string $par, string $mensaje, array &$errores): void {
    if (!isset($errores[$par])) {
        $errores[$par] = [];
    }
    $errores[$par][] = $mensaje;
}

function obtener_parametro($par, $mensaje ,&$errores)
{
    if (!isset($_GET[$par])) {
        agregar_error($par, $mensaje, $errores);
        return null;
    }

    return trim($_GET[$par]);
}

function comprobar_no_vacio($cadena, $par, $mensaje, &$errores)
{
    if ($cadena == '') {
        agregar_error($par, $mensaje, $errores);
    }
}

function comprobar_numerico($numero, $par, $mensaje, &$errores)
{
    if (!is_numeric($numero)) {
        agregar_error($par, $mensaje, $errores);
    }
}

function hay_errores($errores)
{
    return !empty($errores);
}

function no_hay_errores($errores, $par)
{
    return !isset($errores[$par]) || empty($errores[$par]);
}

function comprobar_primer_operando(&$errores)
{
    $op1 = obtener_parametro('op1', "Falta el primer operando.", $errores);
    if (no_hay_errores($errores, 'op1')) {
        comprobar_no_vacio($op1, 'op1', "El primer operando es obligatorio.", $errores);
        if (no_hay_errores($errores, 'op1')) {
            comprobar_numerico($op1, 'op1', "El primer operando no es un número.", $errores);
        }
    }

    return $op1;
}

function comprobar_segundo_operando(&$errores)
{
    $op2 = obtener_parametro('op2', "Falta el segundo operando.", $errores);
    if (no_hay_errores($errores, 'op2')) {
        comprobar_no_vacio($op2, 'op2', "El segundo operando es obligatorio.", $errores);
        if (no_hay_errores($errores, 'op2')) {
            comprobar_numerico($op2, 'op2', "El segundo operando no es un número.", $errores);
        }
    }

    return $op2;
}

function comprobar_operacion($op2, &$errores)
{
    $op = obtener_parametro('op', "Falta la operación.", $errores);
    if (no_hay_errores($errores, 'op')) {
        comprobar_no_vacio($op, 'op', "La operación es obligatoria.", $errores);
        if (no_hay_errores($errores, 'op')) {
            if (!in_array($op, ['+', '-', '*', '/'])) {
                agregar_error('op', "Operación incorrecta.", $errores);
            } elseif ($op == '/' && $op2 == '0') {
                agregar_error('op', "No se puede dividir entre cero.", $errores);
            }
        }
    }

    return $op;
}

function mostrar_mensajes_error($errores)
{
    foreach ($errores as $mensajes) {
        foreach ($mensajes as $mensaje) { ?>
            <h3><?= $mensaje ?></h3><?php
        }
    }
}

function calcular_operacion($op1, $op2, $op)
{
    switch ($op) {
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
    }

    return $res;
}

function mostrar_resultado($op1, $op2, $op, $res)
{ ?>
    <p>La operación <?= $op1 ?> <?= $op ?> <?= $op2 ?> vale <?= $res ?>.</p><?php
}
