<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = array(
        "body",
        "author_id",
        "title",
        "excerpt",
        "image",
        "slug",
        "meta_description",
        "meta_keywords",
        "status",
        "use_title_as_heading",
        "updated_at",
    );


    /**
     * Check if slug exists or not
     *
     * @param string $slug
     * @return object \App\Page
     */
    public static function checkSlugExists($slug)
    {
        return self::where('slug', $slug)->first();
    }
}
