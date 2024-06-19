<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getFullName()
    {
        return $this->name;
    }

    public function scopeFilter($q)
    {

        $query = request('query');

        if (isset($query['generalSearch'])) {
            return $q->where('name', 'like', '%' . $query['generalSearch'] . '%')
                ->orWhere('email', 'like', '%' . $query['generalSearch'] . '%');
        }

        return $q;
    }

    public function scopeSearch($q)
    {
        if (isset(request()['generalSearch']) && !is_null(request()['generalSearch'])) {
            return $q->where('name', 'like', '%' . request()['generalSearch'] . '%')
                ->orWhere('email', 'like', '%' . request()['generalSearch'] . '%');
        }
        return $q;

    }


}
