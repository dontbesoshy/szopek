<?php

namespace App\Http\Dto\Book;

use Illuminate\Http\UploadedFile;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class UpdateBookDto extends Data
{
    #[Max(3000)]
    public UploadedFile $file;
}
