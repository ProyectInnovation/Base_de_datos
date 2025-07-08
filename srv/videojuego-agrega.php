<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_VIDEOJUEGO.php";

ejecutaServicio(function () {

    $nombre = recuperaTexto("nombre");
    $genero = recuperaTexto("genero");
    $plataforma = recuperaTexto("plataforma");

    $nombre = validaNombre($nombre);

    $pdo = Bd::pdo();
    insert(pdo: $pdo, into: VIDEOJUEGO, values: [JUE_NOMBRE => $nombre, JUE_GENERO => $genero, JUE_PLATAFORMA => $plataforma]);
    $id = $pdo->lastInsertId();

    $encodeId = urlencode($id);
    devuelveCreated("/srv/pasatiempo.php?id=$encodeId", [
        "id" => ["value" => $id],
        "nombre" => ["value" => $nombre],
        "genero" => ["value" => $genero],
        "plataforma" => ["value" => $plataforma],
    ]);
});
