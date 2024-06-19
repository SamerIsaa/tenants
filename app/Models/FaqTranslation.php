<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class FaqTranslation extends Model
{
    protected $table = 'faq_translations';
    protected $fillable = ['title','description'];
    public $timestamps = false;
}
