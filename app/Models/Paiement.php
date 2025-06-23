<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paiement extends Model
{
    protected $table = 'paiements';

    protected $fillable = [
        'devis_id',
        'amount',
        'method',
        'status',
    ];

    /**
     * Le paiement appartient à un devis.
     */
    public function devis(): BelongsTo
    {
        return $this->belongsTo(Devis::class);
    }
}
