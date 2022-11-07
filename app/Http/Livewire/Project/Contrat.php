<?php

namespace App\Http\Livewire\Project;

use App\Models\Contrats;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Contrat extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $timestamps = true;

    public $elements;
    public $recherche = null;
    public $dureeFiltre = null;
    public $compagnieFiltre = null;
    public $gestionnaireFiltre = null;
    public $results;

    public function updatingdureeFiltre()
    {
        $this->resetPage();
    }

    public function updatingRecherche()
    {
        $this->resetPage();
    }

    public function updatingcompagnieFiltre()
    {
        $this->resetPage();
    }

    public function updatinggestionnaireFiltre()
    {
        $this->resetPage();
    }


    public function render()
    {
        Carbon::setLocale("fr");

        $contratQuery = Contrats::query();
        $gestionnaireQuery = User::query()->where('role', '2')->get();
        $clientQuery = Client::query()->get(); 


        if ($this->recherche != null){
            $clientQuery->where('nom', 'like', '%'.$this->recherche.'%')
                ->orWhere('prenom', 'like', '%'.$this->recherche.'%')
                ->orWhere('email', 'like', '%'.$this->recherche.'%')
                ->orWhere('tele', 'like', '%'.$this->recherche.'%');
        }

        if ($this->compagnieFiltre != null) {
            $contratQuery->where('compagnie', $this->compagnieFiltre);
        }

        if ($this->dureeFiltre != null) {
            $contratQuery->where('created_at', '>', now()->addDays(-$this->dureeFiltre));
        }

        if ($this->gestionnaireFiltre != null) {
            $contratQuery->where('gestionnaire_id', $this->gestionnaireFiltre);
        }


        return view('livewire.project.contrat', [
            "contrats" => $contratQuery->latest()->paginate(10),
            "gestionnaires" => $gestionnaireQuery,
            "clients" => $clientQuery,
        ]);
    }
}
