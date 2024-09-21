<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const CATEGORY_ID= 'category_id';

    protected function getCallbacks() :array
    {
        return [
            self::TITLE=>[$this, 'title'],
            self::CONTENT=>[$this, 'content'],
            self::CATEGORY_ID=>[$this, 'category_id'],
        ];
    }

    public function title(Builder $bilder, $value)
    {
      $bilder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $bilder, $value)
    {
      $bilder->where('content', 'like', "%{$value}%");
    }

    public function category_id(Builder $bilder, $value)
    {
      $bilder->where('category_id', 'like', $value);
    }
}