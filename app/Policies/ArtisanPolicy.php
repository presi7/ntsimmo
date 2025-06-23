<?php

namespace App\Policies;

use App\Models\Artisan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArtisanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Tous les utilisateurs (même non connectés) peuvent voir la liste des artisans
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Artisan $artisan): bool
    {
        return true; // Tous les utilisateurs (y compris non connectés) peuvent voir les détails d'un artisan
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        // Seuls les administrateurs peuvent créer un artisan
        return $user->isAdmin(); // Assurez-vous d'avoir une méthode isAdmin() sur votre modèle User
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Artisan $artisan): bool
    {
        // Seuls les administrateurs peuvent modifier un artisan
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Artisan $artisan): bool
    {
        // Seuls les administrateurs peuvent supprimer un artisan
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Artisan $artisan): bool
    {
        //
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Artisan $artisan): bool
    {
        //
        return $user->isAdmin();
    }
} 