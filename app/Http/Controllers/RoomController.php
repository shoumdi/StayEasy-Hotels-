<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Propreties;
use App\Models\Room;
use App\Models\Tag;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        $propreties = Propreties::all();
        $rooms = Room::with(['tag', 'propreties', 'categories'])->orderByDesc('id')->get();
        // dd($rooms[0]);   
        return view('room.index', compact('rooms', 'tags', 'propreties'));
    }

    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propreties = Propreties::getProperties();
        $tags = Tag::getTags();
        $categories = Categories::getCategories();
        return view('room.add', compact('propreties', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $validated = $request->validate([
            'name'        => 'required|string',
            'status'      => 'nullable|string',
            'capacity'    => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
            'images'      => 'file|max:20480',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'propreties'  => 'array',
            'propreties.*'=> 'required|exists:propreties,id',
            'price'       => 'required|numeric'
        ]);
        $room = Room::create([
            'name'        => $validated['name'],
            'status'      => $validated['status'] ?? null,
            'capacity'    => $validated['capacity'] ?? null,
            'category_id' => $validated['category_id'],
            'price'       => $validated['price'],
        ]);
        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('rooms', 'public');
            $room->update(['images' => $path]);
        }
        $room->tag()->sync($request->tags);
        $room->propreties()->sync($request->propreties);
        return redirect()->route('room.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $roomArr = Room::with(['tag', 'propreties', 'categories'])->where('id', $id)->limit(1)->get();
        $room = $roomArr[0];
        // dd($room->tag[0]->name);
        return view('room.show', compact('room'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $room = Room::with(['tag', 'categories', 'propreties'])->where('rooms.id', $id)->first();
        $propreties = Propreties::getProperties();
        $tags = Tag::getTags();
        $categories = Categories::getCategories();
        return view('room.edit', compact('propreties', 'categories', 'tags', 'room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'        => 'required|string',
            'status'      => 'nullable|string',
            'capacity'    => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
            'images'      => 'file|max:20480',
            'tags'        => 'nullable|array',
            'tags.*'      => 'exists:tags,id',
            'propreties'  => 'array',
            'propreties.*'=> 'required|exists:propreties,id',
            'price'       => 'required|numeric'
        ]);
        $validated['completed'] = $request->has('completed');
        $room = Room::find($id);
        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('rooms', 'public');
            $room->update(['images' => $path]);
        }
        $room->update($validated);
        $room->tag()->sync($request->tags);
        $room->propreties()->sync($request->propreties);
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('room.index');
    }
}
