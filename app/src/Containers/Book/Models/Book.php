<?php

namespace LargeLaravel\Containers\Book\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'title',
        'original_title',
        'author_id',
        'description',
        'image_guid',
        'cover_type_id',
        'num_of_pages',
        'publish_date',
        'publisher_id',
        'ISBN',
        'edition',
    ];
    protected $casts = [
        'author_id' => 'integer',
        'cover_type_id' => 'integer',
        'num_of_pages' => 'integer',
        'publisher_id' => 'integer',
    ];
}
