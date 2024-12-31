<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index(){
    $ratings = Rating::all();
    return view('ratings.index', compact('ratings'));
}
    
    public function store(Request $request){
    $request->validate([
        'name' => 'required',
        'stars' => 'required|integer|between:1,5',
        'review' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('ratings', 'public');
    }

    Rating::create([
        'name' => $request->name,
        'stars' => $request->stars,
        'review' => $request->review,
        'image' => $imagePath,
    ]);

    return redirect()->route('redirect')->with('success', 'Rating added successfully.');
}

}
