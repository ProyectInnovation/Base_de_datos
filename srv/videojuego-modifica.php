<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_VIDEOJUEGO.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $genero = recuperaTexto("genero");
 $plataforma = recuperaTexto("plataforma");

 $nombre = validaNombre($nombre);

 update(
  pdo: Bd::pdo(),
  table: VIDEOJUEGO,
  set: [JUE_NOMBRE => $nombre, JUE_GENERO => $genero, JUE_PLATAFORMA => $plataforma],
  where: [JUE_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "genero" => ["value" => $genero],
  "plataforma" => ["value" => $plataforma],
 ]);
});
