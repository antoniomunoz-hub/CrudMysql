<?php

$dbUser = 'root';
$dbPassword = '3512';
$dbHost = '127.0.0.1';
$dbDatabase = 'prueba_tecnica1.1';


// Usamos try catch para no parar la ejecucion en caso de error de cualquier tipo

try{

$dbConnexion = new PDO("mysql:host=${dbHost};dbname=${dbDatabase}", $dbUser, $dbPassword);
$dbConnexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo 'Error en la conexion a la Base de datos',
    $e->getCode();
}

var_dump($dbConnexion);
var_dump(gettype($dbConnexion));

?>

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

<?php
   include("./headers.php");
?>

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
        
        <!-- cargamos los datos en la tabla -->

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
