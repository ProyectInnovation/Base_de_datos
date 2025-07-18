<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_VIDEOJUEGO.php";

ejecutaServicio(function () {

    $id = recuperaIdEntero("id");

    $modelo =
        selectFirst(pdo: Bd::pdo(), from: VIDEOJUEGO, where: [JUE_ID => $id]);

    if ($modelo === false) {
        $idHtml = htmlentities($id);
        throw new ProblemDetails(
            status: NOT_FOUND,
            title: "Videojuego no encontrado.",
            type: "/error/pasatiemponoencontrado.html",
            detail: "No se encontró ningún pasatiempo con el id $idHtml.",
        );
    }

    devuelveJson([
        "id" => ["value" => $id],
        "nombre" => ["value" => $modelo[JUE_NOMBRE]],
        "genero" => ["value" => $modelo[JUE_GENERO]],
        "plataforma" => ["value" => $modelo[JUE_PLATAFORMA]]
    ]);
});
