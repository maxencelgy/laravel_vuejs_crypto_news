<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guide extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
    }


    public static function getArticlesLiked()
    {

        $likes = Like::where('userId', auth()->user()->id)->get();

        $articles = [];
        foreach ($likes as $like) {
            $articles[] = Guide::where('id', $like->guideId)->first();
        }

        return $articles;
    }



    public function getCategory()
    {
        return Category::where('id', $this->categoryId)->first()->title;
    }

//    public function contacts()
//    {
//        return $this->hasMany(Contact::class);
//    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }

    public function isLiked()
    {
        if (Like::where('userId', auth()->user()->id)->where('guide_id', $this->id)) {
            return 'like';
        } else {
            return 'pas like';
        }
    }


}
