<?php

namespace App\Http\Controllers\Admin;

use App\Etablissement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etablissement = DB::table('etablissement')->select('*');
        $etablissement = $etablissement->get();
        return view('listeEtablissements', compact('etablissement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creationEtablissement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $etablissement = new Etablissement;
        $etablissement->idEtab = $request->idEtab; 
        $etablissement->nomEtab = $request->nomEtab;
        $etablissement->adresseRue = $request->adresseRue;
        $etablissement->codePostal = $request->codePostal;
        $etablissement->adresseRue = $request->adresseRue;
        $etablissement->ville = $request->ville;
        $etablissement->tel = $request->tel;
        $etablissement->adresseElectronique = $request->adresseElectronique;
        $etablissement->type = $request->type;
        $etablissement->civiliteResponsable = $request->civiliteResponsable;
        $etablissement->nomResponsable = $request->nomResponsable;
        $etablissement->prenomResponsable = $request->prenomResponsable;
        $etablissement->nombreChambresOffertes = $request->nombreChambresOffertes;

        $etablissement->save();
        return redirect()->action('Admin\EtablissementController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idEtab)
    {
        $etablissement = Etablissement::where('idEtab', '=', $idEtab)->select('*')->first();
        return view('detailEtablissement', compact('etablissement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idEtab)
    {
        $etablissement = Etablissement::where('idEtab', '=', $idEtab)->first();
        return view('modificationEtablissement', compact('etablissement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idEtab)
    {
        // $etablissement = Etablissement::where('idEtab', '=', $idEtab)->first();
        // $etablissement->idEtab = $idEtab;
        // $etablissement->nomEtab = $request->nomEtab;
        // $etablissement->adresseRue = $request->adresseRue;
        // $etablissement->codePostal = $request->codePostal;
        // $etablissement->adresseRue = $request->adresseRue;
        // $etablissement->ville = $request->ville;
        // $etablissement->tel = $request->tel;
        // $etablissement->adresseElectronique = $request->adresseElectronique;
        // $etablissement->type = (int)$request->type;
        // $etablissement->civiliteResponsable = $request->civiliteResponsable;
        // $etablissement->nomResponsable = $request->nomResponsable;
        // $etablissement->prenomResponsable = $request->prenomResponsable;
        // $etablissement->nombreChambresOffertes = (int)$request->nombreChambresOffertes;

        // $etablissement->save();
        Etablissement::where('idEtab', '=', $idEtab)
        ->update([
            'nomEtab' => $request->nomEtab,
            'adresseRue' => $request->adresseRue,
            'codePostal' => $request->codePostal,
            'adresseRue' => $request->adresseRue,
            'ville' => $request->ville,
            'tel' => $request->tel,
            'adresseElectronique' => $request->adresseElectronique,
            'type' => (int)$request->type,
            'civiliteResponsable' => $request->civiliteResponsable,
            'nomResponsable' => $request->nomResponsable,
            'prenomResponsable' => $request->prenomResponsable,
            'nombreChambresOffertes' => (int)$request->nombreChambresOffertes
         ]);
        return redirect()->action('Admin\EtablissementController@edit', $idEtab);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idEtab)
    {
        Etablissement::where('idEtab', '=', $idEtab)->delete();
        return redirect()->action('Admin\EtablissementController@index')->with('success','Dữ liệu xóa thành công.');
    }
}
