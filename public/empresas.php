<?php
$empresas = [
    ['id'=> 1,'nombre'=>'Modas Marin', 'telefono'=> 644253154, 'email'=>'modasmarin@mail.com', 'sector'=>'comercio'],
    ['id'=> 1,'nombre'=>'Reformas Roman', 'telefono'=> 654254554, 'email'=>'reformasroman@mail.com', 'sector'=>'construccion'],
    ['id'=> 1,'nombre'=>'Mario Peluqueros', 'telefono'=> 645679154, 'email'=>'mariopeluca@mail.com', 'sector'=>'salud y belleza'],
    ['id'=> 1,'nombre'=>'Informatica Union', 'telefono'=> 638711654, 'email'=>'unioninformatica@mail.com', 'sector'=>'ingenieria']
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
                <td>Telefono</td>
                <td>Email</td>
                <td>Sector</td>
            
            </tr>
        
        </thead>

        <tbody>

        <?php foreach($empresas as $empresa):?>
            <tr>

                <td><?php echo $empresa['id']; ?></td>
                <td><?php echo $empresa['nombre']; ?></td>
                <td><?php echo $empresa['telefono']; ?></td>
                <td><?php echo $empresa['email']; ?></td>
                <td><?php echo $empresa['sector']; ?></td>

            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    
<script src="./assets/main.js"></script>
</body>
</html>
