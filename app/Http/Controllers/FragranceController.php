<?php

// app/Http/Controllers/FragranceController.php
namespace App\Http\Controllers;

use App\Models\Fragrance;
use Illuminate\Http\Request;

class FragranceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $fragrances = Fragrance::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%') ->orWhere('description', 'like', '%' . $search . '%');
        })->paginate(10);
        return view('fragrances.index', compact('fragrances'));
    }

    public function create()
    {
        return view('fragrances.create');
    }

    public function about()
    {
        return view('fragrances.about');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'scent_type' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Fragrance::create($request->all());
        return redirect()->route('fragrances.index')->with('success', 'Fragrance added successfully');
    }

    public function show(Fragrance $fragrance)
    {
        return view('fragrances.show', compact('fragrance'));
    }

    public function edit(Fragrance $fragrance)
    {
        return view('fragrances.edit', compact('fragrance'));
    }

    public function update(Request $request, Fragrance $fragrance)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'scent_type' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $fragrance->update($request->all());
        return redirect()->route('fragrances.index')->with('success', 'Fragrance updated successfully');
    }

    public function destroy(Fragrance $fragrance)
    {
        $fragrance->delete();
        return redirect()->route('fragrances.index')->with('success', 'Fragrance deleted successfully');
    }

}
