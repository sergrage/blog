<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;
use App\Models\Tag; 
use App\Models\Comment; 
use App\Models\Image; 

class Post extends Model
{
    use Sluggable;

     public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    protected $fillable = [
        'title', 'body', 'public' , 'views', 'image', 'imageAlt', 'textPreview'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function hasTags()
    {
        return $this->tags->isNotEmpty();
    }

    public function createdAtForHumans()
    {
        return $this->created_at->diffForHumans();
    }

    public function showDay()
    {
        return $this->created_at->isoFormat('D');
    }

    public function showMonth()
    {
        return $this->created_at->isoFormat('MMMM');
    }

    public function checked()
    {
        return $this->public=='on' ? 'checked': '';
    }

    public function html_cut($text, $max_length)
    {
        $tags   = array();
        $result = "";

        $is_open   = false;
        $grab_open = false;
        $is_close  = false;
        $in_double_quotes = false;
        $in_single_quotes = false;
        $tag = "";

        $i = 0;
        $stripped = 0;

        $stripped_text = strip_tags($text);

        while ($i < strlen($text) && $stripped < strlen($stripped_text) && $stripped < $max_length)
        {
            $symbol  = $text{$i};
            $result .= $symbol;

            switch ($symbol)
            {
               case '<':
                    $is_open   = true;
                    $grab_open = true;
                    break;

               case '"':
                   if ($in_double_quotes)
                       $in_double_quotes = false;
                   else
                       $in_double_quotes = true;

                break;

                case "'":
                  if ($in_single_quotes)
                      $in_single_quotes = false;
                  else
                      $in_single_quotes = true;

                break;

                case '/':
                    if ($is_open && !$in_double_quotes && !$in_single_quotes)
                    {
                        $is_close  = true;
                        $is_open   = false;
                        $grab_open = false;
                    }

                    break;

                case ' ':
                    if ($is_open)
                        $grab_open = false;
                    else
                        $stripped++;

                    break;

                case '>':
                    if ($is_open)
                    {
                        $is_open   = false;
                        $grab_open = false;
                        array_push($tags, $tag);
                        $tag = "";
                    }
                    else if ($is_close)
                    {
                        $is_close = false;
                        array_pop($tags);
                        $tag = "";
                    }

                    break;

                default:
                    if ($grab_open || $is_close)
                        $tag .= $symbol;

                    if (!$is_open && !$is_close)
                        $stripped++;
            }

            $i++;
        }

        while ($tags)
            $result .= "</".array_pop($tags).">";

        return $result;
    }

    public function addBootstrap ($value)
    {
        $str = str_replace('<img', "<img class='img-fluid' ", $value);
        // $str = str_replace('<ul', "<ul class='list-group' ", $str);
        // $str = str_replace('<ol', "<ol class='list-group' ", $str);
        // $str = str_replace('<li', "<li class='list-group-item' ", $str);
        $str = str_replace('<table', "<table class='table' ", $str);

        return $str;
    }

    public function previewbody($text)
    {
        return $this->addBootstrap($this->html_cut($text, 550));
    }

    public function commentsCount()
    {
        return $this->comments->count();
    }

    public function commentsProvenCount()
    {
        return $this->comments->where('status', 'active')->count();
    }

    public function delete()    
    {
        DB::transaction(function() 
        {
            $this->images()->delete();
            parent::delete();
        });
    }
}
