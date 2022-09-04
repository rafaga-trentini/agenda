<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $valor = $request->session()->all();
        return $valor;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("agenda.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {   
        $novo = array(
            'id' => date("YmdHis"),
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email
        );

        $request->session()->put('0', $novo);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {   
        $valor = $request->session()->has($id);
        return $valor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("agenda.edit");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $novo = array(
            'id' => date("YmdHis"),
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'email' => $request->email
        );

        $request->session()->get($request->id)->set($request->id, $novo);
        return "Update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->session()->forget($id);
        return "Destroy";
    }
}
