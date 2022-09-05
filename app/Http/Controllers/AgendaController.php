<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaController extends Controller
{

    protected $_SESSION;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        return view("agenda.index", $_SESSION);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if(!isset($_SESSION))
            session_start(); 

        $novo = array(
            'id' => date("YmdHis"),
            'nome'   => $request['nome'],
            'telefone'     => $request['telefone'],
            'email' => $request['email'],
        );
        //$tam = count($_SESSION['usuario']);
        //return var_dump($novo) + $tam;
        if (isset($_SESSION['usuario']))
            array_push($_SESSION['usuario'],$novo);
        else
            $_SESSION['usuario'][0] = $novo;
        return redirect()->route('agenda.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
         
        if (!isset($_SESSION)) {
            session_start();
        }
        foreach ($_SESSION['usuario'] as $dados) {
            if ($dados['id'] == $id) {
                return view('agenda.show', ['dados' => $dados]);
                break;
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        foreach ($_SESSION['usuario'] as $dados) {
            if ($dados['id'] == $id) {
                //var_dump($dados);
                return view('agenda.edit', ['dados' => $dados]);
                break;
            }
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        if (!isset($_SESSION)) {
            session_start();
        }

        $keys = array_keys($_SESSION['usuario']);
        foreach ($keys as $key) {
            if ($_SESSION['usuario'][$key]['id'] == $id) {
                $_SESSION['usuario'][$key]['nome'] = $request->nome;
                $_SESSION['usuario'][$key]['telefone'] = $request->telefone;
                $_SESSION['usuario'][$key]['email'] = $request->email;
                break;
            }
        }
        return redirect()->route('agenda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!isset($_SESSION))
            session_start(); 
            $keys = array_keys($_SESSION['usuario']);
            foreach ($keys as $key) {
                if ($_SESSION['usuario'][$key]['id'] == $id){
                    unset($_SESSION['usuario'][$key]);
                    break;
                }
            }
        return redirect()->route('agenda.index');
    }
}
