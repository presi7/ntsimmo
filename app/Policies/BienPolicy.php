<?php

namespace App\Policies;

use App\Models\Bien;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BienPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return true; // tous peuvent voir la liste
    }

    public function view(User $user, Bien $bien): bool
    {
        return true; // tous peuvent voir le détail
    }

    public function create(User $user): bool
    {
        // seller et admin peuvent créer
        return in_array($user->role, ['seller','admin']);
    }

    public function update(User $user, Bien $bien): bool
    {
        // admin OU propriétaire (seller) du bien
        return $user->isAdmin() || $user->ownsBien($bien);
    }

    public function delete(User $user, Bien $bien): bool
    {
        return $this->update($user, $bien);
    }
}
