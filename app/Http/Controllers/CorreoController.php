<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Correo;
use App\User;

class CorreoController extends Controller
{
  public function correoRapido(Request $request)
  {
    $user = Auth::user();
    try {

      //Server settings
      $mail = new PHPMailer(true);

      $mail->isSMTP();
      $mail->Host = 'creaturviajes.net';
      $mail->SMTPAuth = true;
      $mail->Username = 'jacopa@creaturviajes.net';
      $mail->Password = 'creatur1';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      //Recipients
      $mail->setFrom($user->email, $user->name);
      $mail->addAddress($request->correo);
      // $mail->addAddress($emailUser);
      // $mail->addReplyTo('info@example.com', 'Information');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      //Content
      $mail->isHTML(true);
      $mail->Subject = $request->asunto;
      $mail->Body = '
      <h2 style="color: #000;">Mensaje<h2>
      <h3 style="color: #456;">Mensaje: '.$request->mensaje.'<h3>
      <hr style="color: #456;"></hr>
      <h1 style="color: #000;">RAYOS X Y SERVICIOS INDUSTRIALES S. A. DE C. V.<h1>
      <h4 style="color: #456;">RX EL EQUIPO QUE SE MUEVE A DONDE TU LO NECESITES!</h4>
      <img src="http://www.rayosxyservicios.com.mx/img/LogoRX.png" width="180px" height="120px"/>
      ';

      $mail->send();
      return redirect('admin/admin-welcome')->with('success','El correo fue enviado correctamente');
    } catch (Exception $e) {
      return redirect('admin/admin-welcome')->with('flash','Error al enviar correo, intente de nuevo por favor.');
    }
  }
}
