<?php
//Conectar con el servidor 
$conectar= @mysqli_connect('localhost','root','','ejemplo');


//verificamos la conexion
if(!$conectar){
    echo("No se pudo conectar con el servidor");

    }
    else{

        $base=mysqli_select_db($conectar,'ejemplo');

        if(!$base){

            echo"No se encontro la base de Datos";
         
        } 

    }


if($_SERVER["REQUEST_METHOD"]=="POST"){
    //recuperar las variables
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $mensaje=$_POST['mensaje'];

}
   //hacemos la sententencia de sql
   $sql="INSERT INTO datos VALUES('$nombre',
                                  '$correo',
                                  '$mensaje')";

   //ejecutamos la sentencia de sql
   $ejecutar=mysqli_query($conectar, $sql);


   //verificamos la ejecucion


   
    if(!$ejecutar){

      echo"Hubo Algun error";

    }

    else{
        echo"Datos guardados corrertamente<br>
        sss<a href='index.html'>Volver</a>";

    }

?>