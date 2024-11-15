<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = [];

    // Validación de campos obligatorios
    $campos_obligatorios = ['nombre', 'correo', 'fecha_evento', 'tipo_entrada', 'usuario', 'password', 'confirmar_password', 'terminos'];
    foreach ($campos_obligatorios as $campo) {
        if (empty($_POST[$campo])) {
            $errores[] = "El campo $campo es obligatorio.";
        }
    }

    // Validación específica de contraseña
    if (!empty($_POST['password']) && $_POST['password'] !== $_POST['confirmar_password']) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    // Si hay errores, mostrar
    if (!empty($errores)) {
        echo "<h1>Errores en el formulario</h1>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
        echo "<a href='formulario.html'>Volver al formulario</a>";
        exit;
    }

    // Mostrar datos si todo es válido
    echo "<h1>Datos recibidos</h1>";
    echo "<p>Nombre: " . htmlspecialchars($_POST['nombre']) . "</p>";
    echo "<p>Correo: " . htmlspecialchars($_POST['correo']) . "</p>";
    echo "<p>Fecha del Evento: " . htmlspecialchars($_POST['fecha_evento']) . "</p>";
    echo "<p>Tipo de Entrada: " . htmlspecialchars($_POST['tipo_entrada']) . "</p>";
    echo "<p>Nombre de Usuario: " . htmlspecialchars($_POST['usuario']) . "</p>";

    if (!empty($_POST['comida'])) {
        echo "<p>Preferencias de comida: " . implode(", ", $_POST['comida']) . "</p>";
    }

    echo "<p>Comentarios: " . htmlspecialchars($_POST['comentarios']) . "</p>";
} else {
    echo "<p>Acceso denegado.</p>";
}
?>