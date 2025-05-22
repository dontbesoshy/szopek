<?php

namespace App\Services;

use App\Http\Dto\Book\UpdateBookDto;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookService
{
    /**
     * Update a book.
     *
     * @param Book $book
     * @param UpdateBookDto $dto
     *
     * @return void
     */
    public function update(Book $book, UpdateBookDto $dto): void
    {
        DB::beginTransaction();

        try {
            $book->update([
                'filename' => $dto->file->getClientOriginalName()
            ]);

            // Tutaj zapisywanie file, ale nie ma w instrukcji gdzie zapisywać.
            // Czy local, public używając fasady Storage czy gdzieś na GCS, więc zostawiam tak
            // ale adnotuję że był tu taki zamiar.

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
