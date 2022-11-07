<?php

namespace App\Http\Livewire\Project;

use File;
use App\Models\Assurances;
use App\Models\AssurancesType;
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
    public $dureeFiltre = null;
    public $typeFiltre = null;
    public $origineFiltre = null;
    public $results;

    public function updatingDureeFiltre()
    {
        $this->resetPage();
    }

    public function updatingRecherche()
    {
        $this->resetPage();
    }

    public function updatingtypeFiltre()
    {
        $this->resetPage();
    }

    public function updatingorigineFiltre()
    {
        $this->resetPage();
    }


    public function render()
    {
        Carbon::setLocale("fr");

        $projetQuery = Assurances::query();
        $clientQuery = Client::query();

        if ($this->recherche != null){
            $clientQuery->where('nom', 'like', '%'.$this->recherche.'%')
                ->orWhere('prenom', 'like', '%'.$this->recherche.'%')
                ->orWhere('email', 'like', '%'.$this->recherche.'%')
                ->orWhere('tele', 'like', '%'.$this->recherche.'%');
        }

        if ($this->typeFiltre != null) {
            $projetQuery->where('type', $this->typeFiltre);
        }

        if ($this->dureeFiltre != null) {
            $projetQuery->where('created_at', '>', now()->addDays(-$this->dureeFiltre));
        }

        if ($this->origineFiltre != null) {
            $projetQuery->where('origine', $this->origineFiltre);
        }

        return view('livewire.project.show', [
            "projets" => $projetQuery->latest()->paginate(10),
            "types" => Assurancestype::all(),
            "clients" => $clientQuery,
        ]);
    }
}
