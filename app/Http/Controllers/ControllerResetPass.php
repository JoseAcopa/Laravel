<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\User;

class ControllerResetPass extends Controller
{
  public function setPassword(Request $data)
  {
    $emailUser = $data->correo;

    $user = User::where('email', $emailUser)->get();
    if (count($user) != 0) {
      $mail = new PHPMailer(true);
      try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'creaturviajes.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'jacopa@creaturviajes.net';
        $mail->Password = 'creatur1';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        //Recipients
        $mail->setFrom($emailUser, $user[0]->name);
        $mail->addAddress('jacopa@creaturviajes.net');
        // $mail->addAddress($emailUser);
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Restablecer contrasena';
        $mail->Body = '
        <h2 style="color: #000;">Informacion del Contacto<h2>
        <h3 style="color: #456;">Nombre: '.$user[0]->name.'<h3>
        <h3 style="color: #456;">Correo: '.$user[0]->email.'</h3>
        <h3 style="color: #456;">Telefono: '.$user[0]->phone.'</h3>
        <br/><br/>
        <hr style="color: #456;"></hr>
        <h1 style="color: #000;">RAYOS X Y SERVICIOS INDUSTRIALES S. A. DE C. V.<h1>
        <h4 style="color: #456;">Cumpliendo con las normas de calidad y seguridad que el ambito petrolero exige.</h4>
        <img src="http://siycrx.rayosxyservicios.com.mx/img/LogoRX.png" width="180px" height="120px"/>
        ';

        $mail->send();
        return redirect('/')->with('success','En un momento le enviaremos a su correo la contraseña');
      } catch (Exception $e) {
        return redirect('/')->with('flash','Error al enviar correo, intente de nuevo por favor.');
      }
    } else {
      return redirect('/')->with('error','El correo que ingreso no esta registrado, contacte con el proveedor');
    }
  }
}
