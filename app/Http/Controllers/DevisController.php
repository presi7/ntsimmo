<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;

class DevisController extends Controller
{
    /**
     * GET /devis
     * Liste des devis de l’utilisateur connectée.
     */
    public function index(Request $request)
    {
        $devis = Devis::with('bien', 'artisan.user')
            ->where('user_id', $request->user()->id)
            ->paginate(10);

        return response()->json($devis);
    }

    /**
     * POST /devis
     * Créer un nouveau devis.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'bien_id'    => 'required|exists:biens,id',
            'artisan_id' => 'required|exists:artisans,id',
            'details'    => 'required|string',
        ]);

        // L’utilisateur qui demande le devis
        $data['user_id'] = $request->user()->id;

        $devis = Devis::create($data);

        return response()->json($devis, 201);
    }

    

}
