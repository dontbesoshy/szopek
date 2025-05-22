<?php

namespace App\Http\Controllers;

use App\Models\Attribute;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();
        return view('attributes.index', compact('attributes'));
    }

    public function edit(Attribute $attribute)
    {
        return view('attributes.edit', compact('attribute'));
    }
}
