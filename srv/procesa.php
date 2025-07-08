<?php

header('Content-Type: application/json'); // Asegúrate de que el tipo de contenido sea JSON

// Manejo de errores en PHP
try {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];

        $chistes = [
            "Abigail" => "¿Qué hace una abeja en el gimnasio? ¡Zum-ba!",
            "Sherley" => "¿Por qué los pájaros no usan WhatsApp? Porque ya tienen Twitter.",
            "Ulises" => "¿Qué le dijo un pez a otro pez? ¡Nada!",
            "Aldair" => "¿Por qué el libro de matemáticas está triste? Porque tiene muchos problemas.",
            "Sebastián" => "Dicen que el dinero no da la felicidad... pero prefiero llorar en un yate que en el metro.",
            "Evelin" => "Si el trabajo dignifica, ¿por qué el jefe parece tan indigno?"

        ];

        if (array_key_exists($nombre, $chistes)) {
            $chiste = $chistes[$nombre];
        } else {
            $chiste = "No hay chistes.";
        }

        // Responder con JSON
        echo json_encode(["chiste" => $chiste]);
    } else {
        // Si no se envió el nombre
        echo json_encode(["error" => "No se envió ningún nombre."]);
    }
} catch (Exception $e) {
    // En caso de error, responder con el error en JSON
    echo json_encode(["error" => "Ocurrió un error en el servidor.", "details" => $e->getMessage()]);
}
?>