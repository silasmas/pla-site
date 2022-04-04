<?php

namespace App\Http\Controllers;

use App\Models\expertise;
use App\Models\sorte;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $secteur=expertise::where('sorte',1)
        ->orderBy('expertises.created_at', 'asc')->get();
        $domaine=expertise::where('sorte',2)
        ->orderBy('expertises.created_at', 'asc')->get();
        return view('admin.g_expertise',compact('secteur','domaine'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sortes=sorte::all();
        return view('admin.add_expertise',compact('sortes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->sorte);
        $file = $request->file('photo');

          $file == ''
              ? ''
              : ($filenameImg =
                  'expertise/' . time() . '.' . $file->getClientOriginalName());
          $file == '' ? '' : $file->move('storage/expertise', $filenameImg);

          if ($request->photo) {
            expertise::create([
            'sorte' => $request->sorte,
            'titre1' => ['fr'=>$request->titre1,'en'=>$request->titre1_en],
            'titre2' =>['fr'=>$request->titre2,'en'=>$request->titre2_en],
            'contenu' => ['fr'=>$request->contenu,'en'=>$request->contenu_en],
            'photo' => $filenameImg,
            ]);
            return back()->with('message','Enregistrement réussi');
        } else {
            return back()->with('message','Merci de vérifier le formulaire!');
        }


    }
    public function sorteExprtise(Request $request)
    {
            sorte::create([
                'nom' => ['fr' =>$request->nom,'en' =>$request->nom_en],
                ]);
                return response()->json([
                    'reponse' => true,
                    'msg' => 'La catégorie est enregistrée!',
                ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pub=expertise::findOrFail($id);
        // dd($pub->user->name);
        return view('admin.detailExp',compact('pub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $exp=expertise::findOrFail($id);
        // dd($exp->getTranslation('contenu','fr'));
        if ($exp) {
            return view('admin.add_expertise',compact('exp'));
        } else {
            return back()->with('message','Aucune information trouvée');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $line=expertise::findOrFail($request->id);
        if($line){
            $file = $request->file('photo');

            $file == ''
                ? ''
                : ($filenameImg =
                    'expertise/' . time() . '.' . $file->getClientOriginalName());
            $file == '' ? '' : $file->move('storage/expertise', $filenameImg);

            $request->sorte==""? $line->sorte=$line->sorte:$line->sorte=$request->sorte;
            $request->titre1==""? $line->titre1=$line->titre1:$line->titre1=['fr' =>$request->titre1,'en' =>$request->titre1_en];
            $request->titre2==""? $line->titre2=$line->titre2:$line->titre2=['fr' =>$request->titre2,'en' =>$request->titre2_en];
            $request->contenu==""? $line->contenu=$line->contenu:$line->contenu=['fr' =>$request->contenu,'en' =>$request->contenu_en];
            $request->photo==""? $line->photo=$line->photo:$line->photo=$filenameImg;

                $line->save();
                return back()->with('message','Modification réussi');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expertise  $expertise
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pub = expertise::findOrFail($id);
        if ($pub) {
            $cover = public_path() . '/storage/' . $pub->photo;
            file_exists($cover) ? unlink($cover) : '';
            $pub->delete();
            if ($pub) {
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
        }else{
            return response()->json([
                'reponse' => false,
                'msg' => 'Acun element trouver! Erreur de suppression!',
            ]);
        }
    }
}
