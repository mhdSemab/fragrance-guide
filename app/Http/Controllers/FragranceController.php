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
        $filterBrand = $request->input('brand');
        $filterScent = $request->input('scent_type');
        $filterMinPrice = $request->input('min_price');
        $filterMaxPrice = $request->input('max_price');

        $brands = Fragrance::select('brand')->distinct()->get();
        $scentTypes = Fragrance::select('scent_type')->distinct()->get();

        $minAvailablePrice = Fragrance::min('price');
        $maxAvailablePrice = Fragrance::max('price');

        $fragrances = Fragrance::when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })
            ->when($filterBrand, function ($query, $filterBrand) {
                return $query->where('brand', $filterBrand);
            })
            ->when($filterScent, function ($query, $filterScent) {
                return $query->where('scent_type', $filterScent);
            })
            ->when($filterMinPrice, function ($query, $filterMinPrice) {
                return $query->where('price', '>=', $filterMinPrice);
            })
            ->when($filterMaxPrice, function ($query, $filterMaxPrice) {
                return $query->where('price', '<=', $filterMaxPrice);
            })
            ->paginate(10);

        return view('fragrances.index', compact('fragrances', 'brands', 'scentTypes', 'minAvailablePrice', 'maxAvailablePrice'));
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
