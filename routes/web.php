<?php

use App\Models\Client;
use App\Models\User;
use App\Notifications\FormLinkNotification;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ajouterclient', [App\Http\Controllers\FilesController::class, 'index'])->name('welcome');
Route::post('/passing', [App\Http\Controllers\FilesController::class, 'store'])->name('store');
Route::get('/uploadpage/{situation_id}/{client_id}', function ($situation_id, $client_id) {
    if($situation_id == 1)
        return view('Form/risquesimple', ['client_id' => $client_id , 'situation_id' => $situation_id]);
    elseif($situation_id == 2)
        return view('Form/risqueagrave', ['client_id' => $client_id, 'situation_id' => $situation_id]);
    elseif($situation_id == 3)
        return view('Form/jeuneconducteur', ['client_id' => $client_id, 'situation_id' => $situation_id]);
    elseif($situation_id == 4)
        return view('Form/vtc', ['client_id' => $client_id, 'situation_id' => $situation_id]);
    elseif($situation_id == 5)
        return view('Form/mutuel', ['client_id' => $client_id, 'situation_id' => $situation_id]);
})->name('uploadpage');
Route::get('/send', [\App\Http\Controllers\FilesController::class, 'send'])->name('send');

Route::get('/risqueagrave/{client_id}', function ($client_id) {
    return Route::post('/', [\App\Http\Controllers\FilesController::class, 'risqueagrave']);
})->name('risqueagrave');

Route::post('/uploadingrisquesimple', [\App\Http\Controllers\FilesController::class, 'storerisquesimple'])->name('uploadingrisquesimple');
Route::post('/uploadingrisqueagrave', [\App\Http\Controllers\FilesController::class, 'storerisqueagrave'])->name('uploadingrisqueagrave');
Route::post('/uploadingjeuneconducteur', [\App\Http\Controllers\FilesController::class, 'storejeuneconducteur'])->name('uploadingjeuneconducteur');
Route::post('/uploadingmutuel', [\App\Http\Controllers\FilesController::class, 'storemutuel'])->name('uploadingmutuel');
Route::post('/uploadingvtc', [\App\Http\Controllers\FilesController::class, 'storevtc'])->name('uploadingvtc');

Route::get('/uploaded', [\App\Http\Controllers\FilesController::class, 'uploaded'])->name('uploaded');

Route::get('/show', [\App\Http\Controllers\FilesController::class, 'show'])->middleware('auth')->name('show');

Route::get('/details/{client_id}/{folder_id}', function ($client_id, $folder_id) {
    return view('Form/details', ['guest' => \App\Models\Client::find($client_id),
        'folder' => \App\Models\Folder::find($folder_id),
        'status' => \App\Models\Status::all()]);
})->middleware('auth')->name('details');

Route::post('/changeretat/{client_id}', [\App\Http\Controllers\FilesController::class, 'changerEtat'])->name('changerEtat');
Route::delete('/delete/{folder_id}', [\App\Http\Controllers\FilesController::class, 'delete'])->name('delete');


Route::get('/download/{doc?}', function ($doc) {
//    Route::get('/download/{doc}', [\App\Http\Controllers\FormController::class, 'download']);
    return response()->download(public_path('assets/' . $doc));
})->name('download');

Route::get('/sendmail/{situation_id}/{client_id}', function ($situation_id, $client_id) {
    //    return decrypt($client_id);
    //    dd(decrypt($client_id));
        Client::find(decrypt($client_id))->notify(new FormLinkNotification(route('uploadpage', ['situation_id' => $situation_id, 'client_id' => $client_id])));
        return redirect()->back()->withErrors(['msg' => 'Mail envoyé avec succès !']);
    })->name('sendmail');

Route::get('/login', function () { return view('/auth/login'); });

Route::get('/blank', function () { return view('/layouts/pageblank'); })->middleware('auth');

Route::get('/' , function () {
    if(Auth::check()){
        if (auth()->user()->estAgent()){
            return redirect('/index');
        } elseif (auth()->user()->estGestionnaire()){
            return redirect('/Gestionnaire/index');
        } elseif (auth()->user()->estAdmin()){
            return redirect('/Admin/index');
        }
    }  else {
        return view('/auth/login');
    }

});

/*Les pages d'agent */

    Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'agent']);

    Route::get('/ajouter', [App\Http\Controllers\HomeController::class, 'ajouter'])->middleware(['auth', 'agent']);
    Route::post('/ajouter', [App\Http\Controllers\HomeController::class, 'storeClient'])->middleware(['auth', 'agent']);

    Route::get('/listeClients', [App\Http\Controllers\HomeController::class, 'listeClients'])->middleware(['auth', 'agent']);
    Route::delete('/listeClients/{id}', [App\Http\Controllers\HomeController::class, 'deleteClient'])->middleware(['auth', 'agent']);
    Route::get('edit/editClient/{id}', [App\Http\Controllers\HomeController::class, 'editClient'])->middleware(['auth', 'agent']);
    Route::put('edit/editClient/{id}', [App\Http\Controllers\HomeController::class, 'updateClient'])->middleware(['auth', 'agent']);

    Route::get('/contacterClients', [App\Http\Controllers\HomeController::class, 'contacterClients'])->middleware(['auth', 'agent']);
    //Route::post('/contacterClients', [App\Http\Controllers\SendMailController::class, 'mailSend'])->name('mailsend')->middleware(['auth', 'agent']);

    Route::get('/notification', [App\Http\Controllers\HomeController::class, 'notification'])->middleware(['auth', 'agent']);

    Route::get('/assurancePersonne', [App\Http\Controllers\HomeController::class, 'assurancePersonne'])->middleware(['auth', 'agent']);
    Route::post('/assurancePersonne', [App\Http\Controllers\HomeController::class, 'storeAssuranceP'])->middleware(['auth', 'agent']);

    Route::get('/assuranceAnimaux', [App\Http\Controllers\HomeController::class, 'assuranceAnimaux'])->middleware(['auth', 'agent']);
    Route::post('/assuranceAnimaux', [App\Http\Controllers\HomeController::class, 'storeAssuranceA'])->middleware(['auth', 'agent']);

    Route::get('/emprunteur', [App\Http\Controllers\HomeController::class, 'emprunteur'])->middleware(['auth', 'agent']);
    Route::post('/emprunteur', [App\Http\Controllers\HomeController::class, 'storeE'])->middleware(['auth', 'agent']);

    Route::get('/listeProjetAP', [App\Http\Controllers\HomeController::class, 'listeProjetAP'])->middleware(['auth', 'agent']);
    Route::delete('/listeProjetAP/{id}', [App\Http\Controllers\HomeController::class, 'deleteProjetAP'])->middleware(['auth', 'agent']);
    Route::get('edit/editProjetAP/{id}', [App\Http\Controllers\HomeController::class, 'editProjetAP'])->middleware(['auth', 'agent']);
    Route::put('edit/editProjetAP/{id}', [App\Http\Controllers\HomeController::class, 'updateProjetAP'])->middleware(['auth', 'agent']);

    Route::get('/listeProjetAA', [App\Http\Controllers\HomeController::class, 'listeProjetAA'])->middleware(['auth', 'agent']);
    Route::delete('/listeProjetAA/{id}', [App\Http\Controllers\HomeController::class, 'deleteProjetAA'])->middleware(['auth', 'agent']);
    Route::get('edit/editProjetAA/{id}', [App\Http\Controllers\HomeController::class, 'editProjetAA'])->middleware(['auth', 'agent']);
    Route::put('edit/editProjetAA/{id}', [App\Http\Controllers\HomeController::class, 'updateProjetAA'])->middleware(['auth', 'agent']);

    Route::get('/listeProjetE', [App\Http\Controllers\HomeController::class, 'listeProjetE'])->middleware(['auth', 'agent']);
    Route::delete('/listeProjetE/{id}', [App\Http\Controllers\HomeController::class, 'deleteProjetE'])->middleware(['auth', 'agent']);
    Route::get('edit/editProjetE/{id}', [App\Http\Controllers\HomeController::class, 'editProjetE'])->middleware(['auth', 'agent']);
    Route::put('edit/editProjetE/{id}', [App\Http\Controllers\HomeController::class, 'updateProjetE'])->middleware(['auth', 'agent']);

    Route::get('/listeContratAP', [App\Http\Controllers\HomeController::class, 'listeContratAP'])->middleware(['auth', 'agent']);
    Route::delete('/listeContratAP/{id}', [App\Http\Controllers\HomeController::class, 'deleteContratAP'])->middleware(['auth', 'agent']);
    Route::get('singleContratAP/{id}', [App\Http\Controllers\HomeController::class, 'singleContratAP'])->middleware(['auth', 'agent']);
    Route::post('telechargerContratAP', [App\Http\Controllers\HomeController::class, 'telechargerContratAP'])->middleware(['auth', 'agent']);

    Route::get('/listeContratAA', [App\Http\Controllers\HomeController::class, 'listeContratAA'])->middleware(['auth', 'agent']);
    Route::delete('/listeContratAA/{id}', [App\Http\Controllers\HomeController::class, 'deleteContratAA'])->middleware(['auth', 'agent']);
    Route::get('singleContratAA/{id}', [App\Http\Controllers\HomeController::class, 'singleContratAA'])->middleware(['auth', 'agent']);
    Route::post('telechargerContratAA', [App\Http\Controllers\HomeController::class, 'telechargerContratAA'])->middleware(['auth', 'agent']);

    Route::get('/listeContratE', [App\Http\Controllers\HomeController::class, 'listeContratE'])->middleware(['auth', 'agent']);
    Route::delete('/listeContratE/{id}', [App\Http\Controllers\HomeController::class, 'deleteContratE'])->middleware(['auth', 'agent']);
    Route::get('singleContratE/{id}', [App\Http\Controllers\HomeController::class, 'singleContratE'])->middleware(['auth', 'agent']);
    Route::post('telechargerContratE', [App\Http\Controllers\HomeController::class, 'telechargerContratE'])->middleware(['auth', 'agent']);


    Route::delete('/notification/{id}', [App\Http\Controllers\HomeController::class, 'deleteCalendrier'])->middleware(['auth', 'agent']);

    Route::get('/AjouterContratsAA/{id}', [App\Http\Controllers\HomeController::class, 'findProjetAA'])->middleware(['auth', 'agent']);
    Route::post('/AjouterContratsAA/{id}', [App\Http\Controllers\HomeController::class, 'storeContratAA'])->middleware(['auth', 'agent']);

    Route::get('/AjouterContratsAP/{id}', [App\Http\Controllers\HomeController::class, 'findProjetAP'])->middleware(['auth', 'agent']);
    Route::post('/AjouterContratsAP/{id}', [App\Http\Controllers\HomeController::class, 'storeContratAP'])->middleware(['auth', 'agent']);

    Route::get('/AjouterContratsE/{id}', [App\Http\Controllers\HomeController::class, 'findProjetE'])->middleware(['auth', 'agent']);
    Route::post('/AjouterContratsE/{id}', [App\Http\Controllers\HomeController::class, 'storeContratE'])->middleware(['auth', 'agent']);

    //edit profile
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'edit'])->middleware(['auth', 'agent']);
    Route::put('/profile/{user}', [App\Http\Controllers\HomeController::class, 'update'])->middleware(['auth', 'agent']);

    //import excel file
    Route::get('/importer', [App\Http\Controllers\ImportController::class, 'show'])->middleware(['auth', 'agent']);
    Route::post('/importer', [App\Http\Controllers\ImportController::class, 'store'])->middleware(['auth', 'agent']);






/*Les pages du gestionnaire */
Route::get('/Gestionnaire/index', [App\Http\Controllers\GestionnaireController::class, 'index'])->middleware(['auth', 'gestionnaire']);



    Route::delete('Gestionnaire/notification/{id}', [App\Http\Controllers\HomeController::class, 'deleteCalendrier'])->middleware(['auth', 'gestionnaire']);    

Route::get('/Gestionnaire/listeAgents', [App\Http\Controllers\GestionnaireController::class, 'listeAgents'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/listeContratAA', [App\Http\Controllers\GestionnaireController::class, 'listeContratAA'])->middleware(['auth', 'gestionnaire']);
Route::put('/Gestionnaire/listeContratAA/{id}', [App\Http\Controllers\GestionnaireController::class, 'updateCommentCA'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/listeContratAP', [App\Http\Controllers\GestionnaireController::class, 'listeContratAP'])->middleware(['auth', 'gestionnaire']);
Route::put('/Gestionnaire/listeContratAP/{id}', [App\Http\Controllers\GestionnaireController::class, 'updateCommentCP'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/listeContratE', [App\Http\Controllers\GestionnaireController::class, 'listeContratE'])->middleware(['auth', 'gestionnaire']);
Route::put('/Gestionnaire/listeContratE/{id}', [App\Http\Controllers\GestionnaireController::class, 'updateCommentCE'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/listeProjetAA', [App\Http\Controllers\GestionnaireController::class, 'listeProjetAA'])->middleware(['auth', 'gestionnaire']);
Route::put('/Gestionnaire/listeProjetAA/{id}', [App\Http\Controllers\GestionnaireController::class, 'updateCommentAA'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/listeProjetAP', [App\Http\Controllers\GestionnaireController::class, 'listeProjetAP'])->middleware(['auth', 'gestionnaire']);
Route::put('/Gestionnaire/listeProjetAP/{id}', [App\Http\Controllers\GestionnaireController::class, 'updateCommentAP'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/listeProjetE', [App\Http\Controllers\GestionnaireController::class, 'listeProjetE'])->middleware(['auth', 'gestionnaire']);
Route::put('/Gestionnaire/listeProjetE/{id}', [App\Http\Controllers\GestionnaireController::class, 'updateCommentE'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/notification', [App\Http\Controllers\GestionnaireController::class, 'notification'])->middleware(['auth', 'gestionnaire']);
Route::delete('/Gestionnaire/notification/{id}', [App\Http\Controllers\GestionnaireController::class, 'deleteCalendrier'])->middleware(['auth', 'gestionnaire']);

//edit profile
Route::get('/Gestionnaire/profile', [App\Http\Controllers\GestionnaireController::class, 'edit'])->middleware(['auth', 'gestionnaire']);
Route::put('/Gestionnaire/profile/{user}', [App\Http\Controllers\GestionnaireController::class, 'update'])->middleware(['auth', 'gestionnaire']);

//pour la facture
Route::get('/Gestionnaire/factureAP', [App\Http\Controllers\GestionnaireController::class, 'factureAP'])->middleware(['auth', 'gestionnaire']);
Route::post('/Gestionnaire/factureAP', [App\Http\Controllers\GestionnaireController::class, 'storeFactureAP'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/factureAA', [App\Http\Controllers\GestionnaireController::class, 'factureAA'])->middleware(['auth', 'gestionnaire']);
Route::post('/Gestionnaire/factureAA', [App\Http\Controllers\GestionnaireController::class, 'storeFactureAA'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/factureE', [App\Http\Controllers\GestionnaireController::class, 'factureE'])->middleware(['auth', 'gestionnaire']);
Route::post('/Gestionnaire/factureE', [App\Http\Controllers\GestionnaireController::class, 'storeFactureE'])->middleware(['auth', 'gestionnaire']);

Route::get('/Gestionnaire/singleFactureAP/{id}', [App\Http\Controllers\GestionnaireController::class, 'singleFactureAP'])->middleware(['auth', 'gestionnaire']);
Route::get('/Gestionnaire/singleFactureAA/{id}', [App\Http\Controllers\GestionnaireController::class, 'singleFactureAA'])->middleware(['auth', 'gestionnaire']);
Route::get('/Gestionnaire/singleFactureE/{id}', [App\Http\Controllers\GestionnaireController::class, 'singleFactureE'])->middleware(['auth', 'gestionnaire']);


Route::post('/Gestionnaire/telechargerFactureAP', [App\Http\Controllers\GestionnaireController::class, 'telechargerFactureAP'])->middleware(['auth', 'gestionnaire']);
Route::post('/Gestionnaire/telechargerFactureAA', [App\Http\Controllers\GestionnaireController::class, 'telechargerFactureAA'])->middleware(['auth', 'gestionnaire']);
Route::post('/Gestionnaire/telechargerFactureE', [App\Http\Controllers\GestionnaireController::class, 'telechargerFactureE'])->middleware(['auth', 'gestionnaire']);


/*Les pages du Admin */
Route::get('/Admin/index', [App\Http\Controllers\AdminController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('/Admin/ajouter', [App\Http\Controllers\AdminController::class, 'ajouter'])->middleware(['auth', 'admin']);
Route::post('/Admin/ajouter', [App\Http\Controllers\AdminController::class, 'storeClient'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeClients', [App\Http\Controllers\AdminController::class, 'listeClients'])->middleware(['auth', 'admin']);
Route::delete('/Admin/listeClients/{id}', [App\Http\Controllers\AdminController::class, 'deleteClient'])->middleware(['auth', 'admin']);
Route::get('/Admin/edit/editClient/{id}', [App\Http\Controllers\AdminController::class, 'editClient'])->middleware(['auth', 'admin']);
Route::put('/Admin/edit/editClient/{id}', [App\Http\Controllers\AdminController::class, 'updateClient'])->middleware(['auth', 'admin']);

Route::get('/Admin/contacterClients', [App\Http\Controllers\AdminController::class, 'contacterClients'])->middleware(['auth', 'admin']);
//Route::post('/Admin/contacterClients', [App\Http\Controllers\SendMailController::class, 'mailSend'])->name('mailsend')->middleware(['auth', 'admin']);
Route::post('Admin/contacterClients', [App\Http\Controllers\PDFController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('/Admin/ajouterAgent', [App\Http\Controllers\AdminController::class, 'ajouterAgent'])->middleware(['auth', 'admin']);
Route::post('/Admin/ajouterAgent', [App\Http\Controllers\AdminController::class, 'storeAgent'])->middleware(['auth', 'admin']);

Route::get('/Admin/ajouterGestionnaire', [App\Http\Controllers\AdminController::class, 'ajouterGestionnaire'])->middleware(['auth', 'admin']);
Route::post('/Admin/ajouterGestionnaire', [App\Http\Controllers\AdminController::class, 'storeGestionnaire'])->middleware(['auth', 'admin']);

Route::get('/Admin/assurancePersonne', [App\Http\Controllers\AdminController::class, 'assurancePersonne'])->middleware(['auth', 'admin']);
Route::post('/Admin/assurancePersonne', [App\Http\Controllers\AdminController::class, 'storeAssuranceP'])->middleware(['auth', 'admin']);

Route::get('/Admin/assuranceAnimaux', [App\Http\Controllers\AdminController::class, 'assuranceAnimaux'])->middleware(['auth', 'admin']);
Route::post('/Admin/assuranceAnimaux', [App\Http\Controllers\AdminController::class, 'storeAssuranceA'])->middleware(['auth', 'admin']);

Route::get('/Admin/emprunteur', [App\Http\Controllers\AdminController::class, 'emprunteur'])->middleware(['auth', 'admin']);
Route::post('/Admin/emprunteur', [App\Http\Controllers\AdminController::class, 'storeE'])->middleware(['auth', 'admin']);


Route::delete('/Admin/notification/{id}', [App\Http\Controllers\AdminController::class, 'deleteCalendrier'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeAgents', [App\Http\Controllers\AdminController::class, 'listeAgents'])->middleware(['auth', 'admin']);

Route::delete('/Admin/listeAgents/{id}', [App\Http\Controllers\AdminController::class, 'deleteAgent'])->middleware(['auth', 'admin']);

Route::get('Admin/edit/editAgent/{id}', [App\Http\Controllers\AdminController::class, 'editAgent'])->middleware(['auth', 'admin']);
Route::put('Admin/edit/editAgent/{id}', [App\Http\Controllers\AdminController::class, 'updateAgent'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeContratAA', [App\Http\Controllers\AdminController::class, 'listeContratAA'])->middleware(['auth', 'admin']);
Route::delete('/Admin/listeContratAA/{id}', [App\Http\Controllers\AdminController::class, 'deleteContratAA'])->middleware(['auth', 'admin']);
Route::get('Admin//singleContratAA/{id}', [App\Http\Controllers\AdminController::class, 'singleContratAA'])->middleware(['auth', 'admin']);
Route::post('/Admin/telechargerContratAA', [App\Http\Controllers\AdminController::class, 'telechargerContratAA'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeContratAP', [App\Http\Controllers\AdminController::class, 'listeContratAP'])->middleware(['auth', 'admin']);
Route::delete('/Admin/listeContratAP/{id}', [App\Http\Controllers\AdminController::class, 'deleteContratAP'])->middleware(['auth', 'admin']);
Route::get('Admin//singleContratAP/{id}', [App\Http\Controllers\AdminController::class, 'singleContratAP'])->middleware(['auth', 'admin']);
Route::post('/Admin/telechargerContratAP', [App\Http\Controllers\AdminController::class, 'telechargerContratAP'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeContratE', [App\Http\Controllers\AdminController::class, 'listeContratE'])->middleware(['auth', 'admin']);
Route::delete('/Admin/listeContratE/{id}', [App\Http\Controllers\AdminController::class, 'deleteContratE'])->middleware(['auth', 'admin']);
Route::get('Admin//singleContratE/{id}', [App\Http\Controllers\AdminController::class, 'singleContratE'])->middleware(['auth', 'admin']);
Route::post('/Admin/telechargerContratE', [App\Http\Controllers\AdminController::class, 'telechargerContratE'])->middleware(['auth', 'admin']);

Route::get('Admin/AjouterContratsAA/{id}', [App\Http\Controllers\AdminController::class, 'findProjetAA'])->middleware(['auth', 'admin']);
Route::post('Admin/AjouterContratsAA/{id}', [App\Http\Controllers\AdminController::class, 'storeContratAA'])->middleware(['auth', 'admin']);

Route::get('Admin/AjouterContratsAP/{id}', [App\Http\Controllers\AdminController::class, 'findProjetAP'])->middleware(['auth', 'admin']);
Route::post('Admin/AjouterContratsAP/{id}', [App\Http\Controllers\AdminController::class, 'storeContratAP'])->middleware(['auth', 'admin']);

Route::get('Admin/AjouterContratsE/{id}', [App\Http\Controllers\AdminController::class, 'findProjetE'])->middleware(['auth', 'admin']);
Route::post('Admin/AjouterContratsE/{id}', [App\Http\Controllers\AdminController::class, 'storeContratE'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeGestionnaire', [App\Http\Controllers\AdminController::class, 'listeGestionnaire']);
Route::delete('/Admin/listeGestionnaire/{id}', [App\Http\Controllers\AdminController::class, 'deleteGestionnaire'])->middleware(['auth', 'admin']);

Route::get('Admin/edit/editGestionnaire/{id}', [App\Http\Controllers\AdminController::class, 'editGestionnaire'])->middleware(['auth', 'admin']);
Route::put('Admin/edit/editGestionnaire/{id}', [App\Http\Controllers\AdminController::class, 'updateGestionnaire'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeProjetAP', [App\Http\Controllers\AdminController::class, 'listeProjetAP'])->middleware(['auth', 'admin']);
Route::delete('/Admin/listeProjetAP/{id}', [App\Http\Controllers\AdminController::class, 'deleteProjetAP'])->middleware(['auth', 'admin']);
Route::get('/Admin/edit/editProjetAP/{id}', [App\Http\Controllers\AdminController::class, 'editProjetAP'])->middleware(['auth', 'admin']);
Route::put('/Admin/edit/editProjetAP/{id}', [App\Http\Controllers\AdminController::class, 'updateProjetAP'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeProjetAA', [App\Http\Controllers\AdminController::class, 'listeProjetAA'])->middleware(['auth', 'admin']);
Route::delete('/Admin/listeProjetAA/{id}', [App\Http\Controllers\AdminController::class, 'deleteProjetAA'])->middleware(['auth', 'admin']);
Route::get('/Admin/edit/editProjetAA/{id}', [App\Http\Controllers\AdminController::class, 'editProjetAA'])->middleware(['auth', 'admin']);
Route::put('/Admin/edit/editProjetAA/{id}', [App\Http\Controllers\AdminController::class, 'updateProjetAA'])->middleware(['auth', 'admin']);

Route::get('/Admin/listeProjetE', [App\Http\Controllers\AdminController::class, 'listeProjetE'])->middleware(['auth', 'admin']);
Route::delete('/Admin/listeProjetE/{id}', [App\Http\Controllers\AdminController::class, 'deleteProjetE'])->middleware(['auth', 'admin']);
Route::get('/Admin/edit/editProjetE/{id}', [App\Http\Controllers\AdminController::class, 'editProjetE'])->middleware(['auth', 'admin']);
Route::put('/Admin/edit/editProjetE/{id}', [App\Http\Controllers\AdminController::class, 'updateProjetE'])->middleware(['auth', 'admin']);

Route::get('/Admin/notification', [App\Http\Controllers\AdminController::class, 'notification'])->middleware(['auth', 'admin']);

Route::get('/Admin/importer', [App\Http\Controllers\ImportController::class, 'show'])->middleware(['auth', 'admin']);
Route::post('/Admin/importer', [App\Http\Controllers\ImportController::class, 'store'])->middleware(['auth', 'admin']);

//pour la facture
Route::get('/Admin/factureAP', [App\Http\Controllers\AdminController::class, 'factureAP'])->middleware(['auth', 'admin']);
Route::post('/Admin/factureAP', [App\Http\Controllers\AdminController::class, 'storeFactureAP'])->middleware(['auth', 'admin']);

Route::get('/Admin/factureAA', [App\Http\Controllers\AdminController::class, 'factureAA'])->middleware(['auth', 'admin']);
Route::post('/Admin/factureAA', [App\Http\Controllers\AdminController::class, 'storeFactureAA'])->middleware(['auth', 'admin']);

Route::get('/Admin/factureE', [App\Http\Controllers\AdminController::class, 'factureE'])->middleware(['auth', 'admin']);
Route::post('/Admin/factureE', [App\Http\Controllers\AdminController::class, 'storeFactureE'])->middleware(['auth', 'admin']);

Route::get('/Admin/singleFactureAP/{id}', [App\Http\Controllers\AdminController::class, 'singleFactureAP'])->middleware(['auth', 'admin']);
Route::get('/Admin/singleFactureAA/{id}', [App\Http\Controllers\AdminController::class, 'singleFactureAA'])->middleware(['auth', 'admin']);
Route::get('/Admin/singleFactureE/{id}', [App\Http\Controllers\AdminController::class, 'singleFactureE'])->middleware(['auth', 'admin']);


Route::post('/Admin/telechargerFactureAP', [App\Http\Controllers\AdminController::class, 'telechargerFactureAP'])->middleware(['auth', 'admin']);
Route::post('/Admin/telechargerFactureAA', [App\Http\Controllers\AdminController::class, 'telechargerFactureAA'])->middleware(['auth', 'admin']);
Route::post('/Admin/telechargerFactureE', [App\Http\Controllers\AdminController::class, 'telechargerFactureE'])->middleware(['auth', 'admin']);


//logout:
Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');

//edit mon profile
Route::get('/Admin/profile', [App\Http\Controllers\AdminController::class, 'edit'])->middleware(['auth', 'admin']);
Route::put('/Admin/profile/{user}', [App\Http\Controllers\AdminController::class, 'update'])->middleware(['auth', 'admin']);

Auth::routes();


Route::get('mail', [App\Http\Controllers\sendMailController::class, 'mailAgent'])->middleware(['auth', 'agent']);
Route::get('Admin/mail', [App\Http\Controllers\sendMailController::class, 'mailAdmin'])->middleware(['auth', 'admin']);




Route::post('/contacterClients', [App\Http\Controllers\PDFController::class, 'index'])->middleware(['auth', 'agent']);



//Calendrier pour agent 

Route::get('/calendrier', [App\Http\Controllers\HomeController::class, 'calendrier'])->middleware(['auth', 'agent']);
    Route::get('/calendrier-show', [App\Http\Controllers\HomeController::class, 'showCalendrier'])
    ->middleware(['auth', 'agent'])
    ->name('calendrier.show');
    Route::post('/calendrier', [App\Http\Controllers\HomeController::class, 'storeCalendrier'])
    ->middleware(['auth', 'agent'])
    ->name('calendrier.store');



//Calendrier pour Gestionnaire

Route::get('/Gestionnaire/calendrier', [App\Http\Controllers\GestionnaireController::class, 'calendrier'])->middleware(['auth', 'gestionnaire']);
Route::get('Gestionnaire/calendrier-show', [App\Http\Controllers\GestionnaireController::class, 'showCalendrier'])
    ->middleware(['auth', 'gestionnaire'])
    ->name('gestionnaire.calendrier.show');
Route::post('Gestionnaire/calendrier', [App\Http\Controllers\GestionnaireController::class, 'storeCalendrier'])
    ->middleware(['auth', 'gestionnaire'])
    ->name('gestionnaire.calendrier.store');

//Calendrier pour Admin
Route::get('/Admin/calendrier', [App\Http\Controllers\AdminController::class, 'calendrier'])->middleware(['auth', 'admin']);
Route::get('Admin/calendrier-show', [App\Http\Controllers\AdminController::class, 'showCalendrier'])
    ->middleware(['auth', 'admin'])
    ->name('admin.calendrier.show');
Route::post('Admin/calendrier', [App\Http\Controllers\AdminController::class, 'storeCalendrier'])
    ->middleware(['auth', 'admin'])
    ->name('admin.calendrier.store');

