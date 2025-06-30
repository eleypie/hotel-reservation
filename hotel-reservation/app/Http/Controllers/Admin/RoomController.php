<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\RoomType;
use App\Models\Room;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $roomTypes = RoomType::all();

        return view('admin.rooms.viewRooms', compact('rooms', 'roomTypes'));
    }

    public function create()
    {
        return view('admin.rooms.createRoomsType');
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_name' => 'required|unique:room_types,room_name',
            'price' => 'required|integer',
            'max_guests' => 'required|integer'
        ]);

        RoomType::create([
            'room_name' => $request->room_name,
            'price' => $request->price,
            'max_guests' => $request->max_guests
        ]);

        return redirect()->route('admin-rooms')->with('success', 'Room type created successfully.');
    }

    public function edit($id)
    {
        $roomType = RoomType::findOrFail($id);
        return view('admin.rooms.editRoomsType', compact('roomType'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_name' => 'required|unique:room_types,room_name,' . $id . ',room_type',
            'price' => 'required|numeric|min:0',
            'max_guests' => 'required|integer|min:1',
        ]);

        $roomType = RoomType::findOrFail($id);

        $roomType->room_name = $request->room_name;
        $roomType->price = $request->price;
        $roomType->max_guests = $request->max_guests;
        $roomType->save();

        return redirect()->route('admin-rooms')->with('success', 'Room Type updated successfully.');
    }

    public function destroy($id)
    {
        RoomType::destroy($id);

        return redirect()->route('admin-rooms')->with('success', 'Room type deleted successfully.');
    }


    public function createRoom()
    {
        $roomTypes = RoomType::all();
        return view('admin.rooms.createRoom', compact('roomTypes'));
    }

    public function storeRoom(Request $request)
    {
        $request->validate([
            'room_type' => 'required|exists:room_types,room_type',
            'room_id' => 'required|unique:rooms,room_id'
        ]);

        Room::create([
            'room_type' => $request->room_type,
            'room_id' => $request->room_id,
        ]);

        return redirect()->route('admin-rooms')->with('success', 'Room created.');
    }

    public function editRoom($id)
    {
        $roomTypes = RoomType::all();
        $room = Room::findOrFail($id);
        return view('admin.rooms.editRoom', compact('room', 'roomTypes'));
    }

    public function updateRoom(Request $request, Room $room)
    {
        $request->validate([
            'room_type' => 'required|exists:room_types,room_type',
            'room_id' => 'required|unique:rooms,room_id'
        ]);

        $room->room_type = $request->room_type;
        $room->id = $request->id;
        $room->save();

        return redirect()->route('admin-rooms')->with('success', 'Room updated.');
    }

    public function destroyRoom(Room $room)
    {
        $room->delete();
        return redirect()->route('admin-rooms')->with('success', 'Room deleted.');
    }
}
