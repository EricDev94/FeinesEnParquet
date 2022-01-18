
<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

//Creamos una instancia de la clase PHPMailer
$mail = new PHPMailer();

//Configuramos el correo de origen, el servidor smtp. así como su puerto
//En este caso mailtrap.
$mail->isSMTP();
$mail->Host = 'mailtrap.io';
$mail->SMTPAuth = true;
$mail->Username = 'a461d0c9ea42cd';
$mail->Password = '079c7c6b6d4a9e';
$mail->SMTPSecure = "tls";
$mail->Port = 25;

//variables
$correo = $_POST["correo"];
$contenido = $_POST["contenido"];
$asunto = $_POST["asunto"];

//Escribimos el correo de origen de antes
$mail->From =$correo ;
$mail->addAddress("epmendez94@gmail.com");
$mail->Body = $contenido;
$mail->Subject = $asunto;

/**
* Verifica si el mensaje ha sido enviado o no.
*
* @return un echo de error
* @param  $mail mensaje
*/
if(!$mail->send()) {
  echo 'No se ha podido mandar el mensaje.';
  echo 'Mailer Error: ' . $mail->ErrorInfo;
  exit;
}

//Si el mensaje ha sido enviado ejecutará un echo y en unos 3 segundos nos retornará a la página principal.
  echo 'Mensaje enviado, en unos segundos vuelves a la página principal.';
  echo header( "Refresh:3; url=../index.html", true, 303);

//Hacemos la conexión con nuestra base de datos.
  $mysqli = mysqli_connect("localhost","root","root","proyectofinal_daw2");
      if (mysqli_connect_errno()){
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

//Sentencia preparada para ingresar los datos de los mensajes.
  $sentencia = $mysqli->prepare("INSERT INTO correo (email,asunto,mensaje) VALUES (?,?,?)");

  $sentencia->bind_param("sss", $correo, $asunto, $contenido);

  $sentencia->execute();

?>
