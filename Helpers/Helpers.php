<?php
function base_url()
{
    return BASE_URL;
}

function encabezado($data="")
{
    $VistaH = "Views/Template/header.php";
    require_once($VistaH);
}

function pie($data="")
{
    $VistaP = "Views/Template/footer.php";
    require_once($VistaP);
}

function encabezadologin($data="")
{
    $VistaHL = "Views/Template/header_login.php";
    require_once($VistaHL);
}

function pielogin($data="")
{
    $VistaPL = "Views/Template/footer_login.php";
    require_once($VistaPL);
}

function Limpiar($dato)
{
    // Eliminar espacios en blanco al principio y al final
    $dato = trim($dato);
    // Eliminar barras invertidas
    $dato = stripslashes($dato);
    // Convertir caracteres especiales en entidades HTML
    $dato = htmlspecialchars($dato);
    return $dato;
}

// Utilizar los espacios de nombres necesarios
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

/* Clase para tratar con excepciones y errores */
require 'Assets/PHPMailer/src/Exception.php';
/* Clase PHPMailer */
require 'Assets/PHPMailer/src/PHPMailer.php';
/*Clase SMTP necesaria para conectarte a un servidor SMTP */
require 'Assets/PHPMailer/src/SMTP.php';

//Función para envair correos
function EnviarCorreo($correo, $nombre, $asunto, $cuerpo)
{
        // Intentar crear una nueva instancia de la clase PHPMailer
        $mail = new PHPMailer (true);
    
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        // Datos personales
        $mail->Host = "smtp.gmail.com";
        $mail->Port = "465";
        $mail->Username = "icaroooard@gmail.com";
        $mail->Password = "ooyzmbmuyupnlsgq";
        $mail->SMTPSecure = "ssl";
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
    
        // Remitente
        $mail->setFrom('icaroooard@gmail.com', 'CULTECH');
        // Destinatario, opcionalmente también se puede especificar el nombre
        $mail->addAddress($correo, $nombre);
    
        // Asunto
        $mail->Subject = $asunto;
        // Contenido HTML
        $mail->Body = $cuerpo."<br><br>".'Mensaje generado automaticamente, favor de no responder.';
    
        // Agregar archivo adjunto
        $mail->send();
}

function generarContrasenaAleatoria($longitud = 12) {
    // Caracteres que se pueden usar en la contraseña
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+[]{}|;:,.<>?';

    // Generar bytes aleatorios
    $bytesAleatorios = random_bytes($longitud);

    // Convertir bytes en una cadena legible
    $contrasena = '';
    for ($i = 0; $i < $longitud; $i++) {
        $indice = ord($bytesAleatorios[$i]) % strlen($caracteres);
        $contrasena .= $caracteres[$indice];
    }

    return $contrasena;
}

//Para esta función debe ser en cascada, es decir poner los códigos menos importantes arriba y los más abajo.
function EvaluarMinMax($medicion, $min, $max) {
    
    $minrango
    $maxrango

    if ($medicion <= $min) {
        $codigo == 1
    }

    if ($medicion >= $max) {
        $codigo == 1
    }

    if ($medicion <= $min) {
        $codigo == 1
    }

    if ($medicion >= $max) {
        $codigo == 1
    }

    switch ($codigo) {
        case 2001:
            $descripcion = '';
            $relevancia = 2;
            break;
        //...
        default:
            $resultados = 0;
            break;
    }

    return $resultados;
}

?>