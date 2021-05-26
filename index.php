<?php
require 'app/Validator.php';
require 'app/FileManager.php';

$fileManager = new FileManager('assets/files/inputs/code.txt');
$validator = new Validator();
$responseUno = "SI";
$responseDos = "SI";
$errors = array();

$fileManager->getFile();

// Verificar que los valores cumplan los requerimientos
if(!$validator->numero($fileManager->Muno,2,50)) array_push($errors, "El campo 'M1' no cumple con los requerimientos de validación.");
if(!$validator->numero($fileManager->Mdos,2,50)) array_push($errors, "El campo 'M2' no cumple con los requerimientos de validación.");
if(!$validator->numero($fileManager->N,3,5000)) array_push($errors, "El campo 'N' no cumple con los requerimientos de validación.");
if(!$validator->comando($fileManager->comandoUno, 1)) array_push($errors, "El compando 1 no cumple con los requerimientos de validación.");
if(!$validator->comando($fileManager->comandoDos, 2)) array_push($errors, "El comando 2 no cumple con los requerimientos de validación.");

// Encontrar numero de línea en la que se encuentra el comando correcto.
if(!$validator->esComando($fileManager->comandoUno)) {
    $responseUno = "NO";
}
if(!$validator->esComando($fileManager->comandoDos)) {
    $responseDos = "NO";
}

if(count($errors) <= 0) {
    $message = $fileManager->crearArchivo($responseUno, $responseDos);
    echo $message;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/main.css" rel="stylesheet">
    <title>File Manager</title>
</head>
<body>
    
    <div class="container">
    
    <?php if(count($errors) > 0) { 
        foreach($errors as $error){    
    ?>
    <h5 class="error"><?=$error?></h5>
    <?php } } ?>

        <h2>Decode Manager</h2>
        <table>
            <tr>
                <th>Number</th>
                <th>Comand 1</th>
                <th>Comand 2</th>
            </tr>
            <tr>
                <td><?=$fileManager->Muno." ".$fileManager->Mdos." ".$fileManager->N?></td>
                <td><?=$fileManager->comandoUno?></td>
                <td><?=$fileManager->comandoDos?></td>
            </tr>
        </table>
    </div>
</body>
</html>