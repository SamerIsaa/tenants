<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use Translatable, SoftDeletes;

    public $translatedAttributes = ['title', 'description'];
    public $translationModel = FaqTranslation::class;
    public $translationForeignKey = 'faq_id';

    const FILLABLE = ['is_active', 'faq_category_id'];
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

    public function scopeSearch($q, Request $request)
    {
        if ($request->filled('q')) {
            $q->whereTranslationLike('title', "%{$request->q}%")->orWhereTranslationLike('description', "%{$request->q}%")
                ->orWhereHas('faqCategory', function ($q) use ($request) {
                    $q->filter($request);
                });
        }
        $query = request('query');
        if (isset($query['generalSearch'])) {
            $q->whereTranslationLike('title', "%{$query['generalSearch']}%")->orWhereTranslationLike('description', "%{$query['generalSearch']}%")
                ->orWhereHas('faqCategory', function ($q) use ($request) {
                    $q->filter($request);
                });
        }
    }

    public function scopeActive($q)
    {
        return $q->where('is_active', 1);
    }

    public function faqCategory()
    {
        return $this->belongsTo(FaqCategory::class);
    }

}
