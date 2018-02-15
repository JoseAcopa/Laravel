<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clients;
use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $clients = Clients::all();
      return view('admin.client.client', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.client.add-client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClientRequest $request)
    {
      $clients = new Clients;
      $clients->RFC = request('RFC');
      $clients->business = request('business');
      $clients->address = request('address');
      $clients->phone = request('phone');
      $clients->email = request('email');

      $clients->save();
      return redirect('admin/client')->with('success','Cliente '. $clients->business .' guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $client = Clients::find($id);
      return view('admin.client.edit-client', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
      $newRFC = $request->input('RFC');
      $newBusiness = $request->input('business');
      $newAddress = $request->input('address');
      $newPhone = $request->input('phone');
      $newEmail = $request->input('email');

      $client = Clients::find($id);

      $client->RFC = $newRFC;
      $client->business = $newBusiness;
      $client->address = $newAddress;
      $client->phone = $newPhone;
      $client->email = $newEmail;
      $client->save();

      return redirect('admin/client')->with('success','Cliente '. $client->business .' actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Clients::find($id)->delete();
      return redirect('admin/client')->with('success','Cliente eliminado correctamente');
    }
}
