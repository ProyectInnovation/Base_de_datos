<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {
    $lista = [
        [
            "nombre" => "Abigail"
        ],
        [
            "nombre" => "Sherley"
        ],
        [
            "nombre" => "Ulises"
        ],
        [
            "nombre" => "Aldair"
        ],
        [
            "nombre" => "Sebastián"
        ],
        [
            "nombre" => "Evelin"
        ]

    ];

    // Diccionario de chistes
    $chistes = [
        "Abigail" => "¿Qué hace una abeja en el gimnasio? ¡Zum-ba!",
        "Sherley" => "¿Por qué los pájaros no usan WhatsApp? Porque ya tienen Twitter.",
        "Ulises" => "¿Qué le dijo un pez a otro pez? ¡Nada!",
        "Aldair" => "¿Por qué el libro de matemáticas está triste? Porque tiene muchos problemas.",
        "Sebastián" => "Dicen que el dinero no da la felicidad... pero prefiero llorar en un yate que en el metro.",
        "Evelin" => "Si el trabajo dignifica, ¿por qué el jefe parece tan indigno?"
    ];

    // Genera el código HTML de la lista con estilo Material Design.
    $render = "";
    foreach ($lista as $modelo) {
        // Codifica el nombre para evitar inyección de código
        $nombre = htmlentities($modelo["nombre"]);

        // Busca el chiste correspondiente al nombre
        $chiste = isset($chistes[$nombre]) ? htmlentities($chistes[$nombre]) : "Chiste no disponible.";

        // Crea los elementos HTML con clases MD
        $render .=
            "<li class='md-two-line'>
            <span class='headline'>{$nombre}</span>
            <span class='supporting'>{$chiste}</span>
         </li>";
    }

    // Devuelve el HTML generado en formato JSON
    devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {
    // Manejo de errores
    devuelveErrorInterno($error);
}
