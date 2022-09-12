<?php

namespace App\Http\Livewire;

use File;
use App\Models\Folder;
use App\Models\Client;
use App\Models\Status;
use App\Models\Situation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Clientshow extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $timestamps = true;

    public $elements;
    public $recherche = null;
    public $dureeFiltre = null;
    public $situationFiltre = null;
    public $statusFiltre = null;
    public $results;

    public $etatDossier = [];

    public function updatingDureeFiltre()
    {
        $this->resetPage();
    }

    public function updatingRecherche()
    {
        $this->resetPage();
    }

    public function updatingSituationFiltre()
    {
        $this->resetPage();
    }

    public function updatingStatusFiltre()
    {
        $this->resetPage();
    }

    public function render()
    {
        Carbon::setLocale("fr");

        $guestQuery = Client::query();

        if ($this->recherche != null){
            $guestQuery->where('nom', 'like', '%'.$this->recherche.'%')
                ->orWhere('prenom', 'like', '%'.$this->recherche.'%')
                ->orWhere('email', 'like', '%'.$this->recherche.'%')
                ->orWhere('tele', 'like', '%'.$this->recherche.'%');
        }

        if ($this->situationFiltre != null) {
            $guestQuery->whereIn('id', DB::table('folders')->select('client_id')->where('situation_id', $this->situationFiltre));
        }

        if ($this->dureeFiltre != null) {
            $guestQuery->whereIn('id', DB::table('folders')->select('client_id')->where('created_at', '>', now()->addDays(-$this->dureeFiltre)));
        }

        if ($this->statusFiltre != null) {
            $guestQuery->whereIn('id', DB::table('folders')->select('client_id')->where('status_id', $this->statusFiltre));
        }

        return view('livewire.clientshow', [
            "guests" => $guestQuery->latest()->paginate(4),
            "status" => Status::all(),
            "situations" => Situation::all(),
        ]);
    }

    public function changerEtat($folder_id)
    {
        DB::table('folders')->where('id', $folder_id)->update([
            'status_id' => $this->etatDossier[$folder_id],
        ]);
    }

    public function confirmDelete($id)
    {
        $this->dispatchBrowserEvent("showConfirmMessage", ["message" => [
            "text" => "Vous êtes sur le point de supprimer cette personne de la liste des clients. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "client_id" => $id
            ]
        ]]);
    }

    public function deleteGuest($id)
    {
        $this->elements = array('carteIdentiteRecto',
            'carteIdentiteVerso',
            'carteGriseRecto',
            'carteGriseVerso',
            'permisRecto',
            'permisVerso',
            'releveInformation',
            'rib',
            'copieJugement',
            'visiteMedicale',
            'pv');
            
        if(isset(Client::find($id)->folder[0])){
            foreach ($this->elements as $element) {
                File::delete('assets/' . Client::find($id)->folder[0]->$element);
            }
        }
        
        Client::destroy($id);
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Client supprimé avec succès!"]);
    }
}
