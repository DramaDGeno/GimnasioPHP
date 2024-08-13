<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "gimnasio";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si el formulario se envía, manejar la subida del archivo y la inserción de datos en la base de datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_doc = $_POST['id_doc'];
    $id_usuario = $_POST['id_usuario'];
    $nombre_doc = $_POST['nombre_doc'];
    $comentarios = $_POST['comentarios'];
    $estatus = $_POST['estatus'];

    // Manejar la subida del archivo
    $target_dir = "documentos/";
    $target_file = $target_dir . basename($_FILES["url_doc"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es un documento permitido (ej. pdf, docx)
    if ($fileType != "pdf" && $fileType != "docx") {
        echo "Solo se permiten archivos PDF y DOCX.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk es 0 por un error
    if ($uploadOk == 0) {
        echo "Tu archivo no fue subido.";
    // Si todo está bien, intenta subir el archivo
    } else {
        if (move_uploaded_file($_FILES["url_doc"]["tmp_name"], $target_file)) {
            echo "El archivo " . htmlspecialchars(basename($_FILES["url_doc"]["name"])) . " ha sido subido.";

            // Insertar datos en la base de datos
            $sql = "INSERT INTO documentos (id_doc, id_usuario, nombre_doc, url_doc, comentarios, estatus)
                    VALUES ('$id_doc', '$id_usuario', '$nombre_doc', '$target_file', '$comentarios', '$estatus')";

            if ($conn->query($sql) === TRUE) {
                echo "Nuevo documento creado con éxito";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Hubo un error al subir tu archivo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Documentos</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="id_doc">ID Documento:</label>
        <input type="text" id="id_doc" name="id_doc" required><br><br>

        <label for="id_usuario">Nombre Usuario:</label>
        <select id="id_usuario" name="id_usuario" required>
            <?php
            // Consulta para obtener los nombres de los usuarios
            $sql = "SELECT id_usuario, nombre_usuario FROM usuarios";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Llenar el dropdown con los nombres de los usuarios
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id_usuario'] . "'>" . $row['nombre_usuario'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay usuarios disponibles</option>";
            }
            ?>
        </select><br><br>

        <label for="nombre_doc">Nombre Documento:</label>
        <input type="text" id="nombre_doc" name="nombre_doc" required><br><br>

        <label for="url_doc">Adjuntar Documento:</label>
        <input type="file" id="url_doc" name="url_doc" required><br><br>

        <label for="comentarios">Comentarios:</label>
        <textarea id="comentarios" name="comentarios"></textarea><br><br>

        <label for="estatus">Estatus:</label>
        <select id="estatus" name="estatus" required>
            <option value="activo">Activo</option>
            <option value="inactivo">Inactivo</option>
        </select><br><br>

        <input type="submit" value="Subir Documento">
    </form>
</body>
</html>

<?php
$conn->close();
?>