<?php

namespace App\Http\Controllers;

use App\Resultados;
use App\User;
use Illuminate\Http\Request;

class ResultadosController extends Controller
{

    function __construct()
    {

    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function resultados()
    {
        return view('welcome');
    }
    public function vuejsonindex()
    {
       $resultados =Resultados::take(4)->get();
       $array = array();
       $count = 0 ;
       $countoptions = 0;
       foreach ($resultados as $resultado) {
         $explode = explode('/',$resultado->coords);
         $array[$count]['coords']['lat'] = (float)$explode[0];
         $array[$count]['coords']['lng'] = (float)$explode[1];
         $array[$count]['name'] = $resultado->name;
         $array[$count]['state'] = $resultado->state;
         $array[$count]['link'] = $resultado->link;
         $array[$count]['images']['initial'] = 'rotonda-01.png';
         $array[$count]['images']['success'] = 'rotonda-03.jpg';
         $array[$count]['images']['fail'] = 'rotonda-02.jpg';

         $array[$count]['options'][$countoptions]['name'] = $resultado->nameopcionuno;
         $array[$count]['options'][$countoptions]['text'] = $resultado->descripcionopcionuno;
         $array[$count]['options'][$countoptions]['probs'] = $resultado->probabilidadesopcionuno;
         $countoptions = $countoptions + 1;
         $array[$count]['options'][$countoptions]['name'] = $resultado->nameopciondos;
         $array[$count]['options'][$countoptions]['text'] = $resultado->descripcionopciondos;
         $array[$count]['options'][$countoptions]['probs'] = $resultado->probabilidadesopciondos;
         $countoptions = 0;
         $array[$count]['correctOption']['name'] = $resultado->nombreopcioncorrecta;
         $array[$count]['correctOption']['description'] = $resultado->descripcionopcioncorrecta;
       }

       return $array;
    }

    public function index(){
      return json_decode(Resultados::take(4)->get());
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request,[
        'name'=>'required',
        'body'=>'required',
        ]);

        $user=User::find(1);

        $user->notebook()->create($request->all());


        return "success";
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Notebook  $notebook
    * @return \Illuminate\Http\Response
    */
    public function show(Notebook $notebook)
    {
        //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Notebook  $notebook
    * @return \Illuminate\Http\Response
    */
    public function edit(Notebook $notebook)
    {
        //
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Notebook  $notebook
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Resultados $resultado)
    {
        $resultado->update($request->all());

        return "success";
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Notebook  $notebook
    * @return \Illuminate\Http\Response
    */
    public function destroy(Notebook $notebook)
    {
        $notebook->delete();
        return "deleted";
    }
}
