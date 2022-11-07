<?php

namespace App\Http\Livewire\Client;


use File;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $timestamps = true;

    public $elements;
    public $recherche = null;
    public $results;

    public function updatingRecherche()
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

        
        return view('livewire.client.show', [
            "clients" => $guestQuery->latest()->paginate(20),
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
