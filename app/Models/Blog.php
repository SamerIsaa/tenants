<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Blog extends Model
{
    use Translatable , SoftDeletes;

    const FILLABLE = ['image' , 'views', 'is_active' ];
    public $translatedAttributes = ['title', 'content'];
    public $translationModel = BlogTranslation::class;

    protected $fillable = self::FILLABLE;
    public function createTranslation(Request $request)
    {
        foreach (locales() as $key => $language) {
            foreach ($this->translatedAttributes as $attribute) {
                if ($request->get($attribute . '_' . $key) != null && !empty($request->$attribute . $key)) {
                    $this->{$attribute . ':' . $key} = $request->get($attribute . '_' . $key);
                }
            }
            $this->save();
        }
        return $this;
    }


    public function scopeSearch($q) {


        if (\request()->filled('q')) {
            $q->whereTranslationLike('title', "%".request()['q']."%");
        }

        $query = request('query');


        if (isset($query['generalSearch'])) {
            $q->whereTranslationLike('title', "%{$query['generalSearch']}%")
                ->orWhereTranslationLike('content', "%{$query['generalSearch']}%");
        }

    }

    public function updateView()
    {
        $this->increment('views');
    }

    public function scopeActive($q)
    {
        return $q->where('is_active',1);
    }
}
