<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class FaqCategory extends Model
{
    use Translatable, SoftDeletes;

    const FILLABLE = ['created_at'];
    public $translatedAttributes = ['name'];
    public $translationModel = FaqCategoryTranslation::class;

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



    public function scopeFilter($q, Request $request)
    {
        $query = request('query');

        if (isset($query['generalSearch'])) {

            $q->whereHas('translations' , function ($q) use ($query){
                $q->where('name', 'like', "%{$query['generalSearch']}%");
            });

        }


        return $q;
    }
}
