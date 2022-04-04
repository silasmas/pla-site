<?php

namespace App\Http\Controllers;

use App\Models\avocatBureau;
use Illuminate\Http\Request;

class AvocatBureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    //    dd($request->tabFidel);
        $rep=false;
        $bureau=explode(',',$request->tabFidel);
    //   dd(count($bureau));
        for($i=0;$i<count($bureau);$i++){
          $rep=avocatBureau::updateOrCreate([
              'avocat_id'=>$request->avocat_id,
              'bureau_id'=>$bureau[$i],
            ]);
          //  echo $bureau[$i].'<br>';
        }
        if ($rep) {
            return response()->json(['reponse' => true,'msg' =>' Enregistrement reussi']);
          } else {
            return response()->json(['reponse' => false,'msg' => 'Erreur d\'inscription à CVC']);
          }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\avocatBureau  $avocatBureau
     * @return \Illuminate\Http\Response
     */
    public function show(avocatBureau $avocatBureau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\avocatBureau  $avocatBureau
     * @return \Illuminate\Http\Response
     */
    public function edit(avocatBureau $avocatBureau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\avocatBureau  $avocatBureau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, avocatBureau $avocatBureau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\avocatBureau  $avocatBureau
     * @return \Illuminate\Http\Response
     */
    public function destroy(avocatBureau $avocatBureau)
    {
        //
    }
}
