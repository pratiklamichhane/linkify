<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Models\Category;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Link::where('user_id', auth()->user()->id)->get();

        $links->map(function($link){
            $link->remaining_days = $link->reminder_duration - now()->diffInDays($link->created_at);
            $link->remaining_days = intval($link->remaining_days);
        });
        return view('links.index' , compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return view('links.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'reminder_duration' => 'required|integer'
        ]);
        $validated['user_id'] = auth()->user()->id;
        Link::create($validated);
        return redirect()->route('links.index')->with('success', 'Link created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        return view('links.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return view('links.edit' , compact('link', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {
        $validated = $request->validate([
            'category_id' => 'required|integer|exists:categories,id',
            'title' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'reminder_duration' => 'required|integer'
        ]);
        $link->update($validated);
        return redirect()->route('links.index')->with('success', 'Link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('links.index')->with('success', 'Link deleted successfully');
    }
}