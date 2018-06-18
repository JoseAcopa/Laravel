<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Correo;
use App\User;

class ControllerCorreos extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    Carbon::setLocale('es');
    $correos = Correo::all();
    return view('admin.correos.index', compact('correos'));
  }

  public function send($idUser, $id)
  {
    $user = User::find($idUser);
    $correo = Correo::find($id);
    $data = [ 'user' => $user, 'correo' => $correo];
    return $data;
  }

  public function destroy($id)
  {
    Correo::find($id)->delete();
    return redirect('admin/correos')->with('success','El correo fue eliminado correctamente de la base de datos');
  }

  public function sendEmail(Request $request)
  {
    $user = Auth::user();
    try {
      // actualizando status a leido
      $id = $request->id;
      $newStatus = $request->status;

      $correo = Correo::find($id);
      $correo->status = $newStatus;
      $correo->save();

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
      $mail->Subject = 'Nueva contrasena';
      $mail->Body = '
      <h2 style="color: #000;">Informacion<h2>
      <h3 style="color: #456;">Nombre: '.$request->nombre.'<h3>
      <h3 style="color: #456;">Correo: '.$request->correo.'</h3>
      <h3 style="color: #456;">Nueva contrasena: '.$request->contrasena.'</h3>
      <br/><br/>
      <hr style="color: #456;"></hr>
      <h1 style="color: #000;">RAYOS X Y SERVICIOS INDUSTRIALES S. A. DE C. V.<h1>
      <h4 style="color: #456;">RX EL EQUIPO QUE SE MUEVE A DONDE TU LO NECESITES!</h4>
      <img src="http://siycrx.rayosxyservicios.com.mx/img/LogoRX.png" width="180px" height="120px"/>
      ';

      $mail->send();
      return redirect('admin/correos')->with('success','El correo fue enviado correctamente');
    } catch (Exception $e) {
      return redirect('/')->with('flash','Error al enviar correo, intente de nuevo por favor.');
    }
  }
}
