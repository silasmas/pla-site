<?php

namespace App\Http\Controllers;

use App\Models\slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SlidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide=slides::all();
        return view('admin.g_slide',compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_slide');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());


    $file = $request->file('photo');

    $file == ''
        ? ''
        : ($filenameImg =
            'slides/' . time() . '.' . $file->getClientOriginalName());
    $file == '' ? '' : $file->move('storage/slides', $filenameImg);
     if ($request->photo) {
        slides::create([
        'titresmall' => ['fr' =>$request->titresmall,'en' =>$request->titresmall_en],
        'titrebig' => ['fr' =>$request->grandTitre,'en' =>$request->grandTitre_en],
        'resume' => ['fr' =>$request->resume,'en' =>$request->resume_en],
        'textbtn' =>['fr' =>$request->txtbtn,'en' =>$request->txtbtn_en],
        'lienvers' => $request->lienvers,
        'photo' => $filenameImg,
        ]);
        return back()->with('message','Enregistrement réussi');
    } else {
        return response()->json('message','Merci de vérifier le formulaire!');
    }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function show(slides $slides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide=slides::findOrFail($id);
        // dd($exp->getTranslation('contenu','fr'));
        if ($slide) {
            return view('admin.add_slide',compact('slide'));
        } else {
            return back()->with('message','Aucune information trouvée');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $line=slides::findOrFail($request->id);
     //dd($request->resume==''?'vide'.$request->resume_en.'-'.$request->resume:$request->resume_en);
        if($line){
            $file = $request->file('photo');
            $file == ''
                ? ''
                : ($filenameImg =
                    'slides/' . time() . '.' . $file->getClientOriginalName());
            $file == '' ? '' : $file->move('storage/slides', $filenameImg);

            $request->lienvers==""? $line->lienvers=$line->lienvers:$line->lienvers=$request->lienvers;
            $request->titresmall==""? $line->titresmall=$line->titresmall:$line->titresmall=['fr' =>$request->titresmall,'en' =>$request->titresmall_en];
            $request->grandTitre==""? $line->titrebig=$line->titrebig:$line->titrebig=['fr' =>$request->grandTitre,'en' =>$request->grandTitre_en];
            $request->txtbtn==""? $line->textbtn=$line->textbtn:$line->textbtn=['fr' =>$request->txtbtn,'en' =>$request->txtbtn_en];
            $request->resume!=""? $line->resume=['fr' =>$request->resume,'en' =>$request->resume_en]:'';
            $request->photo==""? $line->photo=$line->photo:$line->photo=$filenameImg;

            $line->save();
            return back()->with('message','Modification du slide réussie');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pub = slides::findOrFail($id);

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
