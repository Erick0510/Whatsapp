<?php
include_once 'conexion.php';
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $sql = "select * from contacto where id_contacto = '$id'";
    $resultado = mysqli_query($con,$sql);

    if($fila=mysqli_fetch_assoc($resultado))
    {
    //envio los valores al formulario
    }
}

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $id=$_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $tel = $_POST['telefono'];
    $cel = $_POST['celular'];
    $whatsapp = $_POST['whatsapp'];

    $sql= "update contacto set nombre_suc = '$nombre', direccion = '$direccion', email='$email', tel='$tel', cel='$cel', whatsapp='$whatsapp'";
    
    $resultado = mysqli_query($con, $sql);

    if($resultado)
    {
        echo "todo salio bien";
    }
    else {
        echo "todo mal";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <h3><a href="administrar.php">Contacto->Actualizar</a></h3>

    <center>
        <h1>Actualizar Contacto</h1>
        <hr>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" value=" <?php echo $fila['nombre_suc'] ?>">
                    </td>
                    <td>
                    <label for="direccion">Dirección:</label>
                        <input type="text" name="direccion" value=" <?php echo $fila['direccion'] ?>">
                    </td>
                    <td>
                        <label for="email">E-mail</label>
                        <input type="text" name="email" value=" <?php echo $fila['email'] ?>">
                    </td>
                    <td>
                    <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" value=" <?php echo $fila['tel'] ?>">
                    </td>
                    <td>
                    <label for="celular">Celular</label>
                        <input type="text" name="celular" value=" <?php echo $fila['cel'] ?>">
                    </td>
                    <td>
                    <label for="whatsapp">Whatsapp</label>
                        <input type="text" name="whatsapp" value=" <?php echo $fila['whatsapp'] ?>">
                    </td>

                    <input type="submit"  >
                </tr>
            </table>

            <input type="hidden" value="<?php echo $fila['id_contacto'] ?>" name="id">

        </form>
    </center>
</body>
</html>