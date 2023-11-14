<?php
//ia esta ruta a la carpeta donde deseas guardar los videos
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["video"]["name"]);
$uploadOk = 1;
$videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Comprueba si el archivo ya existe
if (file_exists($target_file)) {
  echo "Lo siento, el archivo ya existe.";
  $uploadOk = 0;
}

// Comprueba el tamaño del archivo (en este caso, límite de 500 MB)
if ($_FILES["video"]["size"] > 500000000) {
  echo "Lo siento, el archivo es demasiado grande.";
  $uploadOk = 0;
}

// Permite ciertos formatos de archivo
if($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov"
&& $videoFileType != "mpeg" ) {
  echo "Lo siento, solo se permiten archivos MP4, AVI, MOV y MPEG.";
  $uploadOk = 0;
}

// Comprueba si $uploadOk está establecido en 0 por un error
if ($uploadOk == 0) {
  echo "Lo siento, tu archivo no fue subido.";

// Si todo está bien, intenta subir el archivo
} else {
  if (move_uploaded_file($_FILES["video"]["tmp_name"], $target_file)) {
    echo "El archivo ". htmlspecialchars(basename($_FILES["video"]["name"])). " ha sido subido.";
  } else {
    echo "Lo siento, hubo un error al subir tu archivo.";