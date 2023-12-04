<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AvocatBureauController;
use App\Http\Controllers\AvocatController;
use App\Http\Controllers\BureauController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ExpertiseController;
use App\Http\Controllers\FonctionController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\SlidesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::get('/', [InfoController::class, 'index'])->name('home');
        Route::get('about', [InfoController::class, 'about'])->name('about');
        Route::get('expertise', [InfoController::class, 'expertise'])->name('expertise');
        Route::get('team', [InfoController::class, 'team'])->name('team');
        Route::get('publication', [InfoController::class, 'publication'])->name('publication');
        Route::get('presence', [InfoController::class, 'presence'])->name('presence');

        Route::get('detailPublication', [InfoController::class, 'show_pub'])->name('detailPublication');
        Route::get('detailTeam/{id}', [InfoController::class, 'show_team'])->name('detailTeam');
        Route::get('teamByCat/{id}', [InfoController::class, 'show'])->name('teamByCat');
        Route::get('teamByBureau/{id}', [InfoController::class, 'teamByBureau'])->name('teamByBureau');
        Route::get('detailExpertise', [InfoController::class, 'show_secteur'])->name('detailExpertise');
        Route::get('detailBureau/{id}', [BureauController::class, 'show'])->name('detailBureau');
        Route::get('detailCompetence', [InfoController::class, 'show_competence'])->name('detailCompetence');
        Route::get('downloadCv', [AvocatController::class, 'downloadCv'])->name('downloadCv');
        Route::get('downloadQr/{id}', [AvocatController::class, 'downloadQr'])->name('downloadQr');
        Route::get('downloadQrHome', [AvocatController::class, 'downloadQrHome'])->name('downloadQrHome');
        Route::get('downloadCvPub', [PublicationController::class, 'downloadCvPub'])->name('downloadCvPub');

        //newsletter
        Route::post('add.newsletter', [InfoController::class, 'store'])->name('add.newsletter');

        Route::get('/cv', function () {
            return view('cv', ['htmlFilePath' => 'video/CV_Me_Lionnel.html']);
        })->name('cv');


    });

Route::middleware(['auth'])->group(function () {
    //newsletter
    //  Route::post('add.newsletter',[InfoController::class, 'store'])->name('add.newsletter');

    // Admin
    Route::get('g_publication', [PublicationController::class, 'index'])->name('g_publication');
    Route::get('gSlide', [SlidesController::class, 'index'])->name('gSlide');
    Route::get('gHome', [AccueilController::class, 'index'])->name('gHome');
    Route::get('gAbout', [AboutController::class, 'index'])->name('gAbout');
    Route::get('gBureau', [BureauController::class, 'index'])->name('gBureau');
    Route::get('gexpertise', [ExpertiseController::class, 'index'])->name('gexpertise');
    Route::get('addAvocat', [AvocatController::class, 'addAvocat'])->name('addAvocat');
    Route::get('addSlide', [SlidesController::class, 'create'])->name('addSlide');
    Route::get('addHome', [AccueilController::class, 'create'])->name('addHome');
    Route::get('addAbout', [AboutController::class, 'create'])->name('addAbout');
    Route::get('addExpertise', [ExpertiseController::class, 'create'])->name('addExpertise');
    Route::get('addBureau', [BureauController::class, 'create'])->name('addBureau');
    Route::get('addPub', [PublicationController::class, 'addPub'])->name('addPub');
    Route::get('editAvocat/{id}', [AvocatController::class, 'show'])->name('editAvocat');

    Route::get('detailAvocat/{id}', [AvocatController::class, 'detail_team'])->name('detailAvocat');
    Route::get('detailCat/{id}', [AvocatController::class, 'showcat'])->middleware(['auth'])->name('detailCat');
    Route::get('editPublication/{id}', [PublicationController::class, 'edit'])->middleware(['auth'])->name('editPublication');
    Route::get('editExp/{id}', [ExpertiseController::class, 'edit'])->middleware(['auth'])->name('editExp');
    Route::get('admin_detailBureau/{id}', [BureauController::class, 'detail'])->middleware(['auth'])->name('admin_detailBureau');

    //edit admin
    Route::post('updateCat', [CategorieController::class, 'update'])->name('updateCat');
    Route::post('UpdateAvocat', [AvocatController::class, 'update'])->name('UpdateAvocat');
    Route::get('news_letter', [AvocatController::class, 'allEmail'])->name('news_letter');
    Route::get('editCat/{id}', [CategorieController::class, 'show'])->name('editCat');
    Route::get('editFonction/{id}', [FonctionController::class, 'show'])->name('editFonction');
    Route::get('admin_editeBureau/{id}', [BureauController::class, 'edit'])->name('admin_editeBureau');
    Route::get('editSlide/{id}', [SlidesController::class, 'edit'])->name('editSlide');

    Route::post('UpdateCategorie', [CategorieController::class, 'update'])->name('UpdateCategorie');
    Route::post('UpdatePublication', [PublicationController::class, 'update'])->name('UpdatePublication');
    Route::post('UpdateAvocat', [AvocatController::class, 'update'])->name('UpdateAvocat');
    Route::post('UpdateExp', [ExpertiseController::class, 'update'])->name('UpdateExp');
    Route::post('UpdateBureau', [BureauController::class, 'update'])->name('UpdateBureau');
    Route::post('UpdateSlide', [SlidesController::class, 'update'])->name('UpdateSlide');
    Route::post('changerFonctions', [FonctionController::class, 'update'])->name('changerFonctions');
    Route::post('modifierFonctions', [FonctionController::class, 'update'])->name('modifierFonctions');

    Route::post('add.team', [AvocatController::class, 'store'])->name('add.team');
    Route::post('add.slide', [SlidesController::class, 'store'])->name('add.slide');
    Route::post('add.home', [AccueilController::class, 'store'])->name('add.home');
    Route::post('add.about', [AboutController::class, 'store'])->name('add.about');
    Route::post('add.benefice', [AboutController::class, 'store_benefice'])->name('add.benefice');
    Route::post('add.partenaire', [AccueilController::class, 'addPartenaire'])->name('add.partenaire');
    Route::post('add.expertise', [ExpertiseController::class, 'store'])->name('add.expertise');
    Route::post('add.bureau', [BureauController::class, 'store'])->name('add.bureau');
    Route::post('add.fonction', [FonctionController::class, 'store'])->name('add.fonction');
    Route::post('add.affectation', [AvocatBureauController::class, 'store'])->name('add.affectation');
    Route::post('add.cat', [PublicationController::class, 'store'])->name('add.cat');
    Route::post('add.sorte', [ExpertiseController::class, 'sorteExprtise'])->name('add.sorte');
    Route::post('add.pub', [PublicationController::class, 'add_pub'])->name('add.pub');
    Route::get('admin_detailPublication/{id}', [PublicationController::class, 'show'])->name('admin_detailPublication');
    Route::get('admin_detailExpertise/{id}', [ExpertiseController::class, 'show'])->name('admin_detailExpertise');

    Route::get('destroy_about/{id}', [AboutController::class, 'destroy'])->name('destroy_about');
    Route::get('destroy_info/{id}', [AvocatController::class, 'destroyInfo'])->name('destroy_info');
    Route::get('destroy_Avocat/{id}', [AvocatController::class, 'destroy'])->name('destroy_Avocat');
    Route::get('destroy_fonction/{id}', [FonctionController::class, 'destroy'])->name('destroy_fonction');
    Route::get('destroy_AvocatBureau/{id}', [AvocatController::class, 'destroyBureau'])->name('destroy_AvocatBureau');
    Route::get('destroy_email/{id}', [InfoController::class, 'destroy'])->name('destroy_email');
    Route::get('destroy_Cat/{id}', [CategorieController::class, 'destroy'])->name('destroy_Cat');
    Route::get('destroyPublication/{id}', [PublicationController::class, 'destroy'])->name('destroyPublication');
    Route::get('destroyExp/{id}', [ExpertiseController::class, 'destroy'])->name('destroyExp');
    Route::get('destroy_bureau/{id}', [BureauController::class, 'destroy'])->name('destroy_bureau');
    Route::get('destroy_slide/{id}', [SlidesController::class, 'destroy'])->name('destroy_slide');

    Route::get('/dashboard', [AvocatController::class, 'index'])->middleware(['auth'])->name('dashboard');

    //Route::get('downloadCv', [AvocatController::class,'downloadCv'])->name('downloadCv');

    // Route::get('/', [InfoController::class,'index'])->name('home');

});
require __DIR__ . '/auth.php';
