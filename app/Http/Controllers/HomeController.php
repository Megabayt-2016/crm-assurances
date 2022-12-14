<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\User;
use App\Models\AssuranceAnimal;
use App\Models\AssureAnimal;
use App\Models\AssurePersonne;
use App\Models\AssurancePersonne;
use App\Models\ContratPersonne;
use App\Models\ContratAnimal;
use App\Models\ContratEmprunteur;
use App\Models\File;
use App\Models\Notif;
use App\Models\Facture;

use App\Models\Calendrier;

use Illuminate\Support\Facades\Auth;
use App\Notifications\EmailNotification;

use PDF;


use Carbon\Carbon;

use App\Models\Emprunteur;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function index()
    {
        $gest = User::all()->where('role', 'Gestionnaire')->count();
        $agent = User::all()->where('role', 'Agent')->count();
        $client = Client::all()->count();
        $date = Carbon::now('UTC')->addHour('1')->format('d-m-Y');
        $data1 = Facture::select('id', 'created_at')->get()->groupBy(function($data1){
            return Carbon::parse($data1->created_at)->format('F');
        });
        $months = [];
        $monthCount = [];
        foreach($data1 as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);

        }
        
        return view('index', compact('gest', 'agent', 'client', 'date', 'data1', 'months', 'monthCount'));
    }
    public function ajouter()
    {
        return view('ajouter');
    }
    public function listeClients()
    {
        $client = Client::all();
        return view('listeClients', compact('client'));
    }
    
    public function contacterClients()
    {
        $client = Client::all();
        return view('contacterClients', compact('client'));
    }
    public function notification()
    {
        $user = Auth::user();
        $event = Calendrier::all()->where('user_id', $user->id);
        return view('notification', compact('user', 'event'));
    }
    
    public function assurancePersonne()
    {
        $gestionnaire = User::all()->where('role','Gestionnaire');
        $client = Client::all();
        $assurancestypes = AssurancesType::all();
        return view('assurancePersonne', compact('client', 'gestionnaire', 'assurancestypes'));
    }

    public function assuranceAnimaux()
    {
        $gestionnaire = User::all()->where('role','Gestionnaire');
        $client = Client::all();
        return view('assuranceAnimaux', compact('client', 'gestionnaire'));
    }
    public function emprunteur()
    {
        $gestionnaire = User::all()->where('role','Gestionnaire');
        $client = Client::all();
        return view('emprunteur' , compact('client', 'gestionnaire'));
    }
    public function listeProjetAP()
    {
        $user = auth()->user();
        $projetAP = AssurancePersonne::all()->where('agent_id','=', $user->id);
        return view('listeProjetAP', compact('projetAP', 'user'));
    }
    public function listeProjetAA()
    {
        $user = auth()->user();
        $projetAA = AssuranceAnimal::all()->where('agent_id','=',$user->id);
        return view('listeProjetAA', compact('projetAA', 'user'));
    }
    public function listeProjetE()
    {
        $user = auth()->user();
        $projetE = Emprunteur::all()->where('agent_id','=', $user->id);
        return view('listeProjetE', compact('projetE', 'user'));
    }
    public function listeContratAP()
    {
        $user = auth()->user();
        $contratAP = ContratPersonne::all()->where('agent_id','=',$user->id);
        return view('listeContratAP', compact('contratAP'));
    }
    public function listeContratAA()
    {
        $user = auth()->user();
        $contratAA = ContratAnimal::all()->where('agent_id','=', $user->id);
        return view('listeContratAA', compact('contratAA'));
    }
    public function listeContratE()
    {
        $user = auth()->user();
        $contratE = ContratEmprunteur::all()->where('agent_id','=', $user->id);
        return view('listeContratE', compact('contratE'));
    }
    
    

    public function findProjetAP($id)
    {
        $projetAP = AssurancePersonne::find($id);
        $assure = AssurePersonne::all()->where('assurancePersonne_id', $projetAP->id);
        if(empty(ContratPersonne::count())){
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('AjouterContratsAP', compact('projetAP', 'assure', 'numContrat'));
        }
        else{

        $numContrat ='A';
        $varDate=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numContrat.='0000';
        $contrat = DB::table('contrat_personnes')->orderby('id', 'desc')->value('N_Contrat');
        $varArray = str_split($contrat, 1);
        $date = $varArray[1].$varArray[2].$varArray[3].$varArray[4].$varArray[5].$varArray[6].$varArray[7].$varArray[8];
        $nbr = $varArray[11].$varArray[12].$varArray[13];

        if($date == $varDate){
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='0000'; 
            $numContrat.=(int)$nbr+1;
            return view('AjouterContratsAP', compact('projetAP', 'assure', 'numContrat'));
        }
        else{
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('AjouterContratsAP', compact('projetAP', 'assure', 'numContrat'));
        }
     }
    }

    public function findProjetAA($id)
    {
        $projetAA = AssuranceAnimal::find($id);
        $assure = AssureAnimal::all()->where('assuranceAnimal_id', $projetAA->id);
        
        if(empty(ContratAnimal::count())){
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('AjouterContratsAA', compact('projetAA', 'assure', 'numContrat'));
        }
        else{

        $numContrat ='A';
        $varDate=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numContrat.='0000';
        $contrat = DB::table('contrat_animals')->orderby('id', 'desc')->value('N_Contrat');
        $varArray = str_split($contrat, 1);
        $date = $varArray[1].$varArray[2].$varArray[3].$varArray[4].$varArray[5].$varArray[6].$varArray[7].$varArray[8];
        $nbr = $varArray[11].$varArray[12].$varArray[13];

        if($date == $varDate){
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='0000'; 
            $numContrat.=(int)$nbr+1;
            return view('AjouterContratsAA', compact('projetAA', 'assure', 'numContrat'));
        }
        else{
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('AjouterContratsAA', compact('projetAA', 'assure', 'numContrat'));
        }
     }
    }

    public function findProjetE($id)
    {
        $projetE = Emprunteur::find($id);
        if(empty(ContratEmprunteur::count())){
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('AjouterContratsE', compact('projetE', 'numContrat'));
        }
        else{

        $numContrat ='A';
        $varDate=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
        $numContrat.='0000';
        $contrat = DB::table('contrat_emprunteurs')->orderby('id', 'desc')->value('N_Contrat');
        $varArray = str_split($contrat, 1);
        $date = $varArray[1].$varArray[2].$varArray[3].$varArray[4].$varArray[5].$varArray[6].$varArray[7].$varArray[8];
        $nbr = $varArray[11].$varArray[12].$varArray[13];

        if($date == $varDate){
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='0000'; 
            $numContrat.=(int)$nbr+1;
            return view('AjouterContratsE', compact('projetE', 'numContrat'));
        }
        else{
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('AjouterContratsE', compact('projetE','numContrat'));
        }
     }
    }

    

    function storeClient(Request $request){
        
        $request->validate(['civilite'=> 'required', 
                            'prenom' => 'required', 
                            'nom' => 'required',
                            'raisonSociale' => 'required',
                            'tele' => 'required',
                            'adresse' => 'required',
                            'complementAdresse' => 'required',
                            'codePostal' => 'required',
                            'email' => 'required',
                            'ville' => 'required']);
        $client = new Client();
        $client->civilite = $request->civilite;
        $client->prenom = $request->prenom;
        $client->nom = $request->nom;
        $client->raisonSociale = $request->raisonSociale;
        $client->tele = $request->tele;
        $client->adresse = $request->adresse;
        $client->complementAdresse = $request->complementAdresse;
        $client->codePostal = $request->codePostal;
        $client->email = $request->email;
        $client->ville = $request->ville;

        $client->save();
        return redirect('ajouter')->with('message', 'Client ins??r?? avec succ??s !');
    }

    public function deleteClient($id)
    {
        $client = Client::findOrFail($id);
        $projetAP = AssurancePersonne::where('client_id', $id);
        $projetAA = AssuranceAnimal::where('client_id', $id);
        $projetE = Emprunteur::where('client_id', $id);
        $contratAP = ContratPersonne::where('client_id', $id);
        $contratAA = ContratAnimal::where('client_id', $id);
        $contratE = ContratEmprunteur::where('client_id', $id);
        $factureAP = FacturePersonne::where('client_id', $id);
        $factureAA = FactureAnimal::where('client_id', $id);
        $factureE = FactureEmprunteur::where('client_id', $id);

        $client->delete();
        $projetAP->delete();
        $projetAA->delete();
        $projetE->delete();
        $contratAP->delete();
        $contratAA->delete();
        $contratE->delete();
        $factureAP->delete();
        $factureAA->delete();
        $factureE->delete();
        return redirect()->back()->with('message', 'Client supprim?? avec succ??s !');
    }

    public function editClient($id)
    {
        $client = Client::find($id);
        return view('edit/editClient', compact('client'));
    }

    public function updateClient(Request $request, $id)
    {

        $client = Client::find($id);

        $request->validate([
                            'civilite'=> 'required', 
                            'prenom' => 'required', 
                            'nom' => 'required',
                            'raisonSociale' => 'required',
                            'tele' => 'required',
                            'adresse' => 'required',
                            'complementAdresse' => 'required',
                            'codePostal' => 'required',
                            'email' => 'required',
                            'ville' => 'required']);

        $client->civilite = $request->civilite;
        $client->prenom = $request->prenom;
        $client->nom = $request->nom;
        $client->raisonSociale = $request->raisonSociale;
        $client->tele = $request->tele;
        $client->adresse = $request->adresse;
        $client->complementAdresse = $request->complementAdresse;
        $client->codePostal = $request->codePostal;
        $client->email = $request->email;
        $client->ville = $request->ville;

        $client->save();
        return redirect('/listeClients')->with('message', 'Client Modifi?? avec succ??s! ');
    }

    function storeAssuranceP(Request $request){
            
        
        $request->validate([ 'client_id' => 'required',
                            'type'=> 'required', 
                            'origine' => 'required', 
                            'user_id' => 'required',
                            'agent_id'=> 'required',
                            'projetPrioritaire' => 'required',
                            'statut' => 'required',
                            'dateSouscription' => 'required',
                            'dateEffet' => 'required',
                            'commentaire' => 'required',
                            'typeA'=>'required',
                            'civilite'=>'required',
                            'nom'=>'required',
                            'prenom'=>'required',
                            'dateNaissance'=>'required',
                            'regime'=>'required'
                            ]);
                            
        $projetAP= new AssurancePersonne();
       
        $projetAP->user_id = $request->user_id;
        $projetAP->agent_id = $request->agent_id;
        $projetAP->client_id = $request->client_id;
        $projetAP->type = $request->type;
        $projetAP->origine = $request->origine;
        $projetAP->projetPrioritaire = $request->projetPrioritaire;
        $projetAP->statut = $request->statut;
        $projetAP->dateSouscription = $request->dateSouscription;
        $projetAP->dateEffet = $request->dateEffet;
        $projetAP->commentaire = $request->commentaire;

        $projetAP->save();
        $assuranceP = $projetAP->id;
        $type = $request->typeA;
        $civilite = $request->civilite;
        $nom = $request->nom;
        $prenom = $request->prenom;
        $dateN = $request->dateNaissance;
        $regime = $request->regime;

        for($i=0; $i<count($dateN); $i++){

            $data[]  = [
                'assurancePersonne_id' =>$assuranceP,
                 'type' => $type[$i],
                 'civilite' => $civilite[$i],
                 'nom' => $nom[$i],
                 'prenom' => $prenom[$i],
                 'dateNaissance' => $dateN[$i],
                 'regime' => $regime[$i]
            ];
            
            AssurePersonne::insert($data);
           // DB::table('assure_personnes')->insert($data);
           // return $insert;
        }
        return back()->with('message', 'Un nouveau projet assurance personne est cr???? !');
       
    }

    public function deleteProjetAP($id)
    {
        $projetAP = AssurancePersonne::findOrFail($id);
        $assureAP = AssurePersonne::where('assurancePersonne_id', $id);
        $contratAP = ContratPersonne::where('assurancePersonne_id', $id);
        $projetAP->delete();
        $assureAP->delete();
        $contratAP->delete();
        return redirect()->back()->with('message', 'Projet supprim?? avec succ??s !');
    }

    public function  editProjetAP($id)
    {
        $projetAP = AssurancePersonne::find($id);
        $client = Client::all();
        $gestionnaire = User::all()->where ('role', 'Gestionnaire');
        $assure = AssurePersonne::all()->where ('assurancePersonne_id', $projetAP->id);
        return view('edit/editProjetAP', compact('projetAP', 'client', 'gestionnaire', 'assure'));
    }

    public function  updateProjetAP(Request $request, $id)
    {

        $projetAP = AssurancePersonne::find($id);

        $request->validate([ 'client_id' => 'required',
                            'type'=> 'required', 
                            'origine' => 'required', 
                            'user_id' => 'required',
                            'projetPrioritaire' => 'required',
                            'statut' => 'required',
                            'dateSouscription' => 'required',
                            'dateEffet' => 'required',
                            'commentaire' => 'required',
                            'typeA',
                            'civilite',
                            'nom',
                            'prenom',
                            'dateNaissance',
                            'regime'
                            
                            ]);
        
        $projetAP->user_id = $request->user_id;
        $projetAP->client_id = $request->client_id;
        $projetAP->type = $request->type;
        $projetAP->origine = $request->origine;
        $projetAP->projetPrioritaire = $request->projetPrioritaire;
        $projetAP->statut = $request->statut;
        $projetAP->dateSouscription = $request->dateSouscription;
        $projetAP->dateEffet = $request->dateEffet;
        $projetAP->commentaire = $request->commentaire;
                    
        $projetAP->save();
        if(empty($request->typeA)){
            return redirect('listeProjetAP')->with('message', 'Projet Modifi?? avec succ??s! ');
        }
        else{
        $assuranceP = $projetAP->id;
        $type = $request->typeA;
        $civilite = $request->civilite;
        $nom = $request->nom;
        $prenom = $request->prenom;
        $dateN = $request->dateNaissance;
        $regime = $request->regime;

        for($i=0; $i<count($dateN); $i++){

            $data[]  = [
                'assurancePersonne_id' =>$assuranceP,
                 'type' => $type[$i],
                 'civilite' => $civilite[$i],
                 'nom' => $nom[$i],
                 'prenom' => $prenom[$i],
                 'dateNaissance' => $dateN[$i],
                 'regime' => $regime[$i]
            ];
            
            AssurePersonne::insert($data);
        }
        return redirect('listeProjetAP')->with('message', 'Projet Modifi?? avec succ??s! ');
       }
    }
    


    function storeAssuranceA(Request $request){

        
        $request->validate([ 'client_id' => 'required',
                            'type'=> 'required', 
                            'origine' => 'required', 
                            'user_id' => 'required',
                            'agent_id'=> 'required',
                            'projetPrioritaire' => 'required',
                            'statut' => 'required',
                            'dateSouscription' => 'required',
                            'dateEffet' => 'required',
                            'commentaire' => 'required',
                            'typeA' =>'required',
                            'race'=>'required',
                            'nom'=>'required',
                            'dateNaissance'=>'required',
                            'sexe'=>'required'
                            ]);
                            
        $projetAA= new AssuranceAnimal();
        $projetAA->user_id = $request->user_id;
        $projetAA->agent_id = $request->agent_id;
        $projetAA->client_id = $request->client_id;
        $projetAA->type = $request->type;
        $projetAA->origine = $request->origine;
        $projetAA->projetPrioritaire = $request->projetPrioritaire;
        $projetAA->statut = $request->statut;
        $projetAA->dateSouscription = $request->dateSouscription;
        $projetAA->dateEffet = $request->dateEffet;
        $projetAA->commentaire = $request->commentaire;

        $projetAA->save();
        $assuranceA = $projetAA->id;
        $type = $request->typeA;
        $race = $request->race;
        $nom = $request->nom;
        $sexe = $request->sexe;
        $dateN = $request->dateNaissance;
        
        for($i=0; $i<count($dateN); $i++){

            $data[]  = [
                'assuranceAnimal_id' =>$assuranceA,
                 'type' => $type[$i],
                 'race' => $race[$i],
                 'nom' => $nom[$i],
                 'sexe' => $sexe[$i],
                 'dateNaissance' => $dateN[$i],
            ];
            
            
            AssureAnimal::insert($data);
           // DB::table('assure_personnes')->insert($data);
           // return $insert;
        }
        return redirect('/assuranceAnimaux')->with('message', 'Un nouveau projet assurance Animal est cr???? !');
    }

    public function deleteProjetAA($id)
    {
        $projetAA = AssuranceAnimal::findOrFail($id);
        $assureAA = AssureAnimal::where('assuranceAnimal_id', $id);
        $contratAA = ContratAnimal::where('assuranceAnimal_id', $id);
        $projetAA->delete();
        $assureAA->delete();
        $contratAA->delete();
        return redirect()->back()->with('message', 'Projet supprim?? avec succ??s !');
    }


    public function  editProjetAA($id)
    {
        $projetAA = AssuranceAnimal::find($id);
        $client = Client::all();
        $gestionnaire = User::all()->where ('role', 'Gestionnaire');
        $assure = AssureAnimal::all()->where ('assuranceAnimal_id', $projetAA->id);
        return view('edit/editProjetAA', compact('projetAA', 'client', 'gestionnaire', 'assure'));
    }

    public function  updateProjetAA(Request $request, $id)
    {

        $projetAA = AssuranceAnimal::find($id);

        $request->validate([ 'client_id' => 'required',
                            'type'=> 'required', 
                            'origine' => 'required', 
                            'user_id' => 'required',
                            'projetPrioritaire' => 'required',
                            'statut' => 'required',
                            'dateSouscription' => 'required',
                            'dateEffet' => 'required',
                            'commentaire' => 'required',
                            'typeA',
                            'race',
                            'nom',
                            'dateNaissance',
                            'sexe'
                            ]);
        
        $projetAA->user_id = $request->user_id;
        $projetAA->client_id = $request->client_id;
        $projetAA->type = $request->type;
        $projetAA->origine = $request->origine;
        $projetAA->projetPrioritaire = $request->projetPrioritaire;
        $projetAA->statut = $request->statut;
        $projetAA->dateSouscription = $request->dateSouscription;
        $projetAA->dateEffet = $request->dateEffet;
        $projetAA->commentaire = $request->commentaire;
                    
        $projetAA->save();

        if(empty($request->typeA)){
            return redirect('/listeProjetAA')->with('message', 'Projet Modifi?? avec succ??s! ');
        }
        else{
        $assuranceA = $projetAA->id;
        $type = $request->typeA;
        $race = $request->race;
        $nom = $request->nom;
        $sexe = $request->sexe;
        $dateN = $request->dateNaissance;
        
        for($i=0; $i<count($dateN); $i++){

            $data[]  = [
                'assuranceAnimal_id' =>$assuranceA,
                 'type' => $type[$i],
                 'race' => $race[$i],
                 'nom' => $nom[$i],
                 'sexe' => $sexe[$i],
                 'dateNaissance' => $dateN[$i],
            ];
            
            
            AssureAnimal::insert($data);
           // DB::table('assure_personnes')->insert($data);
           // return $insert;
        }

        return redirect('/listeProjetAA')->with('message', 'Projet Modifi?? avec succ??s! ');
    }
}
    
    function storeE(Request $request){

        
        $request->validate([ 'client_id' => 'required',
                            'type'=> 'required', 
                            'origine' => 'required', 
                            'user_id' => 'required',
                            'agent_id'=> 'required',
                            'projetPrioritaire' => 'required',
                            'statut' => 'required',
                            'dateSouscription' => 'required',
                            'dateEffet' => 'required',
                            'commentaire' => 'required'
                            ]);
        $projetE= new Emprunteur();
        $projetE->user_id = $request->user_id;
        $projetE->agent_id = $request->agent_id;
        $projetE->client_id = $request->client_id;
        $projetE->type = $request->type;
        $projetE->origine = $request->origine;
        $projetE->projetPrioritaire = $request->projetPrioritaire;
        $projetE->statut = $request->statut;
        $projetE->dateSouscription = $request->dateSouscription;
        $projetE->dateEffet = $request->dateEffet;
        $projetE->commentaire = $request->commentaire;

        $projetE->save();
        return redirect('/emprunteur')->with('message', 'Un nouveau projet emprunteur est cr???? !');
    }

    public function deleteProjetE($id)
    {
        $projetE = Emprunteur::findOrFail($id);
        $contratE = ContratEmprunteur::where('assuranceEmprunteur_id', $id);
        $projetE->delete();
        $contratE->delete();
        return redirect()->back()->with('message', 'Projet supprim?? avec succ??s !');
    }

    public function  editProjetE($id)
    {
        $projetE = Emprunteur::find($id);
        $client = Client::all();
        $gestionnaire = User::all()->where ('role', 'Gestionnaire');
        return view('edit/editProjetE', compact('projetE', 'client', 'gestionnaire'));
    }

    public function  updateProjetE(Request $request, $id)
    {

        $projetE = Emprunteur::find($id);

        $request->validate([ 'client_id' => 'required',
                            'type'=> 'required', 
                            'origine' => 'required', 
                            'user_id' => 'required',
                            'projetPrioritaire' => 'required',
                            'statut' => 'required',
                            'dateSouscription' => 'required',
                            'dateEffet' => 'required',
                            'commentaire' => 'required'
                            ]);
        
        $projetE->user_id = $request->user_id;
        $projetE->client_id = $request->client_id;
        $projetE->type = $request->type;
        $projetE->origine = $request->origine;
        $projetE->projetPrioritaire = $request->projetPrioritaire;
        $projetE->statut = $request->statut;
        $projetE->dateSouscription = $request->dateSouscription;
        $projetE->dateEffet = $request->dateEffet;
        $projetE->commentaire = $request->commentaire;
                    
        $projetE->save();
        return redirect('/listeProjetE')->with('message', 'Projet Modifi?? avec succ??s! ');
    }


    function storeContratAP(Request $request, $id){

        
        $projetAP = AssurancePersonne::find($id);

        $request->validate(['client_id'=> 'required', 
                            'N_Version' => 'required',
                            'N_Contrat' => 'required',
                            'compagnie' => 'required',
                            'produit' => 'required',
                            'formule' => 'required',
                            'niveau_Garantie' => 'required',
                            'dateCreation' => 'required',
                            'debutSignature' => 'required',
                            'debutEffet' => 'required',
                            'dateEcheance' => 'required',
                            'Demande_Resiliation' => 'required',
                            'finContrat' => 'required',
                            'Prime_Brute_Mensuelle' => 'required',
                            'Prime_Nette_Mensuelle' => 'required',
                            'Prime_Brute_Anuelle' => 'required',
                            'Prime_Ntte_Anuelle' => 'required',
                            'Frais_Honoraires' => 'required',
                            'Nbr_Mois_Gratuits_Annee1' => 'required',
                            'Nbr_Mois_Gratuits_Annee2' => 'required',
                            'Nbr_Mois_Gratuits_Annee3' => 'required',
                            'Fractionnement' => 'required',
                            'Type_Commi' => 'required',
                            'Commi_Annee1' => 'required',
                            'Commi_Annee_Suivantes' => 'required',
                            'commentaire' => 'required',
                            'situation',
                            'permis' ,
                            'carteG' ,
                            'riptype1',
                            'riptype2',
                            'riptype3',
                            'releverInfo' ,
                            'copie' ,
                            'doc' ,
                            'carte_vitale' ,
                            'cintype2',
                            'cintype3',
                            'attestation_droit' ,
                            'carte_mutuelle' ,
                            'cp_cpa' 
                        ]);


        $contratAP = new ContratPersonne();
        $contratAP->client_id = $request->client_id;
        $contratAP->assurancePersonne_id =  $projetAP->id;
        $contratAP->N_Version = $request->N_Version;
        $contratAP->gestionnaire_id = $projetAP->user_id;
        $contratAP->agent_id = $projetAP->agent_id;
        $contratAP->N_Contrat = $request->N_Contrat;
        $contratAP->compagnie = $request->compagnie;
        $contratAP->produit = $request->produit;
        $contratAP->formule = $request->formule;
        $contratAP->niveau_Garantie = $request->niveau_Garantie;
        $contratAP->dateCreation = $request->dateCreation;
        $contratAP->debutSignature = $request->debutSignature;
        $contratAP->debutEffet = $request->debutEffet;
        $contratAP->dateEcheance = $request->dateEcheance;
        $contratAP->Demande_Resiliation = $request->Demande_Resiliation;
        $contratAP->finContrat = $request->finContrat;
        $contratAP->Prime_Brute_Mensuelle = $request->Prime_Brute_Mensuelle;
        $contratAP->Prime_Nette_Mensuelle = $request->Prime_Nette_Mensuelle;
        $contratAP->Prime_Brute_Anuelle = $request->Prime_Brute_Anuelle;
        $contratAP->Prime_Ntte_Anuelle = $request->Prime_Ntte_Anuelle;
        $contratAP->Frais_Honoraires = $request->Frais_Honoraires;
        $contratAP->Nbr_Mois_Gratuits_Annee1 = $request->Nbr_Mois_Gratuits_Annee1;
        $contratAP->Nbr_Mois_Gratuits_Annee2 = $request->Nbr_Mois_Gratuits_Annee2;
        $contratAP->Nbr_Mois_Gratuits_Annee3 = $request->Nbr_Mois_Gratuits_Annee3;
        $contratAP->Fractionnement = $request->Fractionnement;
        $contratAP->Type_Commi = $request->Type_Commi;
        $contratAP->Commi_Annee1 = $request->Commi_Annee1;
        $contratAP->Commi_Annee_Suivantes = $request->Commi_Annee_Suivantes;
        $contratAP->commentaire = $request->commentaire;
        $contratAP->save();

        $fileModel = new File;
        
        if($request->hasFile('riptype1')) 
         {
            $fileName3 = time().'_'.$request->riptype1->getClientOriginalName();
            $filePath3 = $request->file('riptype1')->storeAs('uploads', $fileName3, 'public');
            $fileModel->RIB_name = time().'_'.$request->riptype1->getClientOriginalName();
            $fileModel->RIB_path = '/storage/' . $filePath3;
        }
        if($request->hasFile('riptype2')) 
         {
            $fileName12 = time().'_'.$request->riptype2->getClientOriginalName();
            $filePath12 = $request->file('riptype2')->storeAs('uploads', $fileName12, 'public');
            $fileModel->RIB_name = time().'_'.$request->riptype2->getClientOriginalName();
            $fileModel->RIB_path = '/storage/' . $filePath12;
        }
        if($request->hasFile('riptype3')) 
         {
            $fileName13 = time().'_'.$request->riptype3->getClientOriginalName();
            $filePath13 = $request->file('riptype3')->storeAs('uploads', $fileName13, 'public');
            $fileModel->RIB_name = time().'_'.$request->riptype3->getClientOriginalName();
            $fileModel->RIB_path = '/storage/' . $filePath13;
        }
        
        if($request->hasFile('carte_vitale')) 
         {
            $fileName7 = time().'_'.$request->carte_vitale->getClientOriginalName();
            $filePath7 = $request->file('carte_vitale')->storeAs('uploads', $fileName7, 'public');
            $fileModel->carte_vitale_name = time().'_'.$request->carte_vitale->getClientOriginalName();
            $fileModel->carte_vitale_path = '/storage/' . $filePath7;
        }  
        if($request->hasFile('cintype2')) 
         {
            $fileName8 = time().'_'.$request->cintype2->getClientOriginalName();
            $filePath8 = $request->file('cintype2')->storeAs('uploads', $fileName8, 'public');
            $fileModel->CIN_name = time().'_'.$request->cintype2->getClientOriginalName();
            $fileModel->CIN_path = '/storage/' . $filePath8;
        }  

        if($request->hasFile('cintype3')) 
         {
            $fileName14 = time().'_'.$request->cintype3->getClientOriginalName();
            $filePath14 = $request->file('cintype3')->storeAs('uploads', $fileName14, 'public');
            $fileModel->CIN_name = time().'_'.$request->cintype3->getClientOriginalName();
            $fileModel->CIN_path = '/storage/' . $filePath14;
        }  
        if($request->hasFile('attestation_droit')) 
         {
            $fileName9 = time().'_'.$request->attestation_droit->getClientOriginalName();
            $filePath9 = $request->file('attestation_droit')->storeAs('uploads', $fileName9, 'public');
            $fileModel->attestation_droit_name = time().'_'.$request->attestation_droit->getClientOriginalName();
            $fileModel->attestation_droit_path = '/storage/' . $filePath9;
        } 


        if($request->hasFile('carte_mutuelle')) 
         {
            $filaName10 = time().'_'.$request->carte_mutuelle->getClientOriginalName();
            $filePath10 = $request->file('carte_mutuelle')->storeAs('uploads', $filaName10, 'public');
            $fileModel->carte_mutuelle_name = time().'_'.$request->carte_mutuelle->getClientOriginalName();
            $fileModel->carte_mutuelle_path = '/storage/' . $filePath10;
        }   

        if($request->hasFile('cp_cpa')) 
         {
            $fileName11 = time().'_'.$request->cp_cpa->getClientOriginalName();
            $filePath11 = $request->file('cp_cpa')->storeAs('uploads', $fileName11, 'public');
            $fileModel->CP_CPA_name = time().'_'.$request->cp_cpa->getClientOriginalName();
            $fileModel->CP_CPA_path = '/storage/' . $filePath11;
        }  

        if($projetAP->type == "Assurance Auto" || $projetAP->type == "Assurance Moto"){
            $fileModel->situation = $request->situation; 
        }
       
        if($request->hasFile('permis')) 
        {
                $fileName1 = time().'_'.$request->permis->getClientOriginalName();
                $filePath1 = $request->file('permis')->storeAs('uploads', $fileName1, 'public');
                $fileModel->permis_conduire_name = time().'_'.$request->permis->getClientOriginalName();
                $fileModel->permis_conduire_path = '/storage/' . $filePath1;
               
        } 
            
        if($request->hasFile('carteG')) 
        {
                $fileName2 = time().'_'.$request->carteG->getClientOriginalName();
                $filePath2 = $request->file('carteG')->storeAs('uploads', $fileName2, 'public');
                $fileModel->carte_grise_name = time().'_'.$request->carteG->getClientOriginalName();
                $fileModel->carte_grise_path = '/storage/' . $filePath2;
        } 

        if($request->hasFile('releverInfo')) 
        {
                $fileName4 = time().'_'.$request->releverInfo->getClientOriginalName();
                $filePath4 = $request->file('releverInfo')->storeAs('uploads', $fileName4, 'public');
                $fileModel->relever_information_name = time().'_'.$request->releverInfo->getClientOriginalName();
                $fileModel->relever_information_path = '/storage/' . $filePath4;
         } 

        if($request->hasFile('doc')) 
        {
                $fileName5 = time().'_'.$request->doc->getClientOriginalName();
                $filePath5 = $request->file('doc')->storeAs('uploads', $fileName5, 'public');
                $fileModel->document_3F_name = time().'_'.$request->doc->getClientOriginalName();
                $fileModel->document_3F_path = '/storage/' . $filePath5;
        } 

        if($request->hasFile('copie')) 
        {
                $fileName6 = time().'_'.$request->copie->getClientOriginalName();
                $filePath6 = $request->file('copie')->storeAs('uploads', $fileName6, 'public');
                $fileModel->copie_jugement_name = time().'_'.$request->copie->getClientOriginalName();
                $fileModel->copie_jugement_path = '/storage/' . $filePath6;
        }
    
            $fileModel->assurancePersonne_id = $projetAP->id;
            $fileModel->save();
        
        
        return redirect()->back()->with('message', 'Nouveau Contrat ins??r?? avec succ??s !');
    }


    public function deleteContratAP($id)
    {
        $contratAP = ContratPersonne::find($id);
        $facture = FacturePersonne::where('contratPersonne_id', $id);
        $facture->delete();
        $contratAP->delete();
        return redirect()->back()->with('message', 'Contrat supprim?? avec succ??s !');
    }

    

    function storeContratAA(Request $request, $id){

        $projetAA = AssuranceAnimal::find($id);

        $request->validate(['client_id'=> 'required', 
                            'N_Version' => 'required',
                            'N_Contrat' => 'required',
                            'compagnie' => 'required',
                            'produit' => 'required',
                            'formule' => 'required',
                            'niveau_Garantie' => 'required',
                            'dateCreation' => 'required',
                            'debutSignature' => 'required',
                            'debutEffet' => 'required',
                            'dateEcheance' => 'required',
                            'Demande_Resiliation' => 'required',
                            'finContrat' => 'required',
                            'Prime_Brute_Mensuelle' => 'required',
                            'Prime_Nette_Mensuelle' => 'required',
                            'Prime_Brute_Anuelle' => 'required',
                            'Prime_Ntte_Anuelle' => 'required',
                            'Frais_Honoraires' => 'required',
                            'Nbr_Mois_Gratuits_Annee1' => 'required',
                            'Nbr_Mois_Gratuits_Annee2' => 'required',
                            'Nbr_Mois_Gratuits_Annee3' => 'required',
                            'Fractionnement' => 'required',
                            'Type_Commi' => 'required',
                            'Commi_Annee1' => 'required',
                            'Commi_Annee_Suivantes' => 'required',
                            'commentaire' => 'required',
                        ]);

        $contratAA = new ContratAnimal();
        $contratAA->client_id = $request->client_id;
        $contratAA->assuranceAnimal_id =  $projetAA->id;
        $contratAA->gestionnaire_id = $projetAA->user_id;
        $contratAA->agent_id = $projetAA->agent_id;
        $contratAA->N_Version = $request->N_Version;
        $contratAA->N_Contrat = $request->N_Contrat;
        $contratAA->compagnie = $request->compagnie;
        $contratAA->produit = $request->produit;
        $contratAA->formule = $request->formule;
        $contratAA->niveau_Garantie = $request->niveau_Garantie;
        $contratAA->dateCreation = $request->dateCreation;
        $contratAA->debutSignature = $request->debutSignature;
        $contratAA->debutEffet = $request->debutEffet;
        $contratAA->dateEcheance = $request->dateEcheance;
        $contratAA->Demande_Resiliation = $request->Demande_Resiliation;
        $contratAA->finContrat = $request->finContrat;
        $contratAA->Prime_Brute_Mensuelle = $request->Prime_Brute_Mensuelle;
        $contratAA->Prime_Nette_Mensuelle = $request->Prime_Nette_Mensuelle;
        $contratAA->Prime_Brute_Anuelle = $request->Prime_Brute_Anuelle;
        $contratAA->Prime_Ntte_Anuelle = $request->Prime_Ntte_Anuelle;
        $contratAA->Frais_Honoraires = $request->Frais_Honoraires;
        $contratAA->Nbr_Mois_Gratuits_Annee1 = $request->Nbr_Mois_Gratuits_Annee1;
        $contratAA->Nbr_Mois_Gratuits_Annee2 = $request->Nbr_Mois_Gratuits_Annee2;
        $contratAA->Nbr_Mois_Gratuits_Annee3 = $request->Nbr_Mois_Gratuits_Annee3;
        $contratAA->Fractionnement = $request->Fractionnement;
        $contratAA->Type_Commi = $request->Type_Commi;
        $contratAA->Commi_Annee1 = $request->Commi_Annee1;
        $contratAA->Commi_Annee_Suivantes = $request->Commi_Annee_Suivantes;
        $contratAA->commentaire = $request->commentaire;

        $contratAA->save();
        return redirect()->back()->with('message', 'Nouveau Contrat ins??r?? avec succ??s !');
    }

    public function deleteContratAA($id)
    {
        $contratAA = ContratAnimal::find($id);
        $facture = FactureAnimal::where('contratAnimal_id', $id);
        $facture->delete();
        $contratAA->delete();
        return redirect()->back()->with('message', 'Contrat supprim?? avec succ??s !');
    }

    function storeContratE(Request $request, $id){

        $projetE = Emprunteur::find($id);

        $request->validate(['client_id'=> 'required', 
                            'N_Version' => 'required',
                            'N_Contrat' => 'required',
                            'compagnie' => 'required',
                            'produit' => 'required',
                            'formule' => 'required',
                            'niveau_Garantie' => 'required',
                            'dateCreation' => 'required',
                            'debutSignature' => 'required',
                            'debutEffet' => 'required',
                            'dateEcheance' => 'required',
                            'Demande_Resiliation' => 'required',
                            'finContrat' => 'required',
                            'Prime_Brute_Mensuelle' => 'required',
                            'Prime_Nette_Mensuelle' => 'required',
                            'Prime_Brute_Anuelle' => 'required',
                            'Prime_Ntte_Anuelle' => 'required',
                            'Frais_Honoraires' => 'required',
                            'Nbr_Mois_Gratuits_Annee1' => 'required',
                            'Nbr_Mois_Gratuits_Annee2' => 'required',
                            'Nbr_Mois_Gratuits_Annee3' => 'required',
                            'Fractionnement' => 'required',
                            'Type_Commi' => 'required',
                            'Commi_Annee1' => 'required',
                            'Commi_Annee_Suivantes' => 'required',
                            'commentaire' => 'required',
                        ]);

        $contratE = new ContratEmprunteur();
        $contratE->client_id = $request->client_id;
        $contratE->emprunteur_id =  $projetE->id;
        $contratE->gestionnaire_id = $projetE->user_id;
        $contratE->agent_id = $projetE->agent_id;
        $contratE->N_Version = $request->N_Version;
        $contratE->N_Contrat = $request->N_Contrat;
        $contratE->compagnie = $request->compagnie;
        $contratE->produit = $request->produit;
        $contratE->formule = $request->formule;
        $contratE->niveau_Garantie = $request->niveau_Garantie;
        $contratE->dateCreation = $request->dateCreation;
        $contratE->debutSignature = $request->debutSignature;
        $contratE->debutEffet = $request->debutEffet;
        $contratE->dateEcheance = $request->dateEcheance;
        $contratE->Demande_Resiliation = $request->Demande_Resiliation;
        $contratE->finContrat = $request->finContrat;
        $contratE->Prime_Brute_Mensuelle = $request->Prime_Brute_Mensuelle;
        $contratE->Prime_Nette_Mensuelle = $request->Prime_Nette_Mensuelle;
        $contratE->Prime_Brute_Anuelle = $request->Prime_Brute_Anuelle;
        $contratE->Prime_Ntte_Anuelle = $request->Prime_Ntte_Anuelle;
        $contratE->Frais_Honoraires = $request->Frais_Honoraires;
        $contratE->Nbr_Mois_Gratuits_Annee1 = $request->Nbr_Mois_Gratuits_Annee1;
        $contratE->Nbr_Mois_Gratuits_Annee2 = $request->Nbr_Mois_Gratuits_Annee2;
        $contratE->Nbr_Mois_Gratuits_Annee3 = $request->Nbr_Mois_Gratuits_Annee3;
        $contratE->Fractionnement = $request->Fractionnement;
        $contratE->Type_Commi = $request->Type_Commi;
        $contratE->Commi_Annee1 = $request->Commi_Annee1;
        $contratE->Commi_Annee_Suivantes = $request->Commi_Annee_Suivantes;
        $contratE->commentaire = $request->commentaire;

        $contratE->save();
        return redirect()->back()->with('message', 'Nouveau Contrat ins??r?? avec succ??s !');
    }

    public function deleteContratE($id)
    {
        $contratE = ContratEmprunteur::find($id);
        $facture = FactureEmprunteur::where('contratEmprunteur_id', $id);
        $facture->delete();
        $contratAE->delete();
        return redirect()->back()->with('message', 'Contrat supprim?? avec succ??s !');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('/profile', compact('user'));
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
        return back()->with('message', 'Votre profile est modifi?? !');
    }


    public function singleContratAP($id){
            
        $contrat = ContratPersonne::find($id);
        
        return view('singleContratAP', compact('contrat'));
    }

    public function telechargerContratAP(request $request){
        
        $contrat = ContratPersonne::find($request->id);
        $pdf = PDF::loadView('singleContratAP',compact('contrat'));
        return $pdf->download($contrat->N_Contrat.'.pdf');

    }
    public function singleContratAA($id){
            
        $contrat = ContratAnimal::find($id);
        return view('singleContratAA', compact('contrat'));
    }

    public function telechargerContratAA(request $request){
        
        $contrat = ContratAnimal::find($request->id);
        $pdf = PDF::loadView('singleContratAA',compact('contrat'));
        return $pdf->download($contrat->N_Contrat.'.pdf');

    }
    public function singleContratE($id){
            
        $contrat = ContratEmprunteur::find($id);
        return view('singleContratE', compact('contrat'));
    }

    public function telechargerContratE(request $request){
        
        $contrat = ContratEmprunteur::find($request->id);
        $pdf = PDF::loadView('singleContratE',compact('contrat'));
        return $pdf->download($contrat->N_Contrat.'.pdf');

    }

    // public function deleteAssureAP($id)
    // {
    //     $projetAP = AssurancePersonne::findOrFail($id);

    //     $assure = AssurePersonne::where('assurancePersonne_id', $id);
    //     $assure->delete();
    //     return redirect()->back();
    // }
    // public function deleteAssureAA($id)
    // {
    //     $projetAA = AssuranceAnimal::findOrFail($id);
        
    //     $assure = AssureAnimal::where('assuranceAnimal_id', $id);
    //     $assure->delete();
    //     return redirect()->back();
    // }



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
        if(date('Y-m-d', strtotime($request->dateEvent)) >= Carbon::now('UTC')->addHour('1')->format('Y-m-d')){
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
        return view('calendrier', compact('userAuth'));
    }

    
    public function deleteCalendrier($id){
        $event = Calendrier::find($id);
        $event->delete();
        return redirect()->back()->with('message', 'Evenement supprim?? avec succ??s !');
    }

}
