<?php

namespace App\Http\Controllers;

use App\Models\accueil;
use App\Models\avocat;
use App\Models\avocatBureau;
use App\Models\bureau;
use App\Models\fonction;
use App\Models\info;
use App\Models\publication;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class AvocatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avocat = avocat::with('publication')->get();
        $fonction = fonction::all();

        return view('admin.home', compact('avocat', 'fonction'));
    }

    public function allEmail()
    {
        $info = info::all();

        return view('admin.newsLetter', compact('info'));
    }

    public function downloadQrHome()
    {

        $image = QrCode::size(300)->format("png")->merge('https://plaafricalaw.com/public/assets/images/logoqr.jpg', 0.1, true)
            ->generate("https://plaafricalaw.com/");

        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" alt="QR Code" />';

    }
    public function downloadQr($req)
    {

        $image = QrCode::size(300)->format("png")->merge('https://plaafricalaw.com/public/assets/images/logoqr.jpg', 0.1, true)
            ->generate("https://plaafricalaw.com/detailTeam/" . $req);

        echo '<img src="data:image/png;base64,' . base64_encode($image) . '" alt="QR Code" />';

    }
    public function downloadCV(Request $req)
    {

        $pdf = public_path('storage/' . $req->cv);
        // dd($pdf);
        return response()->download($pdf);
    }
    public function addAvocat()
    {
        $fonction = fonction::all();
        $bureau = bureau::all();
        $avoca = avocat::all();
        return view('admin.add_avocat', compact('fonction', 'bureau', 'avoca'));
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

        // dd($request->all());
        $por = Validator::make($request->all(), [
            'nom' => 'required|min:3',
            'prenom' => 'required|min:3',
            'telephone' => 'required|min:3',
            'sexe' => 'required',
            'datenaissance' => 'required|min:3',
            'email' => 'required|min:3',
            'photo' => 'required|sometimes|image',
        ]);
        // 'biographie' => 'required|min:3',
        if ($por->passes()) {
            $file = $request->file('photo');
            $file == '' ? '' : ($filenameImg = 'galeri/' . time() . '.' . $file->getClientOriginalName());
            $file == '' ? '' : $file->move('storage/galeri', $filenameImg);

            $pdfbio = $request->file('pdfbio');
            $pdfbio == '' ? $pdfbioname = null : ($pdfbioname = 'pdfbio/' . time() . '.' . $pdfbio->getClientOriginalName());
            $pdfbio == '' ? '' : $pdfbio->move('storage/pdfbio', $pdfbioname);

            // if ($request->file('biographie')) {
            //     $bio_fr = $request->file('biographie');
            //     $phpWord = IOFactory::load($bio_fr);
            //     $bio_fr == '' ? $bio_frname = null : ($bio_frname = 'biographie/' . time() . '.html');
            //     // Enregistrer le contenu du fichier Word en HTML
            //     // $phpWord->save('storage/' . $bio_frname, 'HTML');
            //     //$bio_fr == '' ? '' : $bio_fr->move('storage/biographie', $bio_frname);

            //     $bio_en = $request->file('biographie_en');
            //     $phpWorden = IOFactory::load($bio_en);
            //     $bio_en == '' ? $bio_enname = null : ($bio_enname = 'biographie/en' . time() . '.html');
            //     // Enregistrer le contenu du fichier Word en HTML
            //     $phpWorden->save('storage/' . $bio_enname, 'HTML');
            //     //$bio_en == '' ? '' : $bio_en->move('storage/biographie', $bio_enname);
            // } else {
            //     $bio_frname = $request->biographie;
            //     $bio_enname = $request->biographie_en;
            // }
            $bio_frname = $request->biographie;
            $bio_enname = $request->biographie_en;
            if ($request->photo) {
                // dd(['fr' => $bio_frname, 'en' => $bio_enname]);
                avocat::create([
                    'nom' => $request->nom,
                    'prenom' => $request->prenom,
                    'telephone' => $request->telephone,
                    'sexe' => $request->sexe,
                    'niveau' => $request->niveau,
                    'datenaissance' => $request->datenaissance,
                    'email' => $request->email,
                    'fonction_id' => $request->fonction,
                    'pdfbio' => $pdfbioname,
                    'biographie' => ['fr' => $bio_frname, 'en' => $bio_enname],
                    'photo' => $filenameImg,
                ]);
                return back()->with('message', 'Enregistrement réussi');
            } else {
                return response()->json('message', 'Merci de vérifier le formulaire!');
            }
        } else {
            return back()->with(['message' => $por->errors()->first()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\avocat  $avocat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fonction = fonction::all();
        $bureau = bureau::all();
        $avoca = avocat::all();
        $avocat = avocat::findOrFail($id);
        if ($avocat) {
            return view('admin.add_avocat', compact('avocat', 'fonction', 'bureau', 'avoca'));
        } else {
            return back()->with('message', 'Aucune information trouvée');
        }

    }
    public function detail_team($id)
    {

        $team = avocat::with('publication', 'bureau')->findOrFail($id);
        // $bureau=avocat::with('bureau')->findOrFail($id);
        //dd($team->bureau);
        return view('admin.detailTeam', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\avocat  $avocat
     * @return \Illuminate\Http\Response
     */
    public function edit(avocat $avocat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\avocat  $avocat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $line = avocat::findOrFail($request->id);
        // dd($line);
        if ($line) {
            $file = $request->file('photo');
            $file == '' ? '' : ($filenameImg = 'galerie/' . time() . '.' . $file->getClientOriginalName());
            $file == '' ? '' : $file->move('storage/galerie', $filenameImg);

            $pubpdf = $request->file('pdfbio');
            $pubpdf == '' ? '' : ($pubpdfnam = 'pdfbio/' . time() . '.' . $pubpdf->getClientOriginalName());
            $pubpdf == '' ? '' : $pubpdf->move('storage/pdfbio', $pubpdfnam);

            // $bio_fr = $request->biographie;
            // $bio_fr == '' || null ? "" : $phpWord = IOFactory::load($bio_fr);
            // $bio_fr == '' || null ? $phpWord = null : ($bio_frname = 'biographie/' . time() . '.html');
            // // $bio_fr == '' ? $bio_frname = null : ($bio_frname = 'biographie/' . time() . '.html');
            // // Créer un objet Writer pour la sauvegarde
            // $bio_fr == '' ? "" : $objWriterfr = IOFactory::createWriter($phpWord, 'HTML');
            // // Enregistrer le contenu du fichier Word en HTML
            // $bio_fr == '' ? "" : $objWriterfr->save('storage/' . $bio_frname, 'HTML');
            //$bio_fr == '' ? '' : $bio_fr->move('storage/biographie', $bio_frname);

            // $bio_en = $request->file('biographie_en');
            // $bio_en == '' || null ? "" : $phpWorden = IOFactory::load($bio_en);
            // $bio_en == '' || null ? $bio_enname = null : ($bio_enname = 'biographie/en' . time() . '.html');
            // // Créer un objet Writer pour la sauvegarde
            // $bio_en == '' ? "" : $objWriter = IOFactory::createWriter($phpWorden, 'HTML');
            // // Enregistrer le contenu du fichier Word en HTML
            // $bio_en == '' ? "" : $objWriter->save('storage/' . $bio_enname);
            // dd($bio_frname . '----------' . $bio_enname);

            $request->pdfbio == "" ? "" : $line->pdfbio = $pubpdfnam;
            $request->photo == "" ? "" : $line->photo = $filenameImg;
            $request->biographie == "" ? "" : $line->biographie = ['fr' => $request->biographie, 'en' => $request->biographie_en];
            $request->niveau == "" ? "" : $line->niveau = $request->niveau;
            $request->telephone == "" ? "" : $line->telephone = $request->telephone;
            $request->sexe == "" ? "" : $line->sexe = $request->sexe;
            $request->email == "" ? "" : $line->email = $request->email;
            $request->nom == "" ? "" : $line->nom = $request->nom;
            $request->prenom == "" ? "" : $line->prenom = $request->prenom;
            $request->datenaissance == "" ? "" : $line->datenaissance = $request->datenaissance;
            $request->fonction == "" ? "" : $line->fonction_id = $request->fonction;

            $line->save();
            return back()->with('message', 'Modification réussie');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\avocat  $avocat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = avocat::findOrFail($id);

        if ($user) {
            $pub = publication::where('avocat_id', $user->id)->get();

            foreach ($pub as $p) {
                // dd($p->cover);
                $cover = public_path() . '/storage/' . $p->cover;
                file_exists($cover) ? unlink($cover) : '';
                $pdf = public_path() . '/storage/' . $p->pubpdf;
                file_exists($pdf) ? unlink($pdf) : '';
                $p->delete();
            }
            $photo = public_path() . '/storage/' . $user->photo;
            $pdfbio = public_path() . '/storage/' . $user->pdfbio;
            //  dd($cover);

            file_exists($pdfbio) ? unlink($pdfbio) : '';
            file_exists($photo) ? unlink($photo) : '';

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
    public function destroyBureau($id)
    {
        $idv = $_GET['idv'];
        $bureauAv = avocatBureau::where([['bureau_id', $id], ['avocat_id', $idv]])->first();
        // dd($bureauAv);
        $bureauAv->delete();
        if ($bureauAv) {
            return response()->json([
                'reponse' => true,
                'msg' => 'Suppression Réussi.',
            ]);
        } else {
            return response()->json([
                'reponse' => false,
                'msg' => 'Erreur de suppression',
            ]);
        }
    }
    public function destroyInfo($id)
    {
        $col = $_GET['idv'];
        $bureauAv = accueil::first();
        // dd($bureauAv);
        if ($bureauAv) {
            // $bureauAv->$col=['fr'=>'','en'=>''];
            if ($id == 'menu') {
                $bureauAv->$col = null;
                $bureauAv->save();
                if ($bureauAv) {
                    return response()->json([
                        'reponse' => true,
                        'msg' => 'Suppression Réussie',
                    ]);
                }
            } elseif ($id == 'partenaire') {
                $l = 'l' . $col;
                $p = 'p' . $col;
                $photo = public_path() . '/storage/' . $bureauAv->$p;
                file_exists($photo) ? unlink($photo) : '';
                $bureauAv->$l = null;
                $bureauAv->$p = '';
                $bureauAv->save();
                if ($bureauAv) {
                    return response()->json([
                        'reponse' => true,
                        'msg' => 'Suppression partenaire Réussie',
                    ]);
                }
            } elseif ($id == 'tel') {
                $bureauAv->$col = ['fr' => '', 'en' => ''];
                $bureauAv->save();
                if ($bureauAv) {
                    return response()->json([
                        'reponse' => true,
                        'msg' => 'Suppression Réussie',
                    ]);
                }
            } else {
                $bureauAv->$col = '';
                $bureauAv->save();
                if ($bureauAv) {
                    return response()->json([
                        'reponse' => true,
                        'msg' => 'Suppression Réussie',
                    ]);
                }
            }
        } else {
            return response()->json([
                'reponse' => false,
                'msg' => 'Aucun enregistrement trouver',
            ]);
        }

    }
}
