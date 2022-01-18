<?php


//variables
$email = $_POST["email"];
$password = $_POST["password"];

/**
* Verifica si el correo y la contraseña son los estipulados en la condición se
* conectará a la base de datos y extraerá los datos en una tabla.
*
*/

if($email == "epmendez94@gmail.com" && $password == "ericdaw2"){

    $mysqli = mysqli_connect("localhost","root","root","proyectofinal_daw2");

      if (mysqli_connect_errno()){
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      $result = mysqli_query($mysqli, "SELECT * FROM correo");
        echo "<table border= 1> \n";
        echo "<tr>
                  <td>Email</td> <td>Correo</td> <td>Mensaje</td>
              </tr> \n";

        while ($row = mysqli_fetch_row($result)){
               echo "<tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                    </tr> \n";
        }
        echo "</table> \n";

        echo header( "Refresh:5; url=../index.html", true, 303);

}else{
  echo "fallo al hacer la consulta";
}

?>
