<?php

namespace LargeLaravel\Containers\Book\DTO;

use Carbon\Carbon;
use LargeLaravel\Ship\Abstracts\DTO\DataTransferObject;

class BookDTO extends DataTransferObject
{
    public int $id;
    public string $title;
    public string $original_title;
    public int $author_id;
    public string $description;
    public string $image_guid;
    public int $cover_type_id;
    public int $num_of_pages;
    public Carbon $publish_date;
    public int $publisher_id;
    public string $ISBN;
    public string $edition;
    public Carbon $created_at;
    public Carbon $updated_at;
}
