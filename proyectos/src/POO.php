<?php
    session_start();

    if (!isset($_SESSION['registro'])) {
        $_SESSION['registro'] = [];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST["nombre"] ?? '';
        $edad = $_POST['edad'] ?? '';
        $fruta = $_POST['lista'] ?? '';

        if (!empty($nombre) && !empty($edad) && !empty($fruta)) {
            $_SESSION['registro'][] = [
                'nombre' => $nombre,
                'edad' => $edad,
                'fruta' => $fruta
            ];
        }else {
            echo'Tienes que completar todos los campos';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <br>
        <label for="lbl-nombre">Nombre:</label>
        <input type="text" name="nombre">

        <br><br>

        <label for="lbl-edad">Edad:</label>
        <input type="number" name="edad">

        <br><br>

        <select name="lista">
            <option value="manzana">Manzana</option>
            <option value="sandia">Sandía</option>
            <option value="uva">Uva</option>
        </select>

        <br><br>

        <button type="submit">REGISTRAR</button>
    </form>

    <br>

    <table style="border: 2px solid black; border-collapse: collapse;">
        <tr>
            <th style="border: 2px solid black;">Nombre</th>
            <th style="border: 2px solid black;">Edad</th>
            <th style="border: 2px solid black;">Fruta</th>
        </tr>
        <?php
            foreach ($_SESSION['registro'] as $i) {
                echo "<tr>

                    <td style='border: 2px solid black;'>{$i['nombre']}</td>
                    <td style='border: 2px solid black;'>{$i['edad']}</td>
                    <td style='border: 2px solid black;'>{$i['fruta']}</td>
                
                </tr>";
            }
        ?>
    </table>
</body>
</html>