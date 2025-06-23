<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    /**
     * POST /paiements
     * Enregistrer un paiement pour un devis.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'devis_id' => 'required|exists:devis,id',
            'amount'   => 'required|numeric',
            'method'   => 'required|string',
        ]);

        $paiement = Paiement::create($data);

        // Ici, vous pouvez intégrer Stripe, PayPal, etc.
        // et mettre à jour le statut du paiement.

        return response()->json($paiement, 201);
    }
    

}
