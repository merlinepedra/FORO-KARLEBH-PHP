<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomePolicy
{
    use HandlesAuthorization;

    public function delete(User $user, $id)
    {
      return true;
    }

}
