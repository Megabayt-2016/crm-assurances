<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Folder;
use Illuminate\Support\Facades\Notification;
use App\Notifications\FormLinkNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class FilesController extends Controller
{
    public function index()
    {
        return view('Form/welcome');
    }

    public function store(Request $request)
    {
        $client = new Client();

        $request->validate([
            'civilite' => 'required',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'email|required|email',
            'tele' => 'required|numeric',
            'adresse' => 'required',
            'complementAdresse' => 'max:255',
            'raisonSociale' => 'required',
            'codePostal' => 'numeric|required',
            'ville' => 'required',
            'situation_id' => 'required',
        ]);

     //  dd($request->civilite);

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

        //$client->situation_id = $request->situation_id;
        $client->save();
        //dd($client);

        $client->notify(new FormLinkNotification(route('uploadpage', ['situation_id' => $request->situation_id, 'client_id' => encrypt($client->id)])));

        return redirect()->route('send');

    }

    public function send()
    {
        return view('Form/mailSent');
    }

    public function storerisquesimple(Request $request)
    {
        $data = new Folder();

        $data->client_id = decrypt($request->guest);
        $data->situation_id = $request->situation_id;

        $request->validate([
            'carteIdentiteRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteIdentiteVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'permisRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'permisVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteGriseRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteGriseVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'releveInformation' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'certificatCession' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'rib' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
        ]);

        if (isset($request->carteGriseRecto)) {
            $file = $request->carteGriseRecto;
            $filename = 'carteGriseRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteGriseRecto->move('assets', $filename);
            $data->carteGriseRecto = $filename;
            $data->save();
        }

        if (isset($request->carteGriseVerso)) {
            $file = $request->carteGriseVerso;
            $filename = 'carteGriseVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteGriseVerso->move('assets', $filename);
            $data->carteGriseVerso = $filename;
            $data->save();
        }

        if (isset($request->permisRecto)) {
            $file = $request->permisRecto;
            $filename = 'permisRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->permisRecto->move('assets', $filename);
            $data->permisRecto = $filename;
            $data->save();
        }

        if (isset($request->permisVerso)) {
            $file = $request->permisVerso;
            $filename = 'permisVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->permisVerso->move('assets', $filename);
            $data->permisVerso = $filename;
            $data->save();
        }

        if (isset($request->releveInformation)) {
            $file = $request->releveInformation;
            $filename = 'releveInformation' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->releveInformation->move('assets', $filename);
            $data->releveInformation = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteRecto)) {
            $file = $request->carteIdentiteRecto;
            $filename = 'carteIdentiteRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteRecto->move('assets', $filename);
            $data->carteIdentiteRecto = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteVerso)) {
            $file = $request->carteIdentiteVerso;
            $filename = 'carteIdentiteVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteVerso->move('assets', $filename);
            $data->carteIdentiteVerso = $filename;
            $data->save();
        }

        if (isset($request->certificatCession)) {
            $file = $request->certificatCession;
            $filename = 'certificatCession' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->certificatCession->move('assets', $filename);
            $data->certificatCession = $filename;
            $data->save();
        }

        if (isset($request->rib)) {
            $file = $request->rib;
            $filename = 'rib' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->rib->move('assets', $filename);
            $data->rib = $filename;
            $data->save();
        }

        if ($request->carteGriseRecto != null || $request->carteGriseVerso != null || $request->permisRecto != null || $request->permisVerso != null || $request->releveInformation != null || $request->carteIdentiteRecto != null || $request->carteIdentiteVerso != null) {
            $data->save();
            return redirect()->route('uploaded');
        } else {
            Client::destroy($data->guest->id);
            return redirect()->route('failed');
        }
    }

    public function storerisqueagrave(Request $request)
    {
        $data = new Folder();

        $data->situation_id = $request->situation_id;
        $data->client_id = decrypt($request->guest);

        $request->validate([
            'carteIdentiteRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteIdentiteVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteGriseRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteGriseVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'permisRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'permisVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'releveInformation' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'rib' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'copieJugement' => 'nullable|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'visiteMedicale' => 'nullable|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'pv' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'certificatCession' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
        ]);

        if (isset($request->copieJugement)) {
            $file = $request->copieJugement;
            $filename = 'copieJugement' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->copieJugement->move('assets', $filename);
            $data->copieJugement = $filename;
            $data->save();
        }

        if (isset($request->visiteMedicale)) {
            $file = $request->visiteMedicale;
            $filename = 'visiteMedicale' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->visiteMedicale->move('assets', $filename);
            $data->visiteMedicale = $filename;
            $data->save();
        }

        if (isset($request->carteGriseRecto)) {
            $file = $request->carteGriseRecto;
            $filename = 'carteGriseRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteGriseRecto->move('assets', $filename);
            $data->carteGriseRecto = $filename;
            $data->save();
        }

        if (isset($request->carteGriseVerso)) {
            $file = $request->carteGriseVerso;
            $filename = 'carteGriseVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteGriseVerso->move('assets', $filename);
            $data->carteGriseVerso = $filename;
            $data->save();
        }

        if (isset($request->permisRecto)) {
            $file = $request->permisRecto;
            $filename = 'permisRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->permisRecto->move('assets', $filename);
            $data->permisRecto = $filename;
            $data->save();
        }

        if (isset($request->permisVerso)) {
            $file = $request->permisVerso;
            $filename = 'permisVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->permisVerso->move('assets', $filename);
            $data->permisVerso = $filename;
            $data->save();
        }

        if (isset($request->releveInformation)) {
            $file = $request->releveInformation;
            $filename = 'releveInformation' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->releveInformation->move('assets', $filename);
            $data->releveInformation = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteRecto)) {
            $file = $request->carteIdentiteRecto;
            $filename = 'carteIdentiteRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteRecto->move('assets', $filename);
            $data->carteIdentiteRecto = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteVerso)) {
            $file = $request->carteIdentiteVerso;
            $filename = 'carteIdentiteVerso' . $data->client_id . time() . $data->client_id . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteVerso->move('assets', $filename);
            $data->carteIdentiteVerso = $filename;
            $data->save();
        }

        if (isset($request->pv)) {
            $file = $request->pv;
            $filename = 'pv' . $data->client_id . time() . $data->client_id . '.' . $file->getClientOriginalExtension();
            $request->pv->move('assets', $filename);
            $data->pv = $filename;
            $data->save();
        }

        if (isset($request->certificatCession)) {
            $file = $request->certificatCession;
            $filename = 'certificatCession' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->certificatCession->move('assets', $filename);
            $data->certificatCession = $filename;
            $data->save();
        }

        if (isset($request->rib)) {
            $file = $request->rib;
            $filename = 'rib' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->rib->move('assets', $filename);
            $data->rib = $filename;
            $data->save();
        }

        if ($request->copieJugement != null || $request->visiteMedicale != null || $request->carteGriseRecto != null || $request->carteGriseVerso != null || $request->permisRecto != null || $request->permisVerso != null || $request->releveInformation != null || $request->carteIdentiteRecto != null || $request->carteIdentiteVerso != null || $request->pv != null) {
            $data->save();
            return redirect()->route('uploaded');
        } else {
            Client::destroy($data->guest->id);
            return redirect()->route('failed');
        }
    }

    public function storejeuneconducteur(Request $request)
    {
        $data = new Folder();

        $data->situation_id = $request->situation_id;
        $data->client_id = decrypt($request->guest);

        $request->validate([
            'carteGriseRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteGriseVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'permisRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'permisVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteIdentiteRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteIdentiteVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'rib' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'certificatCession' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
        ]);


        if (isset($request->carteGriseRecto)) {
            $file = $request->carteGriseRecto;
            $filename = 'carteGriseRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteGriseRecto->move('assets', $filename);
            $data->carteGriseRecto = $filename;
            $data->save();
        }

        if (isset($request->carteGriseVerso)) {
            $file = $request->carteGriseVerso;
            $filename = 'carteGriseVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteGriseVerso->move('assets', $filename);
            $data->carteGriseVerso = $filename;
            $data->save();
        }

        if (isset($request->permisRecto)) {
            $file = $request->permisRecto;
            $filename = 'permisRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->permisRecto->move('assets', $filename);
            $data->permisRecto = $filename;
            $data->save();
        }

        if (isset($request->permisVerso)) {
            $file = $request->permisVerso;
            $filename = 'permisVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->permisVerso->move('assets', $filename);
            $data->permisVerso = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteRecto)) {
            $file = $request->carteIdentiteRecto;
            $filename = 'carteIdentiteRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteRecto->move('assets', $filename);
            $data->carteIdentiteRecto = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteVerso)) {
            $file = $request->carteIdentiteVerso;
            $filename = 'carteIdentiteVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteVerso->move('assets', $filename);
            $data->carteIdentiteVerso = $filename;
            $data->save();
        }

        if (isset($request->certificatCession)) {
            $file = $request->certificatCession;
            $filename = 'certificatCession' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->certificatCession->move('assets', $filename);
            $data->certificatCession = $filename;
            $data->save();
        }

        if (isset($request->rib)) {
            $file = $request->rib;
            $filename = 'rib' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->rib->move('assets', $filename);
            $data->rib = $filename;
            $data->save();
        }

        if ($request->carteGriseRecto != null || $request->carteGriseVerso != null || $request->permisRecto != null || $request->permisVerso != null || $request->carteIdentiteRecto != null || $request->carteIdentiteVerso != null || $request->rib != null) {
            $data->save();
            return redirect()->route('uploaded');
        } else {
            return redirect()->back()->withSuccess(__('please upload files.'));
        }
    }

    public function storevtc(Request $request)
    {
        $data = new Folder();

        $data->situation_id = $request->situation_id;
        $data->client_id = decrypt($request->guest);

        $request->validate([
            'carteGriseRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteGriseVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'permisRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'permisVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteIdentiteRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteIdentiteVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'releveInformation' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'rib' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteProfesionnelleRecto' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteProfesionnelleVerso' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'certificatCession' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'k-bis' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
        ]);


        if (isset($request->carteGriseRecto)) {
            $file = $request->carteGriseRecto;
            $filename = 'carteGriseRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteGriseRecto->move('assets', $filename);
            $data->carteGriseRecto = $filename;
            $data->save();
        }

        if (isset($request->carteGriseVerso)) {
            $file = $request->carteGriseVerso;
            $filename = 'carteGriseVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteGriseVerso->move('assets', $filename);
            $data->carteGriseVerso = $filename;
            $data->save();
        }

        if (isset($request->permisRecto)) {
            $file = $request->permisRecto;
            $filename = 'permisRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->permisRecto->move('assets', $filename);
            $data->permisRecto = $filename;
            $data->save();
        }

        if (isset($request->permisVerso)) {
            $file = $request->permisVerso;
            $filename = 'permisVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->permisVerso->move('assets', $filename);
            $data->permisVerso = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteRecto)) {
            $file = $request->carteIdentiteRecto;
            $filename = 'carteIdentiteRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteRecto->move('assets', $filename);
            $data->carteIdentiteRecto = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteVerso)) {
            $file = $request->carteIdentiteVerso;
            $filename = 'carteIdentiteVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteVerso->move('assets', $filename);
            $data->carteIdentiteVerso = $filename;
            $data->save();
        }

        if (isset($request->releveInformation)) {
            $file = $request->releveInformation;
            $filename = 'releveInformation' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->releveInformation->move('assets', $filename);
            $data->releveInformation = $filename;
            $data->save();
        }

        if (isset($request->carteProfesionnelleRecto)) {
            $file = $request->carteProfesionnelleRecto;
            $filename = 'carteProfesionnelleRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteProfesionnelleRecto->move('assets', $filename);
            $data->carteProfesionnelleRecto = $filename;
            $data->save();
        }

        if (isset($request->carteProfesionnelleVerso)) {
            $file = $request->carteProfesionnelleVerso;
            $filename = 'carteProfesionnelleVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteProfesionnelleVerso->move('assets', $filename);
            $data->carteProfesionnelleVerso = $filename;
            $data->save();
        }

        if (isset($request->kBis)) {
            $file = $request->kBis;
            $filename = 'kBis' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->kBis->move('assets', $filename);
            $data->kBis = $filename;
            $data->save();
        }

        if (isset($request->rib)) {
            $file = $request->rib;
            $filename = 'rib' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->rib->move('assets', $filename);
            $data->rib = $filename;
            $data->save();
        }

        if ($request->carteGriseRecto != null || $request->carteGriseVerso != null || $request->permisRecto != null || $request->permisVerso != null || $request->carteIdentiteRecto != null || $request->carteIdentiteVerso != null || $request->releveInformation != null || $request->carteProfesionnelleRecto != null || $request->carteProfesionnelleVerso != null || $request->kBis != null || $request->rib != null) {
            $data->save();
            return redirect()->route('uploaded');
        } else {
            return redirect()->back()->withSuccess(__('please upload files.'));
        }
    }

    public function storemutuel(Request $request)
    {
        $data = new Folder();

        $data->situation_id = $request->situation_id;
        $data->client_id = decrypt($request->guest);

        $request->validate([
            'carteIdentiteRecto' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteIdentiteVerso' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteMutuelRecto' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteMutuelVerso' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'rib' => 'required|mimes:pdf,jpeg,png,gif,svg|max:20480',
            'carteVitale' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
            'attestationSecuriteSociale' => 'mimes:pdf,jpeg,png,gif,svg|max:20480',
        ]);


        if (isset($request->carteVitale)) {
            $file = $request->carteVitale;
            $filename = 'carteVitale' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteVitale->move('assets', $filename);
            $data->carteVitale = $filename;
            $data->save();
        }

        if (isset($request->carteMutuelRecto)) {
            $file = $request->carteMutuelRecto;
            $filename = 'carteMutuelRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteMutuelRecto->move('assets', $filename);
            $data->carteMutuelRecto = $filename;
            $data->save();
        }

        if (isset($request->carteMutuelVerso)) {
            $file = $request->carteMutuelVerso;
            $filename = 'carteMutuelVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteMutuelVerso->move('assets', $filename);
            $data->carteMutuelVerso = $filename;
            $data->save();
        }

        if (isset($request->attestationSecuriteSociale)) {
            $file = $request->attestationSecuriteSociale;
            $filename = 'attestationSecuriteSociale' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->attestationSecuriteSociale->move('assets', $filename);
            $data->attestationSecuriteSociale = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteRecto)) {
            $file = $request->carteIdentiteRecto;
            $filename = 'carteIdentiteRecto' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteRecto->move('assets', $filename);
            $data->carteIdentiteRecto = $filename;
            $data->save();
        }

        if (isset($request->carteIdentiteVerso)) {
            $file = $request->carteIdentiteVerso;
            $filename = 'carteIdentiteVerso' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->carteIdentiteVerso->move('assets', $filename);
            $data->carteIdentiteVerso = $filename;
            $data->save();
        }

        if (isset($request->rib)) {
            $file = $request->rib;
            $filename = 'rib' . $data->client_id . time() . '.' . $file->getClientOriginalExtension();
            $request->rib->move('assets', $filename);
            $data->rib = $filename;
            $data->save();
        }

        if ($request->carteVitale != null || $request->carteMutuelRecto != null || $request->carteMutuelVerso != null || $request->attestationSecuriteSociale != null || $request->carteIdentiteRecto != null || $request->carteIdentiteVerso != null || $request->rib != null) {
            $data->save();
            return redirect()->route('uploaded');
        } else {
            return redirect()->back()->withSuccess(__('please upload files.'));
        }
    }

    public function uploaded()
    {
        return view('Form/uploaded');
    }

    public function show()
    {
        $test = Client::orderBy('updated_at', 'DESC')->get();
        return view('Form.show', $test);
    }


    public function delete($folder_id)
    {
        $this->folder = DB::table('folders')->where('id', $folder_id);
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
        DB::transaction(function () {
            foreach ($this->elements as $element) {
                File::delete('assets/' . $this->folder->get()[0]->$element);
            }
            $this->folder->delete();
        }
        );
        return redirect()->route('show')->withSuccess(__('Folder delete successfully.'));
    }

    public function changerEtat(Request $request, $client_id)
    {
        DB::table('folders')->where('id', $client_id)->update([
            'status_id' => $request->etatDossier,
        ]);
        return redirect()->back();
    }
}
