<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profileImage'])) {
    $target_dir = __DIR__ . "/../../images/"; // Ruta absoluta al directorio de imágenes
    $target_file = $target_dir . basename($_FILES["profileImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el directorio existe
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Crear el directorio si no existe
    }

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profileImage"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profileImage"]["size"] > 500000) { // 500KB
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profileImage"]["tmp_name"], $target_file)) {
            $_SESSION['profileImage'] = "images/" . basename($_FILES["profileImage"]["name"]);
            header('Location: mostrar.php');
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Invalid request.";
}
?>
