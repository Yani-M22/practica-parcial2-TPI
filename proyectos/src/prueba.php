<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre">

        <br>

        <label for="edad">Edad: </label>
        <input type="number" name="edad">

        <br>

        <button type="submit">ENVIAR</button>
    </form>
</body>
</html>

<?php
    session_start();
    if (!isset($_SESSION['registro'])) {
        $_SESSION['registro']=[];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['nombre'], $_POST['edad'])) {
            if (!empty($_POST['nombre'] && !empty($_POST['edad']))) {

                $_SESSION['registro'][]=[
                    'nombre' => $_POST['nombre'],
                    'edad' => $_POST['edad']
                ];
                
            } else {
                echo 'Debes de llenar todos los campos';
            }
            
        } else {
            echo 'Variables inexistentes';
        }
        
    }

    /*echo '<pre>';
    print_r($_POST);
    echo '</pre>';*/

?>