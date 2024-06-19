<?php

namespace App\Models;

use Spatie\Permission\Models\Role as PermissionRole;

class Role extends PermissionRole
{


    public function scopeFilter($q)
    {

        $query = request('query');

        if (isset($query['generalSearch'])) {
            return $q->where('name', 'like', '%' . $query['generalSearch'] . '%');
        }

        return $q;
    }


}
