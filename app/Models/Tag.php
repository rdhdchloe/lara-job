<?php

namespace App\Models;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public static function getTagIds($tagNames)
    {
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            $tagName = trim(strtolower($tagName));
            $tag = self::firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }
        return $tagIds;
    }

    public function listings()
    {
        return $this->belongsToMany(Listing::class);
    }
}
