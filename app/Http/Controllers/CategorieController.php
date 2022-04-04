<?php

namespace App\Http\Controllers;

use App\Models\avocat;
use App\Models\categorie;
use App\Models\publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategorieController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $avocat=avocat::all();
        $cat=categorie::all();
        $categorie=categorie::findOrFail($id);
        $categorie->getTranslation('nom','en',false);
        // App::setLocale('en');
      //  dd($categorie->nom);


        if ($categorie) {
            return view('admin.add_publication',compact('categorie','avocat','cat'));
        } else {
            return back()->with('message','Aucune information trouvée');
        }
    }
    public function showcat($id)
    {
        $categorie=categorie::findOrFail($id);
        if ($categorie) {
            return view('admin.add_publication',compact('categorie'));
        } else {
            return back()->with('message','Aucune information trouvée');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rap =categorie::findOrFail($request->id);
       // dd($rap);
       $rep= $rap->update([
            'id' => $request->id,
            'nom' => ['fr'=>$request->nom,'en'=>$request->nom_en],
        ]);
        if($rep){
            return back()->with('message','La catégorie a été modifiée avec succès.');
            // return response()->json(["reponse"=>true,"msg"=>""]);
        }else{
            return back()->with('message','Erreur du modification de la catégorie!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $impossible=publication::where('categorie_id',$id)->first();
        if($impossible){
            return response()->json([
                'reponse' => false,
                'msg' => 'cette catégorie ne peut être supprimer car au moin une publication en dependant!',
            ]);
        }else{
            $user = categorie::findOrFail($id);
        if ($user) {
            $pub=categorie::where('id',$user->id)->get();
            $user->delete();
        }
        if ($user && $pub) {
            return response()->json([
                'reponse' => true,
                'msg' => 'Element supprimer avec succès.',
            ]);

        } else {
            return response()->json([
                'reponse' => false,
                'msg' => 'Erreur de suppression',
            ]);
        }
        }

    }
}
