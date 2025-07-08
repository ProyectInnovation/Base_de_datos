<?php


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

devuelveJson([
    [
        "nombre" => "Abigail",
        "chiste" => "¿Qué hace una abeja en el gimnasio? ¡Zum-ba!"
    ],
    [
        "nombre" => "Sherley",
        "chiste" => "¿Por qué los pájaros no usan WhatsApp? Porque ya tienen Twitter."
    ],
    [
        "nombre" => "Ulises",
        "chiste" => "¿Qué le dijo un pez a otro pez? ¡Nada!"
    ],
    [
        "nombre" => "Aldair",
        "chiste" => "¿Por qué el libro de matemáticas está triste? Porque tiene muchos problemas."
    ],
    [
        "nombre" => "Sebastián",
        "chiste" => "Dicen que el dinero no da la felicidad... pero prefiero llorar en un yate que en el metro."
    ],
    [
        "nombre" => "Evelin",
        "chiste" => "Si el trabajo dignifica, ¿por qué el jefe parece tan indigno?"
    ]
]);
