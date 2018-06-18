<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Correo;
use Carbon\Carbon;

class Notifications {
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
      Carbon::setLocale('es');
      $users = Correo::where('status', 'activo')->get();
      $count = $users->count();
      $view->with(compact('users', 'count'));
    }

}
