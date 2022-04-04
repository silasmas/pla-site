<?php

namespace App\Http\Controllers;

use App\Models\avocat;
use App\Models\categorie;
use App\Models\publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publication=publication::with(['categorie','avocat'])->get();
        $categorie=categorie::all();
        // dd($publication->categorie);
        return view('admin.gpublication',compact('publication','categorie'));
    }
    public function addPub()
    {
        $avocat=avocat::all();
        $cat=categorie::all();
        return view('admin.add_publication',compact('avocat','cat'));
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
    public function downloadCvPub(Request $req)
    {
        $pdf = public_path('storage/'.$req->cv);
       // dd($pdf);
        return response()->download($pdf);
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
            'nom' => 'required|min:3',
        ]);
        categorie::create([
            'nom' => ['fr'=>$request->nom,'en'=>$request->nom_en],
        ]);
        return response()->json([
            'reponse' => true,
            'msg' => 'La catégorie est enregistrée!',
        ]);
    }
    public function add_pub(Request $request)
    {
    //dd($request->all());
        $por =Validator::make($request->all(),[
            'titre' => 'required|min:3',
            'avocat_id' => 'required',
            'categorie_id' => 'required',
            'contenu' => 'required|min:3',
            'cover' => 'required|sometimes|image',
        ]);
     // dd($por->errors()->first());

        if($por->passes()){
        $file = $request->file('cover');
      //  dd($file);
        $file == ''
            ? ''
            : ($filenameImg =
                'cover/' . time() . '.' . $file->getClientOriginalName());
        $file == '' ? '' : $file->move('storage/cover', $filenameImg);
        $filepdf = $request->file('pubpdf');
      //  dd($file);
        $filepdf == ''
            ? ''
            : ($filenamepubpdf =
                'pubpdf/' . time() . '.' . $filepdf->getClientOriginalName());
        $filepdf == '' ? '' : $filepdf->move('storage/pubpdf', $filenamepubpdf);

         if ($request->cover) {
            publication::create([
            'titre' => ['fr'=>$request->titre,'en'=>$request->titre_en],
            'soustitre' => ['fr'=>$request->soustitre,'en'=>$request->soustitre_en],
            'user_id' =>Auth::user()->id,
            'categorie_id' =>$request->categorie_id,
            'avocat_id' => $request->avocat_id,
            'contenu' => ['fr'=>$request->contenu,'en'=>$request->contenu_en],
            'cover' => $filenameImg,
            'pubpdf' => $filenamepubpdf,
            ]);
            return back()->with('message','Enregistrement réussi');
        } else {
            return response()->json('message','Merci de vérifier le formulaire!');
        }
 }else{
   return back()->with(['message'=>$por->errors()->first()]);
 }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pub=publication::with(['categorie','avocat','user'])->findOrFail($id);
        // dd($pub->user->name);
        return view('admin.detailPub',compact('pub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $avocat=avocat::all();
        $cat=categorie::all();
        $pub=publication::findOrFail($id);
        if ($pub) {
            return view('admin.add_publication',compact('pub','avocat','cat'));
        } else {
            return back()->with('message','Aucune information trouvée');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $line=publication::findOrFail($request->id);
        if($line){
            $file = $request->file('cover');
            $file == ''
                ? ''
                : ($filenameImg =
                    'cover/' . time() . '.' . $file->getClientOriginalName());
            $file == '' ? '' : $file->move('storage/cover', $filenameImg);

            $pubpdf = $request->file('pubpdf');
            $pubpdf == ''
                ? ''
                : ($pubpdfnam =
                    'pubpdf/' . time() . '.' . $pubpdf->getClientOriginalName());
            $pubpdf == '' ? '' : $pubpdf->move('storage/pubpdf', $pubpdfnam);

            $request->pubpdf==""? $line->pubpdf=$line->pubpdf:$line->pubpdf=$pubpdfnam;
            $request->cover==""? $line->cover=$line->cover:$line->cover=$filenameImg;
            $request->avocat_id==""? $line->avocat_id=$line->avocat_id:$line->avocat_id=$request->avocat_id;
            $request->categorie_id==""? $line->categorie_id=$line->categorie_id:$line->categorie_id=$request->categorie_id;
            $request->titre==""? $line->titre=$line->titre:$line->titre=['fr' =>$request->titre,'en' =>$request->titre_en];
            $request->soustitre==""? $line->soustitre=$line->soustitre:$line->soustitre=['fr' =>$request->soustitre,'en' =>$request->soustitre_en];
            $request->contenu==""? $line->contenu=$line->contenu:$line->contenu=['fr' =>$request->contenu,'en' =>$request->contenu_en];

                $line->save();
                return back()->with('message','Modification réussie');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pub = publication::findOrFail($id);
        if ($pub) {
            $cover = public_path() . '/storage/' . $pub->cover;
            file_exists($cover) ? unlink($cover) : '';
            $pubdf = public_path() . '/storage/' . $pub->pubpdf;
            file_exists($pubdf) ? unlink($pubdf) : '';
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
