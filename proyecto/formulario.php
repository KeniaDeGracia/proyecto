<?php
//Validamos datos del servidor
//$BD = "dataserver";

$user = "root";
$pass = "";
$host = "localhost";
//conectamos a la base de datos
$conecction = mysqli_connect($host, $user, $pass);

//hacemos el input del formulario
$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST["mensaje"];
//verificamos la conexion a base de datos
if (!$conecction)
    {
        echo "No se ha podido conectar con el servidor" . mysql_error();
    }else{
              echo "<b><h3>Hemos conectado al servidor</h3></br>";
          }
//indicamos el nombre de la base de datos
      $datab = "dataserver";
//indicamos seleccionar a la base de datos
      $db = mysqli_select_db($conecction,$datab);

      if (!$db) 
      {
        echo "No se ha encontrado la tabla";
      }else 
        {
            echo "<h3>Se ha registrado de manera correcta<h3>";
        }
        //Insertamos datos del registro al mysql xampp, indicando el nombre de la tabla y sus atributos
        $instruccion_SQL = "INSERT INTO tabla (nombre,email,mensaje) 
        VALUES ('$nombre', '$email', '$mensaje')";

        $resultado = mysqli_query($conecction, $instruccion_SQL);
        //$consulta = "SELECT * FROM tabla where id = '2'"; si queremos que nos muestre solo un registro especifico de ID"
        $consulta = "SELECT * FROM tabla";

  $resultado = mysqli_query($conecction, $consulta);


   mysqli_close($conecction);

   //echo"Fuera";
   echo '<p><h3><a href="index.html"> Volver a la pagina principal</a><h3></p>';
 ?>
