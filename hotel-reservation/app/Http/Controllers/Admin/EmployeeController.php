<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Booking;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['role:admin']); // restricts all methods to admin role
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        $users = User::whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'User');
                })->get();
        return view('admin.dashboard', compact('roles', 'users', 'bookings'));
    }

    public function displayEmployees()
    {
        $roles = Role::all();
        $users = User::whereDoesntHave('roles', function ($query) {
                    $query->where('name', 'User');
                })->get();
        return view('admin.employees.viewEmployee', compact('roles', 'users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.employees.createEmployee', compact('roles'));
    }

    public function storeEmployee(Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);
        
        return redirect()->route('admin-employees');
    }

    public function show()
    {
        
    }

    public function edit($employee_id)
    {
        $roles = Role::all();
        $employee = User::findOrFail($employee_id);
        return view('admin.employees.editEmployee', [
            'user' => $employee,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, User $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $employee->user_id . ',user_id',
            'role'       => 'required|exists:roles,name',
            'password' => 'required|min:8',
        ]);

        $employee->first_name = $validated['first_name'];
        $employee->last_name  = $validated['last_name'];
        $employee->email      = $validated['email'];
        $employee->password      = Hash::make($request->password);

        $employee->save();
        $employee->syncRoles([$validated['role']]);

        return redirect()->route('admin-employees')->with('success', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'Record deleted successfully!');
    }


    public function getStats()
{
    $today = Carbon::today();

    $totalBookings = \App\Models\Booking::count();

    $totalRooms = \App\Models\Room::count();
    $occupiedRooms = \App\Models\Booking::where('check_in_date', '<=', $today)
                        ->where('check_out_date', '>=', $today)
                        ->count();
    $occupancyRate = $totalRooms > 0 ? round(($occupiedRooms / $totalRooms) * 100) : 0;

    $todaysRevenue = \App\Models\Booking::whereDate('created_at', $today)->sum('total_price');

    $checkInsToday = \App\Models\Booking::whereDate('check_in_date', $today)->count();

    return response()->json([
        'totalBookings' => $totalBookings,
        'occupancyRate' => $occupancyRate,
        'todaysRevenue' => $todaysRevenue,
        'checkInsToday' => $checkInsToday,
    ]);
}
}
