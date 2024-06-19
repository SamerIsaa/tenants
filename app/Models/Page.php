<?php

namespace App\Models;

use App\Models\PageTranslation;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Page extends Model
{
    use Translatable;

    const FILLABLE = ['created_at'];
    public $translatedAttributes = ['title', 'content'];
    public $translationModel = PageTranslation::class;

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

    public function scopeFilter($q)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {

            $q->whereHas('translations', function ($q) use ($query) {
                $q->where('title', 'like', "%{$query['generalSearch']}%")
                    ->orWhere('content', 'like', "%{$query['generalSearch']}%");
            });

        }


        return $q;
    }

}
