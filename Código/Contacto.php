<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto</title>
    
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">
        <!-- Link para que funcionen los FA FA -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="css/inicio.css">
    </head>
    <body>

<!-- CONEXION -->
        <?php
            session_start();
            include("./GestionBD/1-conexion.php");
        ?>

<!--CABECERA-->
        <section class="photo" id="inicio">
            <div class="nav" id="sticker">
                <label for="toggle">&#9776</label>
                <input type="checkbox" id="toggle" />
                <div class="menu">
                    <img src="IMG/logo.png" alt="" class="logo">
                    <a href=""><i class="fa fa-home"> Inicio</i></a>
                    <a href=""><i class="fa fa-info"> Como trabajar</i></a>
                    <a href=""><i class="fa fa-briefcase"> Puesta en contacto</i></a>
                    <a href=""><i class="fa fa-address-book"> Listado especialistas</i></a>
                    <a href=""><i class="fa fa-calendar">Calendario</i></a>
                </div>
            </div>
            <div class="photo-text">
                <h4 data-ix="skype">Coaching sl</h4>
            </div>
            <div class="overlay"></div>
        </section>


<!-- FORMULARIO -->

    <div class="contacto">
        <h1>Contacta con Nosototras</h1>
        <form id="contactoFor" method="POST">
            <div class="FormularioContact">
                <label for="Nombre">Nombre:</label>
                <input type="text" id="Nombre" name="Nombre" required>
            </div>
            <div class="FormularioContact">
                <label for="Apellido">Apellido</label>
                <input type="text" id="Apellido" name="Apellido" required>
            </div>
            <div class="FormularioContact">
                <label for="email">Correo:</label>
                <input type="email" id="Correo" name="Correo" required>
            </div>
            <div class="FormularioContact">
                <label for="Asunto">Asunto:</label>
                <input type="text" id="Asunto" name="Asunto" required>
            </div>
            <div class="FormularioContact">
                <label for="message">Mensaje:</label>
                <textarea id="Mensaje" name="Mensaje" rows="5" required></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
        <?php
// Importar PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Requiere PHPMailer (asegúrate de ajustar la ruta si usas Composer o manualmente)
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y sanitizar los datos recibidos del formulario
    $nombre = filter_var($_POST['Nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['Apellido'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['Correo'], FILTER_VALIDATE_EMAIL);
    $asunto = filter_var($_POST['Asunto'], FILTER_SANITIZE_STRING);
    $mensaje = htmlspecialchars($_POST['Mensaje']);

    if ($correo) {
        // Configurar PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Servidor SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'tu_correo@gmail.com'; // Tu correo de Gmail
            $mail->Password = 'tu_contraseña_o_token_de_aplicación'; // Contraseña o token de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Encriptación TLS
            $mail->Port = 587; // Puerto SMTP

            // Configurar los datos del correo
            $mail->setFrom($correo, "$nombre $apellido"); // Correo del remitente
            $mail->addAddress('coachingslsants@gmail.com'); // Correo del destinatario
            $mail->addReplyTo($correo, "$nombre $apellido"); // Correo para responder

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body = "
            <html>
            <head>
                <title>Mensaje desde el formulario de contacto</title>
            </head>
            <body>
                <p><strong>Nombre:</strong> $nombre $apellido</p>
                <p><strong>Correo:</strong> $correo</p>
                <p><strong>Asunto:</strong> $asunto</p>
                <p><strong>Mensaje:</strong></p>
                <p>$mensaje</p>
            </body>
            </html>";
            $mail->AltBody = "Nombre: $nombre $apellido\nCorreo: $correo\nAsunto: $asunto\nMensaje: $mensaje";

            // Intentar enviar el correo
            $mail->send();
            echo "¡Mensaje enviado con éxito!";
        } catch (Exception $e) {
            echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
        }
    } else {
        echo "Por favor, proporciona un correo electrónico válido.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>

    <!-- PONER INICIO PHP Y FINAL


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = htmlspecialchars($_POST['firstName']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Aquí puedes enviar un correo o guardar los datos en una base de datos.
    echo "Thank you, $firstName $lastName! Your message has been received. We will contact you at $email.";
} else {
    echo "Invalid request.";
}
    <script src="js/contacto.js"></script>
-->


<!-- PIE DE PAGINA -->
        <footer>
        Todos los derechos reservados | Coaching SL Copyright © 2024
        </footer>
    
    </body>
</html>
