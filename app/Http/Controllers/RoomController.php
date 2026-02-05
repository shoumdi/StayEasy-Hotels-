<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Propreties;
use App\Models\Room;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = DB::table('rooms')
        ->join('categories', 'rooms.category_id', '=', 'categories.id')
        ->join('propreties', 'rooms.proprety_id', '=', 'propreties.id') 
        ->join('tags', 'rooms.tag_id', '=', 'tags.id') 
        ->select('rooms.id',
                            'rooms.name',
                            'rooms.price',
                            'rooms.status',
                            'rooms.capacity',
                            'rooms.images',
                            'categories.name as category',
                            'tags.name as Tag',
                            'propreties.name as property')
        ->orderBy('rooms.created_at', 'desc')->paginate(15);
        return view('room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $propreties = Propreties::getProperties();
        $tags = Tag::getTags();
        $categories = Categories::getCategories();
        // dd($categories);
        return view('room.add', compact('propreties', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string',
            'status'      => 'nullable|string',
            'capacity'    => 'nullable|integer',
            'category_id' => 'required',
            'images'       => 'required|image|file',
            'tag_id'      => 'required',
            'proprety_id' => 'required',
            'price'       => 'required|numeric'
        ]);
        if ($request->hasFile('images')) {
            $validated['images'] = $request->file('images')->store('images', 'public');
        }
        Room::create($validated);
        return redirect()->route('room.index')
                        ->with('success', 'Room created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = DB::table('rooms')
        ->join('categories', 'rooms.category_id', '=', 'categories.id')
        ->join('propreties', 'rooms.proprety_id', '=', 'propreties.id') 
        ->join('tags', 'rooms.tag_id', '=', 'tags.id') 
        ->select('rooms.*',
                        'categories.name as category',
                        'tags.name as Tag',
                        'propreties.name as property'
                        )
        ->where('rooms.id', $id)->first();
        // dd($room);
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
            'category_id' => 'required',
            'images'       => 'required|image|file',
            'tag_id'      => 'required',
            'proprety_id' => 'required',
            'price'       => 'required|numeric'
        ]);
        $validated['completed'] = $request->has('completed');
        $room = Room::find($id);
        $room->update($validated);
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
