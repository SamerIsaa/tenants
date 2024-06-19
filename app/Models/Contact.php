<?php

namespace App\Models;

 use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name' , 'email' ,'message' , 'created_at' , 'read_at'
    ];


    public function replies()
    {
        return $this->hasMany(Replay::class);
    }

    public function scopeFilter($q)
    {
        $query = request()['query'];
        $sort = request('sort');

        if (isset($query['generalSearch'])) {
            $key_search = $query['generalSearch'];
            $q->where('email', 'like', '%' . $key_search . '%')
                ->orWhere('name', 'like', '%' . $key_search . '%')
                ->orWhere('message', 'like', '%' . $key_search . '%');
        }


        if (isset($sort['field'])) {
            $sort_key = $sort['field'];
            $sort_dir = $sort['sort'];
            if (in_array($sort_key, $this->fillable)) {
                $q->orderBy($sort_key, $sort_dir);
            }
        }
        return $q;
    }
}
