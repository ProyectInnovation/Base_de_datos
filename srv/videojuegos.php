<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_VIDEOJUEGO.php";

ejecutaServicio(function () {

  $lista = select(pdo: Bd::pdo(), from: VIDEOJUEGO, orderBy: 'JUE_NOMBRE, JUE_GENERO, JUE_PLATAFORMA');

  $render = "";
  foreach ($lista as $modelo) {
    $encodeId = urlencode($modelo[JUE_ID]);
    $id = htmlentities($encodeId);
    $nombre = htmlentities($modelo[JUE_NOMBRE]);
    $genero = htmlentities($modelo[JUE_GENERO]);
    $plataforma = htmlentities($modelo[JUE_PLATAFORMA]);
    $render .=
      "<li>
     <p>
      <a href='modifica.html?id=$id'>Videojuego: $nombre</a> - Genero: $genero - Plataforma: $plataforma
     </p>
    </li>";
  }

  devuelveJson(["lista" => ["innerHTML" => $render]]);
});
