<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';


 class GenerarClave{
public function enviarNuevaClave($identificacion, $correo){
    $f=null;

    $objconexion = new Conexion();
    $conexion= $objconexion->get_conexion();

    $verificar="SELECT * FROM usuario WHERE documento=:identificacion AND correo=:correo";

    $result=$conexion ->prepare($verificar);

    $result->bindParam(":identificacion", $identificacion);
    $result->bindParam(":correo", $correo);

    $result->execute();

    $f = $result->fetch();

    if ($f) {

        //Generamos Nueva clave apartir de un randoms
        $caracteres = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $longitud= 8;
        $newPass= substr(str_shuffle($caracteres),0,$longitud);
        $correoFor= $f['correo'];
        $contrasenaEncrip= md5($newPass);

        $actualizarClave ="UPDATE usuario set contrasena=:contrasenaEncrip where documento=:identificacion";

        $result=$conexion ->prepare($actualizarClave);

        $result->bindParam(":identificacion", $identificacion);
        $result->bindParam(":contrasenaEncrip", $contrasenaEncrip);

        $result->execute();








        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'soportetipsscan@gmail.com';                     //SMTP username
            $mail->Password   = 'fucmzpfvwvodfljj';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            //Emisor
            $mail->setFrom('soportetipsscan@gmail.com', 'Soporte Tips-Scan');
            //Receptor
            $mail->addAddress($correoFor);     //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";                                 //Set email format to HTML
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body    = '
            <div dir="ltr" class="es-wrapper-color">
        <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#fafafa"></v:fill>
			</v:background>
		<![endif]-->
        <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td class="esd-email-paddings" valign="top">
                        <table cellpadding="0" cellspacing="0" class="es-content esd-header-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe esd-synchronizable-module" align="center" bgcolor="#010000" style="background-color: #010000;">
                                        <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left" bgcolor="black" style="background-color: black;">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-infoblock">
                                                                                        <p><a target="_blank">View online version</a></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-header" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe esd-synchronizable-module" align="center" bgcolor="#010000" style="background-color: #010000;">
                                        <table bgcolor="#ffffff" class="es-header-body" align="center" cellpadding="0" cellspacing="0" width="600">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p10t es-p10b es-p20r es-p20l" align="left" bgcolor="black" style="background-color: #black;">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="es-m-p0r esd-container-frame" valign="top" align="center">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image es-p20b" style="font-size: 0px;"><a target="_blank"><img src="https://i.ibb.co/26NQTLs/image-3.png" alt="Logo" style="display: block; font-size: 12px;" width="300" title="Logo"></a></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe" align="center" bgcolor="#010000" style="background-color: #010000;">
                                        <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p15t es-p20r es-p20l" align="left" bgcolor="#333" style="background-color: black;">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-image es-p10t es-p10b" style="font-size: 0px;"><a target="_blank"><img src="https://i.ibb.co/KjJZ5Lt/tipsimg.png" alt style="display: block;" width="300"></a></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p15t es-p15b es-m-txt-c" esd-links-underline="none">
                                                                                        <h1 style="color: #ffffff;">¡Nueva Contraseña Generada!</h1>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-p10t es-p10b">
                                                                                        <p style="color: #ffffff;">Señor(a) Usuario a Continuación enviamos su nueva contraseña de<br></p>
                                                                                        <p style="color: #ffffff;"> acceso para el sistema TipsScann, por favor modifique <br></p>
                                                                                        <p style="color: #ffffff;">la contraseña lo más pronto</p>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-spacer es-p20" style="font-size:0">
                                                                                        <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="border-bottom: 1px solid #010000; background: unset; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure esdev-adapt-off es-p20" align="left" style="background-color:black;">
                                                        <table width="560" cellpadding="0" cellspacing="0" class="esdev-mso-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr class="es-mobile-hidden">
                                                                                    <td width="146" class="esd-container-frame" align="left">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-spacer" height="32"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="118" class="esd-container-frame" align="left">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#e8eafb" style="background-color: black; border-radius: 10px 0 0 10px; border-collapse: separate;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="right" class="esd-block-text es-p10t" bgcolor="#fff2cc">
                                                                                                        <p style="font-size: 16px;">Pass<strong>:</strong></p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="156" align="left" class="esd-container-frame">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#e8eafb" style="background-color: #e8eafb; border-radius:0 10px 10px 0; border-collapse: separate;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="left" class="esd-block-text es-p10t es-p10l" bgcolor="#fff2cc">
                                                                                                        <p style="font-size: 16px;"><b>'.$newPass.'</b></p>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                    <td class="esdev-mso-td" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right">
                                                                            <tbody>
                                                                                <tr class="es-mobile-hidden">
                                                                                    <td width="140" class="esd-container-frame" align="left">
                                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="center" class="esd-block-spacer" height="35"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="esd-structure es-p10b es-p20r es-p20l" align="left" bgcolor="black" style="background-color: black;">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%" style="border-radius: 5px; border-collapse: separate;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-spacer es-p20" style="font-size:0">
                                                                                        <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td style="border-bottom: 1px solid #010000; background: unset; height: 1px; width: 100%; margin: 0px;"></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left" class="esd-block-text es-p20t es-p10b" esd-links-color="#cfe2f3">
                                                                                        <p style="line-height: 150%; text-align: center;">
                                                                                            <font color="#ffffff">Recuerde no compartitr su nueva clave del sistema con nadie, </font><br>
                                                                                        </p>
                                                                                        <p style="line-height: 150%; text-align: center;">
                                                                                            <font color="#ffffff">si tiene algún inconveniente escríbanos a&nbsp;</font> <a target="_blank" href="mailto:" style="color: #cfe2f3;">support@</a><a target="_blank" href="mailto:" style="color: #cfe2f3;">stylecasual</a><a target="_blank" href="mailto:" style="color: #cfe2f3;">.com</a> <br>
                                                                                        </p>
                                                                                        <p style="line-height: 150%; text-align: center;"><span style="color:#FFFFFF;">o llame a<a target="_blank" style="line-height: 150%; color: #cfe2f3;" href="tel:"> +000 123 456</a></span>.</p>
                                                                                        <p style="color:black;">Gracias,</p>
                                                                                        <p style="color: black">¡Gracias por confiar en TipsScan!</p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table cellpadding="0" cellspacing="0" class="es-content esd-footer-popover" align="center">
                            <tbody>
                                <tr>
                                    <td class="esd-stripe esd-synchronizable-module" align="center" bgcolor="#010000" style="background-color: #010000;">
                                        <table class="es-content-body" align="center" cellpadding="0" cellspacing="0" width="600" style="background-color: transparent;" bgcolor="rgba(0, 0, 0, 0)">
                                            <tbody>
                                                <tr>
                                                    <td class="esd-structure es-p20" align="left" bgcolor="#010000" style="background-color: #010000;">
                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="560" class="esd-container-frame" align="center" valign="top">
                                                                        <table cellpadding="0" cellspacing="0" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" class="esd-block-text es-infoblock">
                                                                                        <p><a target="_blank"></a>No longer want to receive these emails?&nbsp;<a href target="_blank">Unsubscribe</a>.<a target="_blank"></a></p>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
            
            ';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo '<script>alert("Se  ha enviado una nueva clave a su correo electrónico");</script>';
            echo '<script>location.href="../Views/users/iniciarUser.html"</script>';
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }

       
    }else {
        echo '<script>alert("Los datos enviados no concuerdan con los registrados");</script>';
            echo '<script>location.href="../Views/users/recuperar-pass.html"</script>';
    }


}
}


//Create an instance; passing `true` enables exceptions

?>