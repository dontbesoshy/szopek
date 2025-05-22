<?php

namespace App\Http\Dto\Book;

use App\Enums\BookBindingEnum;
use App\Http\Dto\Author\CreateAuthorDto;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class CreateBookDto extends Data
{
    #[Max(13)]
    public string $isbn;
    public string $title;

    public BookBindingEnum $binding;

    #[Date]
    public string $releasedAt;

    public CreateAuthorDto $author;

    #[Max(3000)]
    public UploadedFile $file;
}
