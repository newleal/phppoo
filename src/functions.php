<?php

function saludar ($nombre)
{
    return "hola, $nombre";
}

function limpiarEntrada($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

function validarEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

?>