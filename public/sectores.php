<?php
$sectores = [
    ['id'=> 1, 'nombre'=>'construccion'],
    ['id'=> 1, 'nombre'=>'telecomonicaciones'],
    ['id'=> 1, 'nombre'=>'comercio'],
    ['id'=> 1, 'nombre'=>'salud y belleza']
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/main.css">
    <title>Document</title>
</head>
<body>

<?php
   include("./enlaces.php");
?>
    <table>
    <thead>
    <tr>
    <td>Id</td>
    <td>Nombre</td>
    </tr>
    </thead>
    <tbody></tbody>
    <?php foreach($sectores as $sector):?>
            <tr>

                <td><?php echo $sector['id']; ?></td>
                <td><?php echo $sector['nombre']; ?></td>
            </tr>
        <?php endforeach; ?>    
    </table>
    </tbody>

<script src="./assets/main.js"></script>
</body>
</html>
