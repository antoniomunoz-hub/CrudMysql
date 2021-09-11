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
<?php
   include("./headers.php");
   ?>

<?php
   include("./enlaces.php");
?>
<body>

    <table>
    <thead>
    <tr>
    <td>Id</td>
    <td>Nombre</td>
    </tr>
    </thead>
    <tbody>
            <!-- cargamos los datos en la tabla -->

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
 