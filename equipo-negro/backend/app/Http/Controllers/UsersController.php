<?php

namespace App\Http\Controllers;

use App\Articulos;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    function __construct()
    {

    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        return json_decode(User::take(4)->get());
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
    public function update(Request $request, User $user)
    {
        $user->update($request->all());

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
