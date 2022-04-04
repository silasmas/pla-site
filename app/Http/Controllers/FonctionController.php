<?php

namespace App\Http\Controllers;

use App\Models\avocat;
use App\Models\bureau;
use App\Models\fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
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
        $por = request()->validate([
            'fonction' => 'required|min:3',
        ]);
        fonction::create([
            'fonction' => ['fr'=>$request->fonction,'en'=>$request->fonction_en],
        ]);
        return response()->json([
            'reponse' => true,
            'msg' => 'La fonction est enregistrée!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bureau=bureau::all();
        $avoca=avocat::all();
        $fonctions=fonction::findOrFail($id);
        $fonction=fonction::all();
        return view('admin.add_avocat',compact('bureau','avoca','fonction','fonctions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function edit(fonction $fonction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rap =fonction::findOrFail($request->id);
       // dd($rap);
       $rep= $rap->update([
            'fonction' => ['fr'=>$request->fonction,'en'=>$request->fonction_en],
        ]);
        if($rep){
            return back()->with('message','La fonction a été modifiée avec succès.');
            // return response()->json(["reponse"=>true,"msg"=>""]);
        }else{
            return back()->with('message','Erreur du modification de la catégorie!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fonction  $fonction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $impossible=avocat::where('fonction_id',$id)->first();
        if($impossible){
            return response()->json([
                'reponse' => false,
                'msg' => 'cette fonction ne peut être supprimer car au moin une agent en dependant!',
            ]);
        }else{
            $user = fonction::findOrFail($id);
        if ($user) {
            // $pub=fonction::where('id',$user->id)->get();
            $sup=$user->delete();
            if ($sup) {
                return response()->json([
                    'reponse' => true,
                    'msg' => 'Element supprimer avec succès.',
                ]);
        }

        } else {
            return response()->json([
                'reponse' => false,
                'msg' => 'Erreur de suppression',
            ]);
        }
        }
    }
}
