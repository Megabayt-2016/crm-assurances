<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use App\Models\Client;
use App\Models\Factures;
use Carbon\Carbon;
use Livewire\WithPagination;


class Facture extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $timestamps = true;

    public $elements;
    public $recherche = null;
    public $dureeFiltre = null;
    public $statutFiltre = null;
    public $rechercheFacture = null;
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

    public function updatingRechercheFacture()
    {
        $this->resetPage();
    }

    public function updatingStatutFiltre()
    {
        $this->resetPage();
    }


    public function render()
    {
        Carbon::setLocale("fr");

        $guestQuery = Client::query();
        $factureQuery = Factures::query();

        if ($this->recherche != null){
            $guestQuery->where('nom', 'like', '%'.$this->recherche.'%')
                ->orWhere('prenom', 'like', '%'.$this->recherche.'%')
                ->orWhere('email', 'like', '%'.$this->recherche.'%')
                ->orWhere('tele', 'like', '%'.$this->recherche.'%');
        }
        if ($this->rechercheFacture != null){
            $factureQuery->where('N_Facture', 'like', '%'.$this->rechercheFacture.'%');
        }

        if ($this->statutFiltre != null) {
            $factureQuery->where('statut', $this->statutFiltre);
        }

        if ($this->dureeFiltre != null) {
            $factureQuery->where('created_at', '>', now()->addDays(-$this->dureeFiltre));
        }


        return view('livewire.project.facture', [
            "factures" => $factureQuery->latest()->paginate(3),
        ]);
    }
}
