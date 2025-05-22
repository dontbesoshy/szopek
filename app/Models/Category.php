<?php

namespace App\Models;

use App\Models\Scopes\ActiveCategoryScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy(ActiveCategoryScope::class)]
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'popularity',
    ];
}
