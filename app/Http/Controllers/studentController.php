<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use Illuminate\Support\Facades\Hash;

class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'student']);
    }

    public function studentDashoard()
    {
        return view('pages.student.dashboard');
    }

    public function index()
    {
        $users = DB::table('users')
            ->select('*')
            ->where('role', '=', 'student')
            ->orderBy('name', 'desc')
            ->get();
        return view('pages.students', compact('users'));
    }

    public function store(Request $request) 
    {
        User::create([
            'name' => $request -> name,
            'reg_number' => $request -> reg_num,
            'email' => $request -> email,           
            'role' => 'student',
            'phone_number' => $request -> phone,
            'password' => Hash::make('12345678'),
        ]);

        return redirect('/students')->with('success','Saved Successfully');
    }
}
