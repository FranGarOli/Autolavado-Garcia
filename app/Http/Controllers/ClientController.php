<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Client;

class ClientController extends Controller
{

    public function search(Request $request){

        $name = $request->input('nameSearch');
        $client = Client::where('name', $name)->first();

        //si encuentra un cliente muestra la información del cliente
        if  ($client){
            return redirect()->route('clients.show' , ['client' => $client]);
        }
        //si no encuentra muestra el indice y un mensaje de no ecncontrado
        else{
            return redirect()->route('registers.index')->with('mensajeError', 'Cliente no encontrado');
        }

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('back.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('back.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Client $client, Request $request)
    {
        $client->name = $request->get('name');
        $client->dni = $request->get('dni');
        $client->phone = $request->get('phone');

        $client->save();

        return back()->with('mensaje', 'Cliente actualizado'); // 404 page when update post slug
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
