<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Folder;
use App\Models\ContratAnimal;
use App\Models\ContratPersonne;
use App\Models\ContratEmprunteur;
use App\Models\AssuranceAnimal;
use App\Models\AssurancePersonne;
use App\Models\Emprunteur;
use App\Models\AssurePersonne;
use App\Models\AssureAnimal;
use App\Models\Notif;
use App\Models\Calendrier;
use App\Models\Facture;
use App\Models\FactureAnimal;
use App\Models\FacturePersonne;
use App\Models\FactureEmprunteur;
use App\Models\Client;
use Carbon\Carbon;
use App\Models\File;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Notifications\EmailNotification;

use PDF;
use App\Notifications\WelcomeEmailNotification;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function ajouterAgent(){
       return view('Admin/ajouterAgent');
   }

   public function ajouterGestionnaire(){
    return view('Admin/ajouterGestionnaire');
   }
  
   
   public function index(){

        $folders = Folder::orderBy('updated_at', 'DESC')->take(4)->get();
        $gest = User::all()->where('role', 'Gestionnaire')->count();
        $agent = User::all()->where('role', 'Agent')->count();
        $client = Client::all()->count();
        $clientweek = Client::where('created_at', '>', Carbon::now()->startOfWeek())->where('created_at', '<', Carbon::now()->endOfWeek())->count();
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
        $contrats = DB::select( "SELECT (SELECT COUNT(*) FROM contrat_animals) as contrat_animals, (SELECT COUNT(*) FROM contrat_emprunteurs) as contrat_emprunteurs, (SELECT COUNT(*) FROM contrat_personnes) as contrat_personnes");
        $contrats = collect($contrats)->first();

        $facturs = Facture::all();

        //  dd($contrats);
        return view('Admin/index', compact('gest', 'agent', 'client', 'clientweek', 'date', 'data1', 'months', 'monthCount', 'folders', 'contrats', 'facturs'));
    }
   public function listeAgents(){

        $agent = User::all()->where('role', 'Agent');
    return view('Admin/listeAgents',compact('agent'));
   }
   
   public function listeGestionnaire(){

    $gestionnaire = User::all()->where('role', 'Gestionnaire');
    return view('Admin/listeGestionnaire', compact('gestionnaire'));
   }

   public function listeContratAA(){

    $contratAA = ContratAnimal::all();
    return view('Admin/listeContratAA', compact('contratAA'));

   }

   public function listeContratAP(){
    $contratAP = ContratPersonne::all();
    return view('Admin/listeContratAP', compact('contratAP'));
   }

   public function listeContratE(){
    $contratE = ContratEmprunteur::all();
    return view('Admin/listeContratE', compact('contratE'));
   }
   public function listeProjetAA(){
    $projetAA = AssuranceAnimal::all();
    return view('Admin/listeProjetAA', compact('projetAA'));
   }
   public function listeProjetAP(){
    $projetAP = AssurancePersonne::all();
    return view('Admin/listeProjetAP', compact('projetAP'));
   }
   public function listeProjetE(){
    $projetE = Emprunteur::all();
    return view('Admin/listeProjetE', compact('projetE'));
   }
   public function notification(){
    $user = Auth::user();
    $event = Calendrier::all()->where('user_id', $user->id);
    return view('Admin/notification', compact('user', 'event'));
   }
  

    function storeAgent(Request $request){
        
        $request->validate(['nom'=> 'required', 
                            'prenom' => 'required', 
                            'telephone' => 'required',
                            'adresse' => 'required',
                            'role' => 'required',
                            'email' => 'required|email|unique:users',
                            'password' => 'required']);
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->storepassword = $request->password;


        $user->save();
        $user->notify(new WelcomeEmailNotification($user));
        return redirect('Admin/ajouterAgent')->with('message', 'Agent inséré avec succès !');
        
    }

//     public function delete($id)
//    {
//        //$agent = User::where('id', $id)->delete();
//         $agent = User::findOrFail($id);
//         $agent->delete();
//         return redirect('/Admin/listeAgents')->with('success', 'Agent Data is successfully deleted');
//    }
public function deleteAgent($id)
{
    $agent = User::find($id);
    $agent->delete();
    return redirect()->back()->with('message', 'Agent supprimé avec succès !');
}

public function deleteGestionnaire($id)
{
    $gestionnaire = User::find($id);
    $gestionnaire->delete();
    return redirect()->back()->with('message', 'Gestionnaire supprimé avec succès !');
}



    function storeGestionnaire(Request $request){
        
         $request->validate(['nom'=> 'required', 
                            'prenom' => 'required', 
                            'telephone' => 'required',
                            'adresse' => 'required',
                            'role' => 'required',
                            'email' => 'required|email|unique:users',
                            'password' => 'required']);
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->adresse = $request->adresse;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->storepassword = $request->password;

        $user->save();
        $user->notify(new WelcomeEmailNotification($user));
        return redirect('Admin/ajouterGestionnaire')->with('message', 'Gestionnaire inséré avec succès !');
        
    }

    public function editAgent($id)
    {
        $agent = User::find($id);
        return view('Admin/edit/editAgent', compact('agent'));
    }

    public function updateAgent(Request $request, $id)
    {

        $agent = User::find($id);

        $request->validate([
                             'nom'=> 'required', 
                            'prenom' => 'required', 
                            'telephone' => 'required',
                            'adresse' => 'required',
                            'role' => 'required',
                            'email' => 'required',
                            'password' => 'required']);
        $agent->nom = $request->nom;
        $agent->prenom = $request->prenom;
        $agent->telephone = $request->telephone;
        $agent->adresse = $request->adresse;
        $agent->role = $request->role;
        $agent->email = $request->email;
        $agent->password = Hash::make($request->password);
        $agent->storepassword = $request->password;

        $agent->save();
        $agent->notify(new WelcomeEmailNotification($agent));
        return redirect('/Admin/listeAgents')->with('message', 'Agent Modifié avec succès! ');
    }

    public function editGestionnaire($id)
    {
        $gestionnaire = User::find($id);
        return view('Admin/edit/editGestionnaire', compact('gestionnaire'));
    }

    public function updateGestionnaire(Request $request, $id)
    {

        $gestionnaire = User::find($id);

        $request->validate([
                             'nom'=> 'required', 
                            'prenom' => 'required', 
                            'telephone' => 'required',
                            'adresse' => 'required',
                            'role' => 'required',
                            'email' => 'required',
                            'password' => 'required']);
        $gestionnaire->nom = $request->nom;
        $gestionnaire->prenom = $request->prenom;
        $gestionnaire->telephone = $request->telephone;
        $gestionnaire->adresse = $request->adresse;
        $gestionnaire->role = $request->role;
        $gestionnaire->email = $request->email;
        $gestionnaire->password = Hash::make($request->password);
        
        $gestionnaire->storepassword = $request->password;

        $gestionnaire->save();
        $gestionnaire->notify(new WelcomeEmailNotification($gestionnaire));
        return redirect('/Admin/listeGestionnaire')->with('message', 'Gestionnaire Modifié avec succès! ');
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
        if(date('Y-m-d', strtotime($request->dateEvent))  >= Carbon::now('UTC')->addHour('1')->format('Y-m-d')){
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
        return view('Admin/calendrier', compact('userAuth'));
    }

    public function deleteCalendrier($id){
        $event = Calendrier::find($id);
        $event->delete();
        return redirect()->back()->with('message', 'Evenement supprimé avec succès !');
    }

    public function edit(User $user)
    {   
        $user = Auth::user();
        return view('/Admin/profile', compact('user'));
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




    public function ajouter()
    {
        return view('Admin/ajouter');
    }
    public function listeClients()
    {
        $client = Client::all();
        return view('Admin/listeClients', compact('client'));
    }
    
    public function contacterClients()
    {
        $client = Client::all();
        return view('Admin/contacterClients', compact('client'));
    }

    public function assurancePersonne()
    {
        $gestionnaire = User::all()->where('role','Gestionnaire');
        $client = Client::all();
        return view('Admin/assurancePersonne', compact('client', 'gestionnaire'));
    }

    public function assuranceAnimaux()
    {
        $gestionnaire = User::all()->where('role','Gestionnaire');
        $client = Client::all();
        return view('Admin/assuranceAnimaux', compact('client', 'gestionnaire'));
    }
    public function emprunteur()
    {
        $gestionnaire = User::all()->where('role','Gestionnaire');
        $client = Client::all();
        return view('Admin/emprunteur' , compact('client', 'gestionnaire'));
    }

    public function findProjetAP($id)
    {
        $projetAP = AssurancePersonne::find($id);
        $assure = AssurePersonne::all()->where('assurancePersonne_id', $projetAP->id);
        if(empty(ContratPersonne::count())){
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('Admin/AjouterContratsAP', compact('projetAP', 'assure', 'numContrat'));
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
            return view('Admin/AjouterContratsAP', compact('projetAP', 'assure', 'numContrat'));
        }
        else{
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('Admin/AjouterContratsAP', compact('projetAP', 'assure', 'numContrat'));
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
            return view('Admin/AjouterContratsAA', compact('projetAA', 'assure', 'numContrat'));
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
            return view('Admin/AjouterContratsAA', compact('projetAA', 'assure', 'numContrat'));
        }
        else{
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('Admin/AjouterContratsAA', compact('projetAA', 'assure', 'numContrat'));
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
            return view('Admin/AjouterContratsE', compact('projetE', 'numContrat'));
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
            return view('Admin/AjouterContratsE', compact('projetE', 'numContrat'));
        }
        else{
            $numContrat ='A';
            $numContrat.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numContrat.='00001';
            return view('Admin/AjouterContratsE', compact('projetE','numContrat'));
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
        return redirect('Admin/ajouter')->with('message', 'Client inséré avec succès !');
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
        return redirect()->back()->with('message', 'Client supprimé avec succès !');
    }

    public function editClient($id)
    {
        $client = Client::find($id);
        return view('Admin/edit/editClient', compact('client'));
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
        return redirect('Admin/listeClients')->with('message', 'Client Modifié avec succès! ');
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
        return back()->with('message', 'Un nouveau projet assurance personne est créé !');
       
    }

    public function deleteProjetAP($id)
    {
        $projetAP = AssurancePersonne::findOrFail($id);
        $assureAP = AssurePersonne::where('assurancePersonne_id', $id);
        $contratAP = ContratPersonne::where('assurancePersonne_id', $id);
        $projetAP->delete();
        $assureAP->delete();
        $contratAP->delete();
        return redirect()->back()->with('message', 'Projet supprimé avec succès !');
    }

    public function  editProjetAP($id)
    {
        $projetAP = AssurancePersonne::find($id);
        $client = Client::all();
        $gestionnaire = User::all()->where ('role', 'Gestionnaire');
        $assure = AssurePersonne::all()->where ('assurancePersonne_id', $projetAP->id);
        return view('Admin/edit/editProjetAP', compact('projetAP', 'client', 'gestionnaire', 'assure'));
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
            return redirect('Admin/listeProjetAP')->with('message', 'Projet Modifié avec succès! ');
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
        return redirect('Admin/listeProjetAP')->with('message', 'Projet Modifié avec succès! ');
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
        return redirect('/Admin/assuranceAnimaux')->with('message', 'Un nouveau projet assurance Animal est créé !');
    }

    public function deleteProjetAA($id)
    {
        $projetAA = AssuranceAnimal::findOrFail($id);
        $assureAA = AssureAnimal::where('assuranceAnimal_id', $id);
        $contratAA = ContratAnimal::where('assuranceAnimal_id', $id);
        $projetAA->delete();
        $assureAA->delete();
        $contratAA->delete();
        return redirect()->back()->with('message', 'Projet supprimé avec succès !');
    }


    public function  editProjetAA($id)
    {
        $projetAA = AssuranceAnimal::find($id);
        $client = Client::all();
        $gestionnaire = User::all()->where ('role', 'Gestionnaire');
        $assure = AssureAnimal::all()->where ('assuranceAnimal_id', $projetAA->id);
        return view('Admin/edit/editProjetAA', compact('projetAA', 'client', 'gestionnaire', 'assure'));
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
            return redirect('Admin/listeProjetAA')->with('message', 'Projet Modifié avec succès! ');
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
        return redirect('Admin/listeProjetAA')->with('message', 'Projet Modifié avec succès! ');
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
        return redirect('/Admin/emprunteur')->with('message', 'Un nouveau projet emprunteur est créé !');
    }

    public function deleteProjetE($id)
    {
        $projetE = Emprunteur::findOrFail($id);
        $contratE = ContratEmprunteur::where('assuranceEmprunteur_id', $id);
        $projetE->delete();
        $contratE->delete();
        return redirect()->back()->with('message', 'Projet supprimé avec succès !');
    }

    public function  editProjetE($id)
    {
        $projetE = Emprunteur::find($id);
        $client = Client::all();
        $gestionnaire = User::all()->where ('role', 'Gestionnaire');
        return view('Admin/edit/editProjetE', compact('projetE', 'client', 'gestionnaire'));
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
        return redirect('Admin/listeProjetE')->with('message', 'Projet Modifié avec succès! ');
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
        $contratAP->gestionnaire_id = $projetAP->user_id;
        $contratAP->agent_id = $projetAP->agent_id;
        $contratAP->N_Version = $request->N_Version;
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
        
        
        return redirect()->back()->with('message', 'Nouveau Contrat inséré avec succès !');
    }


    public function deleteContratAP($id)
    {
        $contratAP = ContratPersonne::find($id);
        $facture = FacturePersonne::where('contratPersonne_id', $id);
        $facture->delete();
        $contratAP->delete();
        return redirect()->back()->with('message', 'Contrat supprimé avec succès !');
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
        return redirect()->back()->with('message', 'Nouveau Contrat inséré avec succès !');
    }

    public function deleteContratAA($id)
    {
        $contratAA = ContratAnimal::find($id);
        $facture = FactureAnimal::where('contratAnimal_id', $id);
        $facture->delete();
        $contratAA->delete();
        return redirect()->back()->with('message', 'Contrat supprimé avec succès !');
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
        return redirect()->back()->with('message', 'Nouveau Contrat inséré avec succès !');
    }

    public function deleteContratE($id)
    {
        $contratE = ContratEmprunteur::find($id);
        $facture = FactureEmprunteur::where('contratEmprunteur_id', $id);
        $facture->delete();
        $contratAE->delete();
        return redirect()->back()->with('message', 'Contrat supprimé avec succès !');
    }


    public function singleContratAP($id){
            
        $contrat = ContratPersonne::find($id);
        
        return view('Admin/singleContratAP', compact('contrat'));
    }

    public function telechargerContratAP(request $request){
        
        $contrat = ContratPersonne::find($request->id);
        $pdf = PDF::loadView('Admin/singleContratAP',compact('contrat'));
        return $pdf->download($contrat->N_Contrat.'.pdf');

    }
    public function singleContratAA($id){
            
        $contrat = ContratAnimal::find($id);
        return view('Admin/singleContratAA', compact('contrat'));
    }

    public function telechargerContratAA(request $request){
        
        $contrat = ContratPersonne::find($request->id);
        $pdf = PDF::loadView('Admin/singleContratAA',compact('contrat'));
        return $pdf->download($contrat->N_Contrat.'.pdf');

    }
    public function singleContratE($id){
            
        $contrat = ContratEmprunteur::find($id);
        return view('Admin/singleContratE', compact('contrat'));
    }

    public function telechargerContratE(request $request){
        
        $contrat = ContratEmprunteur::find($request->id);
        $pdf = PDF::loadView('Admin/singleContratE',compact('contrat'));
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


    public function factureAP()
    {
        if(empty(FacturePersonne::count())){
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratAP = ContratPersonne::all();
            $client = Client::all();
            $facture = FacturePersonne::all();
            return view('Admin/factureAP', compact('client', 'numFacture', 'contratAP','facture'));
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
            $contratAP = ContratPersonne::all();
            $client = Client::all();
            $facture = FacturePersonne::all()->where('gestionnaire_id', $user->id);
            return view('Admin/factureAP', compact('client', 'numFacture', 'contratAP','facture'));
        }
        else{
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratAP = ContratPersonne::all();
            $client = Client::all();
            $facture = FacturePersonne::all()->where('user_id', $user->id);
            return view('Admin/factureAP', compact('client', 'numFacture', 'contratAP','facture'));
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
            $contratAA = ContratAnimal::all();
            $client = Client::all();
            $facture = FactureAnimal::all();
            return view('Admin/factureAA', compact('client', 'numFacture', 'contratAA','facture'));
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
            $contratAA = ContratAnimal::all();
            $client = Client::all();
            $facture = FactureAnimal::all();
            return view('Admin/factureAA', compact('client', 'numFacture', 'contratAA','facture'));
        }
        else{
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratAA = ContratAnimal::all();
            $client = Client::all();
            $facture = FactureAnimal::all();
            return view('Admin/factureAA', compact('client', 'numFacture', 'contratAA','facture'));
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
            $contratE = ContratEmprunteur::all();
            $client = Client::all();
            $facture = FactureEmprunteur::all();
            return view('Admin/factureE', compact('client', 'numFacture', 'contratE','facture'));
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
            $contratE = ContratEmprunteur::all();
            $client = Client::all();
            $facture = FactureEmprunteur::all();
            return view('Admin/factureE', compact('client', 'numFacture', 'contratE','facture'));
        }
        else{
            $numFacture ='F';
            $numFacture.=Carbon::now('UTC')->addHour('1')->format('dmY');
            $numFacture.='00001';
            $user = Auth::user();
            $contratE = ContratEmprunteur::all();
            $client = Client::all();
            $facture = FactureEmprunteur::all();
            return view('Admin/factureE', compact('client', 'numFacture', 'contratE','facture'));
        }
      }
    }

    
    public function singleFactureAP($id){
            
        $facture = FacturePersonne::find($id);
        return view('Admin/singleFactureAP', compact('facture'));
    }

    public function singleFactureAA($id){
            
        $facture = FactureAnimal::find($id);
        return view('Admin/singleFactureAA', compact('facture'));
    }
    public function singleFactureE($id){
            
        $facture = FactureEmprunteur::find($id);
        return view('Admin/singleFactureE', compact('facture'));
    }

    public function telechargerFactureAP(request $request){
        
        $facture = FacturePersonne::find($request->id);
        $pdf = PDF::loadView('Admin/singleFactureAP',compact('facture'));
        return $pdf->download($facture->N_Facture.'.pdf');

    }

    public function telechargerFactureAA(request $request){
        
        $facture = FactureAnimal::find($request->id);
        $pdf = PDF::loadView('Admin/singleFactureAA',compact('facture'));
        return $pdf->download($facture->N_Facture.'.pdf');

    }
    public function telechargerFactureE(request $request){
        
        $facture = FactureEmprunteur::find($request->id);
        $pdf = PDF::loadView('Admin/singleFactureE',compact('facture'));
        return $pdf->download($facture->N_Facture.'.pdf');

    }

    function storeFactureAP(Request $request){
        
        $request->validate(['N_Facture'=> 'required',
                            'contrat_id'=> 'required', 
                            'gestionnaire_id'=> 'required',
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
        return redirect('Admin/factureAP')->with('message', 'Nouvelle Facture insérée avec succès !');
    }
    function storeFactureAA(Request $request){
        
        $request->validate(['N_Facture'=> 'required', 
                            'contrat_id'=> 'required',  
                            'gestionnaire_id'=> 'required',
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
        return redirect('Admin/factureAA')->with('message', 'Nouvelle Facture insérée avec succès !');
    }
    function storeFactureE(Request $request){
        
        $request->validate(['N_Facture'=> 'required', 
                            'contrat_id'=> 'required', 
                            'gestionnaire_id'=> 'required',
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
        return redirect('Admin/factureE')->with('message', 'Nouvelle Facture insérée avec succès !');
    }


}
