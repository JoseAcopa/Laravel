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
  // enviando correo al recuperar contrasena
  public function recuperarContrasena(Request $data)
  {
    $emailUser = $data->correo;

    $user = User::where('email', $emailUser)->get();
    if (count($user) != 0) {

      // guardando correo en la base de datos
      $correo = new Correo;
      $correo->idUsuario = $user[0]->id;
      $correo->correo = $user[0]->email;
      $correo->nombre = $user[0]->name;
      $correo->status = "activo";
      $correo->save();

      // enviando correo
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
        <h4 style="color: #456;">RX EL EQUIPO QUE SE MUEVE A DONDE TU LO NECESITES!</h4>
        <img src="http://www.rayosxyservicios.com.mx/img/LogoRX.png" width="180px" height="120px"/>
        ';

        $mail->send();
        return redirect('/')->with('success','En un momento le enviaremos a su correo la contraseña');
      } catch (Exception $e) {
        return redirect('/')->with('flash','Error al enviar correo, intente de nuevo por favor.');
      }
    } else {
      return redirect('/')->with('error','El correo que ingreso no esta registrado, contacte con el administrador');
    }
  }

  // enviando un correo rapido
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
      return redirect('/home')->with('success','El correo fue enviado correctamente');
    } catch (Exception $e) {
      return redirect('/home')->with('flash','Error al enviar correo, intente de nuevo por favor.');
    }
  }
}
