<?php

namespace App\Http\Controllers;

use App\Models\bureau;
use App\Models\accueil;
use App\Models\fonction;
use App\Models\expertise;
use App\Models\avocatBureau;
use Illuminate\Http\Request;

class BureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bureau=bureau::all();
        return view('admin.g_bureau',compact('bureau'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fonction=fonction::all();
        return view('admin.add_bureau',compact('fonction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request);
        $file = $request->file('photo');

        $file == ''
            ? ''
            : ($filenameImg =
                'bureau/' . time() . '.' . $file->getClientOriginalName());
        $file == '' ? '' : $file->move('storage/bureau', $filenameImg);

        if ($request->photo) {
          bureau::create([
          'titre' => ['fr'=>$request->titre,'en'=>$request->titre_en],
          'adresse' =>['fr'=>$request->adresse,'en'=>$request->adresse_en],
          'detail' =>['fr'=>$request->detail,'en'=>$request->detail_en],
          'physique' =>['fr'=>$request->physique,'en'=>$request->physique_en],
          'email' =>$request->email,
          'telephone' =>$request->telephone,
          'photo' => $filenameImg,
          ]);
          return back()->with('message','Enregistrement réussit');
      } else {
          return back()->with('message','Merci de vérifier le formulaire!');
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bureau  $bureau
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $secteur=expertise::where('sorte',1)
        ->orderBy('expertises.created_at', 'asc')->get();
        $domaine=expertise::where('sorte',2)
        ->orderBy('expertises.created_at', 'asc')->get();

        $accueil=accueil::first();
        $bueaux=bureau::with('avocat')->get();
       // dd($bueaux);
        // $secteur=expertise::where('sorte',1)->get();
        return view('pages.detailBureau',compact('bueaux','accueil','secteur','secteur','domaine'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bureau  $bureau
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bureau=bureau::findOrFail($id);
        // dd($exp->getTranslation('contenu','fr'));
        if ($bureau) {
            return view('admin.add_bureau',compact('bureau'));
        } else {
            return back()->with('message','Aucune information trouvée');
        }
    }
    public function detail($id)
    {
        $bureau=bureau::with('avocat')->findOrFail($id);
        //dd($bureau);
        // dd($exp->getTranslation('contenu','fr'));
        if ($bureau) {
            return view('admin.detailBureau',compact('bureau'));
        } else {
            return back()->with('message','Aucune information trouvée');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bureau  $bureau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      //  dd($request);
        $line=bureau::findOrFail($request->id);
        if($line){
            $file = $request->file('photo');

            $file == ''
                ? ''
                : ($filenameImg =
                    'bureau/' . time() . '.' . $file->getClientOriginalName());
            $file == '' ? '' : $file->move('storage/bureau', $filenameImg);
            $line->email=$request->email;
            $line->detail=['fr'=>$request->detail,'en'=>$request->detail_en];
            $line->physique=['fr'=>$request->physique,'en'=>$request->physique_en];
            $line->detail=$request->detail;
            $line->telephone=$request->telephone;
            $line->titre=['fr' =>$request->titre,'en' =>$request->titre_en];
            $line->adresse=['fr' =>$request->adresse,'en' =>$request->adresse_en];

            // $request->email==""? $line->email=$line->email:$line->email=$request->email;
            // $request->detail==""? $line->detail=$line->detail:$line->detail=$request->detail;
            // $request->telephone==""? $line->telephone=$line->telephone:$line->telephone=$request->telephone;
            // $request->adresse==""? $line->adresse=$line->adresse:$line->adresse=['fr' =>$request->adresse,'en' =>$request->adresse_en];
            // $request->titre==""? $line->titre=$line->titre:$line->titre=['fr' =>$request->titre,'en' =>$request->titre_en];
            $request->photo==""? $line->photo=$line->photo:$line->photo=$filenameImg;

                $line->save();
                return back()->with('message','Modification réussit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bureau  $bureau
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $avocatBureau=avocatBureau::where("bureau_id",$id)->first();
        if ($avocatBureau) {
            return response()->json([
                'reponse' => false,
                'msg' => 'Ce bureau ne peut être supprimer car des agents y sont affecté!!',
            ]);
        } else {
            $pub = bureau::findOrFail($id);

            if ($pub) {
                $cover = public_path() . '/storage/' . $pub->photo;
                file_exists($cover) ? unlink($cover) : '';
                $pub->delete();
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
            } else {
                return response()->json([
                'reponse' => false,
                'msg' => 'Acun element trouver! Erreur de suppression!',
            ]);
            }
        }
    }
}
