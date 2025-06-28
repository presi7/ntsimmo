<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artisan extends Model
{
    protected $table = 'artisans';

    protected $fillable = [
        'user_id',
        'specialties',
        // 'phone',
        'address',
        'image_realisations',
        'video_realisations',
        'prenom',
        'nom',
        'realisations',
        'videos',
    ];

    protected $casts = [
        'specialties' => 'array',
        'image_realisations' => 'array',
        'video_realisations' => 'array',
        'realisations' => 'array',
        'videos' => 'array',
    ];

    /**
     * L'artisan appartient à un utilisateur.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Les devis reçus par l'artisan.
     */
    public function devis()
    {
        return $this->hasMany(Devis::class, 'artisan_id');
    }
}
