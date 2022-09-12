<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\ContratAnimal;
use App\Models\ContratPersonne;
use App\Models\ContratEmprunteur;
use App\Models\AssuranceAnimal;
use App\Models\AssurancePersonne;

use App\Models\Emprunteur;
use App\Models\Notif;
use App\Models\Calendrier;
use Illuminate\Support\Facades\DB;

use App\Models\FactureAnimal;
use App\Models\Facture;
use App\Models\FacturePersonne;
use App\Models\FactureEmprunteur;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use PDF;

use Illuminate\Http\Request;

class GestionnaireController extends Controller
{
    public function index(){
        $gest = User::all()->where('role', 'Gestionnaire')->count();
        $agent = User::all()->where('role', 'Agent')->count();
        $client = Client::all()->count();
        $date = Carbon::now()->format('d-m-Y');
        

        $months2 = [];
        $monthCount2 = [];
        $data2 = Facture::select('id', 'created_at')->get()->groupBy(function($data2){
            return Carbon::parse($data2->created_at)->format('F');
        });
        foreach($data2 as $month => $values){
            $months2[]=$month;
            $monthCount2[]=count($values);
        }  
        
        
        return view('Gestionnaire/index', compact('gest', 'agent', 'client', 'date','data2','months2','monthCount2'));
       
    }
    public function listeAgents()
    {
        
        $agent = User::all()->where('role', 'Agent');
        return view('Gestionnaire/listeAgents', compact('agent'));
    }

    public function notification()
    {
        $user = Auth::user();
        $event = Calendrier::all()->where('user_id', $user->id);
        return view('/Gestionnaire/notification', compact('user', 'event'));
    }
    
    public function listeProjetAP()
    {
        $user = Auth::user();
        $projetAP = AssurancePersonne::all()->where('user_id', $user->id);
        return view('Gestionnaire/listeProjetAP', compact('projetAP', 'user'));
    }

    public function updateCommentAP(Request $request, $id){
        $findprojetAP = AssurancePersonne::find($id);

        $request->validate([
                            'commentaire']);

        $findprojetAP->commentaire = $request->commentaire;

        $findprojetAP->save();
        return redirect('/Gestionnaire/listeProjetAP')->with('message', 'Commentaire ajouté avec succès! ');

    }

    public function listeProjetAA(){
        $user = Auth::user();
        $projetAA = AssuranceAnimal::all()->where('user_id', $user->id);
        return view('Gestionnaire/listeProjetAA', compact('projetAA', 'user'));
    }
    public function updateCommentAA(Request $request, $id){
        $findprojetAA = AssuranceAnimal::find($id);

        $request->validate([
                            'commentaire']);

        $findprojetAA->commentaire = $request->commentaire;

        $findprojetAA->save();
        return redirect('/Gestionnaire/listeProjetAA')->with('message', 'Commentaire ajouté avec succès! ');

    }

    public function listeProjetE()
    {
        $user = Auth::user();
        $projetE = Emprunteur::all()->where('user_id', $user->id);
        return view('Gestionnaire/listeProjetE', compact('projetE', 'user'));
    }

    public function updateCommentE(Request $request, $id){

        $findprojetE = Emprunteur::find($id);

        $request->validate([
                            'commentaire']);

        $findprojetE->commentaire = $request->commentaire;

        $findprojetE->save();
        return redirect('/Gestionnaire/listeProjetE')->with('message', 'Commentaire ajouté avec succès! ');

    }

    public function listeContratAP()
    {
        $user = Auth::user();
        $contratAP = ContratPersonne::all()->where('gestionnaire_id', $user->id);
        return view('Gestionnaire/listeContratAP', compact('user', 'contratAP'));
    }

    public function updateCommentCP(Request $request, $id){
        $findcontratAP = ContratPersonne::find($id);

        $request->validate([
                            'commentaire']);

        $findcontratAP->commentaire = $request->commentaire;

        $findcontratAP->save();
        return redirect('/Gestionnaire/listeContratAP')->with('message', 'Commentaire ajouté avec succès! ');

    }
    public function listeContratAA()
    {
        $user = Auth::user();$user = Auth::user();
        $contratAA = ContratAnimal::all()->where('gestionnaire_id', $user->id);
        return view('Gestionnaire/listeContratAA', compact('user', 'contratAA'));
    }

    public function updateCommentCA(Request $request, $id){
        $findcontratAA = ContratAnimal::find($id);

        $request->validate([
                            'commentaire']);

        $findcontratAA->commentaire = $request->commentaire;

        $findcontratAA->save();
        return redirect('/Gestionnaire/listeContratAA')->with('message', 'Commentaire ajouté avec succès! ');

    }
    public function listeContratE()
    {
        $user = Auth::user();$user = Auth::user();
        $contratE = ContratEmprunteur::all()->where('gestionnaire_id', $user->id);
        return view('Gestionnaire/listeContratE', compact('user', 'contratE'));
    }

    public function updateCommentCE(Request $request, $id){
        $findcontratE = ContratEmprunteur::find($id);

        $request->validate([
                            'commentaire']);

        $findcontratE->commentaire = $request->commentaire;

        $findcontratE->save();
        return redirect('/Gestionnaire/listeContratE')->with('message', 'Commentaire ajouté avec succès! ');

    }
    function showCalendrier()
    {
        $calendriers = Calendrier::query()
                ->where('user_id', auth()->id())
                ->get();

        return response()->json($calendriers);
    }
    function storeCalendrier(Request $request){
        $user = Auth::user();
        $request->validate(['titreEvent'=> 'required', 
                            'dateEvent' => 'required',
                            'timeEvent' => 'required',
                            'theme'=> 'required',
                            ]);
        if(date('Y-m-d', strtotime($request->dateEvent)) >= Carbon::now()->format('Y-m-d')){
            $calendrier = new Calendrier();
            $calendrier->titreEvent = $request->titreEvent; 
            $calendrier->dateEvent = date('Y-m-d', strtotime($request->dateEvent)).' '.$request->timeEvent;
            $calendrier->theme = $request->theme;
            $calendrier->user_id = $user->id;

            $calendrier->save();
            return response()->json();
       }
    

    }
    
    public function calendrier()
    {
        $userAuth = Auth::user();
        return view('/Gestionnaire/calendrier', compact('userAuth'));
    }

    public function deleteCalendrier($id){
        $event = Calendrier::find($id);
        $event->delete();
        return redirect()->back()->with('message', 'Evenement supprimé avec succès !');
    }


    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('/Gestionnaire/profile', compact('user'));
    }

    public function update(User $user)
    { 
        $this->validate(request(), [
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'adresse' => 'required'
        ]);

        $user->nom = request('nom');
        $user->prenom = request('prenom');
        $user->email = request('email');
        $user->telephone = request('telephone');
        $user->adresse = request('adresse');

        $user->save();
        return back()->with('message', 'Votre profile est modifié !');
    }
    
       
    
    
    public function factureAP()
    {
        if(empty(FacturePersonne::count())){
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratAP = ContratPersonne::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FacturePersonne::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureAP', compact('client', 'numFacture', 'contratAP','facture'));
        }
        else{
        $numFacture ='F';
        $varDate=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numFacture.='0000';
        $facture = DB::table('facture_personnes')->orderby('id', 'desc')->value('N_Facture');
        $varArray = str_split($facture, 1);
        $date = $varArray[1].$varArray[2].$varArray[3].$varArray[4].$varArray[5].$varArray[6].$varArray[7].$varArray[8];
        $nbr = $varArray[11].$varArray[12].$varArray[13];
        
        
        if($date == $varDate){
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='0000'; 
            $numFacture.=(int)$nbr+1;
            $user = Auth::user();
            $contratAP = ContratPersonne::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FacturePersonne::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureAP', compact('client', 'numFacture', 'contratAP','facture'));
        }
        else{
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratAP = ContratPersonne::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FacturePersonne::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureAP', compact('client', 'numFacture', 'contratAP','facture'));
        }
     }
    }

    public function factureAA()
    {
        if(empty(FactureAnimal::count())){
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratAA = ContratAnimal::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FactureAnimal::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureAA', compact('client', 'numFacture', 'contratAA','facture'));
        }
        else{
        $numFacture ='F';
        $varDate=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numFacture.='0000';
        $facture = DB::table('facture_animals')->orderby('id', 'desc')->value('N_Facture');
        $varArray = str_split($facture, 1);
        $date = $varArray[1].$varArray[2].$varArray[3].$varArray[4].$varArray[5].$varArray[6].$varArray[7].$varArray[8];
        $nbr = $varArray[11].$varArray[12].$varArray[13];
        
        
        if($date == $varDate){
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='0000'; 
            $numFacture.=(int)$nbr+1;
            $user = Auth::user();
            $contratAA = ContratAnimal::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FactureAnimal::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureAA', compact('client', 'numFacture', 'contratAA','facture'));
        }
        else{
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratAA = ContratAnimal::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FactureAnimal::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureAA', compact('client', 'numFacture', 'contratAA','facture'));
        }
     }
    }
    public function factureE()
    {
        if(empty(FactureEmprunteur::count())){
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratE = ContratEmprunteur::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FactureEmprunteur::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureE', compact('client', 'numFacture', 'contratE','facture'));
        }
        else{
        
        $numFacture ='F';
        $varDate=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numFacture.='0000';
        $facture = DB::table('facture_emprunteurs')->orderby('id', 'desc')->value('N_Facture');
        $varArray = str_split($facture, 1);
        $date = $varArray[1].$varArray[2].$varArray[3].$varArray[4].$varArray[5].$varArray[6].$varArray[7].$varArray[8];
        $nbr = $varArray[11].$varArray[12].$varArray[13];
        
        
        if($date == $varDate){
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='0000'; 
            $numFacture.=(int)$nbr+1;
            $user = Auth::user();
            $contratE = ContratEmprunteur::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FactureEmprunteur::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureE', compact('client', 'numFacture', 'contratE','facture'));
        }
        else{
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratE = ContratEmprunteur::all()->where('gestionnaire_id', $user->id);
            $client = Client::all();
            $facture = FactureEmprunteur::all()->where('gestionnaire_id', $user->id);
            return view('Gestionnaire/factureE', compact('client', 'numFacture', 'contratE','facture'));
        }
      }
    }


    
    public function singleFactureAP($id){
            
        $facture = FacturePersonne::find($id);
        
       
        return view('Gestionnaire/singleFactureAP', compact('facture'));
    }

    public function singleFactureAA($id){
            
        $facture = FactureAnimal::find($id);
        
       
        return view('Gestionnaire/singleFactureAA', compact('facture'));
    }
    public function singleFactureE($id){
            
        $facture = FactureEmprunteur::find($id);
        
       
        return view('Gestionnaire/singleFactureE', compact('facture'));
    }

    public function telechargerFactureAP(request $request){
        
        $facture = FacturePersonne::find($request->id);
        $pdf = PDF::loadView('Gestionnaire/singleFactureAP',compact('facture'));
        return $pdf->download($facture->N_Facture.'.pdf');

    }

    public function telechargerFactureAA(request $request){
        
        $facture = FactureAnimal::find($request->id);
        $pdf = PDF::loadView('Gestionnaire/singleFactureAA',compact('facture'));
        return $pdf->download($facture->N_Facture.'.pdf');

    }
    public function telechargerFactureE(request $request){
        
        $facture = FactureEmprunteur::find($request->id);
        $pdf = PDF::loadView('Gestionnaire/singleFactureE',compact('facture'));
        return $pdf->download($facture->N_Facture.'.pdf');

    }

    function storeFactureAP(Request $request){
        
        $request->validate(['N_Facture'=> 'required',
                            'gestionnaire_id' => 'required',
                            'contrat_id'=> 'required', 
                            'Designation' => 'required',
                            'Date_emission' => 'required',
                            'Reglement' => 'required',
                            'statut' => 'required',
                            'Montant' => 'required',
                            'tva' => 'required'   ]);
        $facture = new FacturePersonne();
        
        $facture->N_Facture = $request->N_Facture;
        $facture->contratPersonne_id = $request->contrat_id;
        $facture->gestionnaire_id = $request->gestionnaire_id;
        $facture->Designation = $request->Designation;
        $facture->Date_emission = $request->Date_emission;
        $facture->Reglement = $request->Reglement;
        $facture->statut = $request->statut;
        $facture->Montant = $request->Montant;
        $facture->taux_tva = $request->tva;

        $factureF = new Facture();
        $factureF->N_Facture = $request->N_Facture;
        $factureF->contrat_id = $request->contrat_id;
        $factureF->Designation = $request->Designation;
        $factureF->Date_emission = $request->Date_emission;
        $factureF->Reglement = $request->Reglement;
        $factureF->statut = $request->statut;
        $factureF->Montant = $request->Montant;
        $factureF->taux_tva = $request->tva;
        $factureF->save();
        $facture->save();
        return redirect('Gestionnaire/factureAP')->with('message', 'Nouvelle Facture insérée avec succès !');
    }
    function storeFactureAA(Request $request){
        
        $request->validate(['N_Facture'=> 'required',
                            'gestionnaire_id' => 'required',
                            'contrat_id'=> 'required',  
                            'Designation' => 'required',
                            'Date_emission' => 'required',
                            'Reglement' => 'required',
                            'statut' => 'required',
                            'Montant' => 'required',
                            'tva' => 'required'   ]);
        $facture = new FactureAnimal();
        $facture->N_Facture = $request->N_Facture;
        $facture->contratAnimal_id = $request->contrat_id;
        $facture->gestionnaire_id = $request->gestionnaire_id;
        $facture->Designation = $request->Designation;
        $facture->Date_emission = $request->Date_emission;
        $facture->Reglement = $request->Reglement;
        $facture->statut = $request->statut;
        $facture->Montant = $request->Montant;
        $facture->taux_tva = $request->tva;

        $factureF = new Facture();
        $factureF->N_Facture = $request->N_Facture;
        $factureF->contrat_id = $request->contrat_id;
        $factureF->Designation = $request->Designation;
        $factureF->Date_emission = $request->Date_emission;
        $factureF->Reglement = $request->Reglement;
        $factureF->statut = $request->statut;
        $factureF->Montant = $request->Montant;
        $factureF->taux_tva = $request->tva;
        $factureF->save();
        $facture->save();
        return redirect('Gestionnaire/factureAA')->with('message', 'Nouvelle Facture insérée avec succès !');
    }
    function storeFactureE(Request $request){
        
        $request->validate(['N_Facture'=> 'required', 
                            'gestionnaire_id' => 'required',
                            'contrat_id'=> 'required', 
                            'Designation' => 'required',
                            'Date_emission' => 'required',
                            'Reglement' => 'required',
                            'statut' => 'required',
                            'Montant' => 'required',
                            'tva' => 'required'   ]);
        $facture = new FactureEmprunteur();
        $facture->N_Facture = $request->N_Facture;
        $facture->contratEmprunteur_id = $request->contrat_id;
        $facture->gestionnaire_id = $request->gestionnaire_id;
        $facture->Designation = $request->Designation;
        $facture->Date_emission = $request->Date_emission;
        $facture->Reglement = $request->Reglement;
        $facture->statut = $request->statut;
        $facture->Montant = $request->Montant;
        $facture->taux_tva = $request->tva;

        $factureF = new Facture();
        $factureF->N_Facture = $request->N_Facture;
        $factureF->contrat_id = $request->contrat_id;
        $factureF->Designation = $request->Designation;
        $factureF->Date_emission = $request->Date_emission;
        $factureF->Reglement = $request->Reglement;
        $factureF->statut = $request->statut;
        $factureF->Montant = $request->Montant;
        $factureF->taux_tva = $request->tva;
        $factureF->save();
        $facture->save();
        return redirect('Gestionnaire/factureE')->with('message', 'Nouvelle Facture insérée avec succès !');
    }

}
