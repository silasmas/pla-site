<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about=about::first();
        return view('admin.g_about',compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $line=about::first();
       // dd(empty($line));
        return view('admin.add_about');
    }
    public function image($photo,$p,$t){
        //dd(empty($photo));
        if(!empty($photo)){
          //  dd($p);

            if(file_exists($p)){
                unlink($p);
               $photo->move('storage/about', $photo->getClientOriginalName());
               $line= about::first();
                if(!empty($line)){
                    $line->$t='about/'.$photo->getClientOriginalName();
                    $line->save();
                }else{
                    about::create([$t =>'about/'.$photo->getClientOriginalName()]);
                }
            }else{
                $photo->move('storage/about', $photo->getClientOriginalName());
                $line= about::first();
                if(!empty($line)){
                  $line->$t='about/'.$photo->getClientOriginalName();
                  $line->save();
                }else{
                  about::create([$t =>'about/'.$photo->getClientOriginalName()]);
                }

            }
        }


    }
    public function store(Request $request)
    {
        $line=about::first();
        if(!empty($line)){
            $request->titrebigbenefice==""? $line->titrebigbenefice=$line->titrebigbenefice:
                                      $line->titrebigbenefice=['fr' =>$request->titrebigbenefice,'en' =>$request->titrebigbenefice_en];

            $request->titrecabinet==""? $line->titrecabinet=$line->titrecabinet:
                                      $line->titrecabinet=['fr' =>$request->titrecabinet,'en' =>$request->titrecabinet_en];
            $request->quisommenous==""? $line->quisommenous=$line->quisommenous:
                                      $line->quisommenous=['fr' =>$request->quisommenous,'en' =>$request->quisommenous_en];
            $request->extrait==""? $line->extrait=$line->extrait:
                                      $line->extrait=['fr' =>$request->extrait,'en' =>$request->extrait_en];

            $request->slogant==""? $line->slogant=$line->slogant:
                                $line->slogant=['fr' =>$request->slogant,'en' =>$request->slogant_en];
            $request->contenu==""? $line->contenu=$line->contenu:
                                $line->contenu=['fr' =>$request->contenu,'en' =>$request->contenu_en]; 
            $request->temps==""? $line->temps=$line->temps:
                                $line->temps=['fr' =>$request->temps,'en' =>$request->temps_en];
            $request->titreNosValeurs==""? $line->titreNosValeurs=$line->titreNosValeurs:
                                $line->titreNosValeurs=['fr' =>$request->titreNosValeurs,'en' =>$request->titreNosValeurs_en];
            $request->nbrexperience==""? $line->nbrexperience=$line->nbrexperience:
                                $line->nbrexperience=$request->nbrexperience;
                $line->save();
                $request->file('photohome')!=null?self::image($request->file('photohome'),public_path() . '/about/'.$request->file('photohome')->getClientOriginalName(),'photohome'):'';
                $request->file('photoabout')!=null?self::image($request->file('photoabout'),public_path() . '/about/'.$request->file('photoabout')->getClientOriginalName(),'photoabout'):'';

                return back()->with('message','Enregistrement réussi');
        }else{

            about::create([
                'titrebigbenefice' => ['fr' =>$request->titrebigbenefice,'en' =>$request->titrebigbenefice_en],
                'titrecabinet' => ['fr' =>$request->titrecabinet,'en' =>$request->titrecabinet_en],
                'extrait' => ['fr' =>$request->extrait,'en' =>$request->extrait_en],
                'slogant' => ['fr' =>$request->slogant,'en' =>$request->slogant_en],
                'quisommenous' => ['fr' =>$request->quisommenous,'en' =>$request->quisommenous_en],
                'contenu' =>['fr' =>$request->contenu,'en' =>$request->contenu_en],
                'temps' => ['fr' =>$request->temps,'en' =>$request->temps_en],
                'titreNosValeurs' => ['fr' =>$request->titreNosValeurs,'en' =>$request->titreNosValeurs_en],
                'nbrexperience' => $request->nbrexperience,
                ]);
                $request->file('photohome')!=null?self::image($request->file('photohome'),public_path() . '/about/'.$request->file('photohome')->getClientOriginalName(),'photohome'):'';
                $request->file('photoabout')!=null?self::image($request->file('photoabout'),public_path() . '/about/'.$request->file('photoabout')->getClientOriginalName(),'photoabout'):'';

                return back()->with('message','Enregistrement réussi');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_benefice(Request $request)
    {
      // dd($request);
        $line=about::first();
        if($line){
            $request->file('photobenefice')!=null?self::image($request->file('photobenefice'),public_path() . '/about/'.$request->file('photobenefice')->getClientOriginalName(),'photobenefice'):'';

            $request->titrebigbenefice==""? $line->titrebigbenefice=$line->titrebigbenefice:
                                      $line->titrebigbenefice=['fr' =>$request->titrebigbenefice,'en' =>$request->titrebigbenefice_en];

            $request->titreBeneficesmall==""? $line->titreBeneficesmall=$line->titreBeneficesmall:
                                      $line->titreBeneficesmall=['fr' =>$request->titreBeneficesmall,'en' =>$request->titreBeneficesmall_en];

            $request->b1==""? $line->b1=$line->b1:
                                $line->b1=['fr' =>$request->b1,'en' =>$request->b1_en];
            $request->r1==""? $line->r1=$line->r1:
                                $line->r1=['fr' =>$request->r1,'en' =>$request->r1_en];
            $request->b2==""? $line->b2=$line->b2:
                                $line->b2=['fr' =>$request->b2,'en' =>$request->b2_en];
            $request->r2==""? $line->r2=$line->r2:
                                $line->r2=['fr' =>$request->r2,'en' =>$request->r2_en];
            $request->b3==""? $line->b3=$line->b3:
                                $line->b3=['fr' =>$request->b3,'en' =>$request->b3_en];
            $request->r3==""? $line->r3=$line->r3:
                                $line->r3=['fr' =>$request->r3,'en' =>$request->r3_en];
            $request->b4==""? $line->b4=$line->b4:
                                $line->b4=['fr' =>$request->b4,'en' =>$request->b4_en];
            $request->r4==""? $line->r4=$line->r4:
                                $line->r4=['fr' =>$request->r4,'en' =>$request->r4_en];
            $request->b5==""? $line->b5=$line->b5:
                                $line->b5=['fr' =>$request->b5,'en' =>$request->b5_en];
            $request->r5==""? $line->r5=$line->r5:
                                $line->r5=['fr' =>$request->r5,'en' =>$request->r5_en];
            $request->resume==""? $line->resume=$line->resume:
                                $line->resume=['fr' =>$request->resume,'en' =>$request->resume_en];
                $line->save();
                return back()->with('message','Enregistrement réussit');
        }else{
            $request->file('photobenefice')!=null?self::image($request->file('photobenefice'),public_path() . '/about/'.$request->file('photobenefice')->getClientOriginalName(),'photobenefice'):'';

            about::create([
                'titrebigbenefice' => ['fr' =>$request->titrebigbenefice,'en' =>$request->titrebigbenefice_en],
                'titreBeneficesmall' => ['fr' =>$request->titreBeneficesmall,'en' =>$request->titreBeneficesmall_en],
                'b1' => ['fr' =>$request->b1,'en' =>$request->b1_en],
                'r1' =>['fr' =>$request->r1,'en' =>$request->r1_en],
                'b2' => ['fr' =>$request->b2,'en' =>$request->b2_en],
                'r2' => ['fr' =>$request->r2,'en' =>$request->r2_en],
                'b3' => ['fr' =>$request->b3,'en' =>$request->b3_en],
                'r3' => ['fr' =>$request->r3,'en' =>$request->r3_en],
                'b4' => ['fr' =>$request->b4,'en' =>$request->b4_en],
                'r4' => ['fr' =>$request->r4,'en' =>$request->r4_en],
                'b5' => ['fr' =>$request->b5,'en' =>$request->b5_en],
                'r5' => ['fr' =>$request->r5,'en' =>$request->r5_en],
                'resume' => ['fr' =>$request->resume,'en' =>$request->resume_en],
                ]);
                return back()->with('message','Enregistrement réussi');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(about $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, about $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\about  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $col=$_GET['idv'];
        $bureauAv = about::first();
       // dd($bureauAv);
       if ($bureauAv) {
        // $bureauAv->$col=['fr'=>'','en'=>''];
        if($id=='menu'){
            $bureauAv->$col=null;
            $bureauAv->save();
            if ($bureauAv) {
                return response()->json([
                    'reponse' => true,
                    'msg' => 'Suppression Réussie.',
                ]);
            }
        }elseif($id=='photo'){
            $p=$col;
            $photo=public_path() . '/storage/'.$bureauAv->$p;
            file_exists($photo) ? unlink($photo) : '';
            $bureauAv->$p=null;
            $bureauAv->save();
            if ($bureauAv) {
                return response()->json([
                    'reponse' => true,
                    'msg' => 'Suppression partenaire Réussie.',
                ]);
            }
        }elseif($id=='tel'){
            $bureauAv->$col=['fr'=>'','en'=>''];
            $bureauAv->save();
            if ($bureauAv) {
                return response()->json([
                    'reponse' => true,
                    'msg' => 'Suppression Réussie',
                ]);
            }
        }
        else{
            $bureauAv->$col='';
            $bureauAv->save();
            if ($bureauAv) {
                return response()->json([
                    'reponse' => true,
                    'msg' => 'Suppression Réussie',
                ]);
            }
        }
       }else{
        return response()->json([
            'reponse' => false,
            'msg' => 'Aucun enregistrement trouver',
        ]);
       }

    }
}
