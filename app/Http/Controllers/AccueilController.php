<?php

namespace App\Http\Controllers;

use App\Models\accueil;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home=accueil::first();
        return view('admin.g_accueil',compact('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $line=accueil::first();
if($line){
    $request->textsuivre==""? $line->textsuivre=$line->textsuivre:
                              $line->textsuivre=['fr' =>$request->textsuivre,'en' =>$request->textsuivre_en];
    $request->facebook==""? $line->facebook=$line->facebook:$line->facebook=$request->facebook;
    $request->tweeter==""? $line->tweeter=$line->tweeter:$line->tweeter=$request->tweeter;
    $request->linkedin==""? $line->linkedin=$line->linkedin:$line->linkedin=$request->linkedin;
    $request->google==""? $line->google=$line->google:$line->google=$request->google;
    $request->adresse==""? $line->adresse=$line->adresse:$line->adresse=['fr' =>$request->adresse,'en' =>$request->adresse_en];
    $request->email==""? $line->email=$line->email:$line->email=$request->email;
    $request->l1==""? $line->l1=$line->l1:$line->l1=$request->l1;
    $request->l2==""? $line->l2=$line->l2:$line->l2=$request->l2;
    $request->l3==""? $line->l3=$line->l3:$line->l3=$request->l3;
    $request->l4==""? $line->l4=$line->l4:$line->l4=$request->l4;
    $request->telephone==""? $line->telphone=$line->telphone:$line->telphone=['fr' =>$request->telephone,'en' =>$request->telephone_en];
    $request->txtfooter==""? $line->txtfooter=$line->txtfooter:$line->txtfooter=['fr' =>$request->txtfooter,'en' =>$request->txtfooter_en];
    $request->t1Team==""? $line->t1Team=$line->t1Team:$line->t1Team=['fr' =>$request->t1Team,'en' =>$request->t1Team_en];
    $request->t2Team==""? $line->t2Team=$line->t2Team:$line->t2Team=['fr' =>$request->t2Team,'en' =>$request->t2Team_en];
    $request->t1Pub==""? $line->t1Pub=$line->t1Pub:$line->t1Pub=['fr' =>$request->t1Pub,'en' =>$request->t1Pub_en];
    $request->t2Pub==""? $line->t2Pub=$line->t2Pub:$line->t2Pub=['fr' =>$request->t2Pub,'en' =>$request->t2Pub_en];
    $request->titreTeam==""? $line->titreTeam=$line->titreTeam:$line->titreTeam=['fr' =>$request->titreTeam,'en' =>$request->titreTeam_en];
    $request->descriptionTeam==""? $line->descriptionTeam=$line->descriptionTeam:$line->descriptionTeam=['fr' =>$request->descriptionTeam,'en' =>$request->descriptionTeam_en];

        $line->save();
        return back()->with('message','Enregistrement réussi');
}else{
    accueil::create([
        'textsuivre' => ['fr' =>$request->textsuivre,'en' =>$request->textsuivre_en],
        'facebook' => $request->facebook,
        'tweeter' => $request->tweeter,
        'linkedin' =>$request->linkedin,
        'google' => $request->google,
        'adresse' =>  ['fr' =>$request->adresse,'en' =>$request->adresse_en],
        'email' => $request->email,
        'telphone' => ['fr' =>$request->telephone,'en' =>$request->telephone_en],
        'txtfooter' => ['fr' =>$request->txtfooter,'en' =>$request->txtfooter_en],
        't1Team' => ['fr' =>$request->txtfooter,'en' =>$request->txtfooter_en],
        't2Team' => ['fr' =>$request->t1Team,'en' =>$request->t1Team_en],
        't1Pub' => ['fr' =>$request->t1Pub,'en' =>$request->t1Pub_en],
        't2Pub' => ['fr' =>$request->t2Pub,'en' =>$request->t2Pub_en],
        'l1' => $request->l1,
        'l2' => $request->l2,
        'l3' => $request->l3,
        'l4' => $request->l4,
        'titreTeam' => ['fr' =>$request->titreTeam,'en' =>$request->titreTeam_en],
        'descriptionTeam' => ['fr' =>$request->descriptionTeam,'en' =>$request->descriptionTeam_en],
        ]);
        return back()->with('message','Enregistrement réussi');
}
    }
    public function deleteImg($photo,$p,$t){

        if($photo!=null){
           // dd($p);
            if(file_exists($p)){
                unlink($p);
                $photo->move('storage/partenaire', $t.".png");
               $line= accueil::first();
               $line->$t= 'partenaire/'.$t.".png";
               $line->save();
               // accueil::where($t, 'partenaire/'.$t.".png")->update([$t => 'partenaire/'.$t.".png"]);
            }else{
                $photo->move('storage/partenaire', $t.".png");
                $line= accueil::first();
                if($line){
                    $line->$t= 'partenaire/'.$t.".png";
                    $line->save();
                }else{
                    accueil::create([$t => 'partenaire/'.$t.".png"]);
                }
              //  dd($line->$t);

            }
        }


    }
    public function addPartenaire(Request $request)
    {
        self::deleteImg($request->file('photo1'),public_path() . '/partenaire/p1.png','p1');
        self::deleteImg($request->file('photo2'),public_path() . '/partenaire/p2.png','p2');
        self::deleteImg($request->file('photo3'),public_path() . '/partenaire/p3.png','p3');
        self::deleteImg($request->file('photo4'),public_path() . '/partenaire/p4.png','p4');
        $line=accueil::first();
        if($line){
                $request->l1==""? $line->l1=$line->l1:$line->l1=$request->l1;
                $request->l2==""? $line->l2=$line->l2:$line->l2=$request->l2;
                $request->l3==""? $line->l3=$line->l3:$line->l3=$request->l3;
                $request->l4==""? $line->l4=$line->l4:$line->l4=$request->l4;
                $line->save();
                return back()->with('message','Enregistrement réussi');
        }else{
            accueil::create([
                'l1' => $request->l1,
                'l2' => $request->l2,
                'l3' => $request->l3,
                'l4' =>$request->l4,
            ]);
                return back()->with('message','Enregistrement réussi');
        }

        return back()->with('message','Enregistrement réussi');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\accueil  $accueil
     * @return \Illuminate\Http\Response
     */
    public function show(accueil $accueil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\accueil  $accueil
     * @return \Illuminate\Http\Response
     */
    public function edit(accueil $accueil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\accueil  $accueil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, accueil $accueil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\accueil  $accueil
     * @return \Illuminate\Http\Response
     */
    public function destroy(accueil $accueil)
    {
        //
    }
}
