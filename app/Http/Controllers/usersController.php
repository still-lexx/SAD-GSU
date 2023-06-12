<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user;


class usersController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('users')
            ->select('*')
            ->where('role', '=', 'user')
            ->orderBy('name', 'desc')
            ->get();
        return view('pages.users', compact('users'));
    }

    public function destroy($id)
    {
        user::where('id', $id)->delete();
        return redirect()->back()->with('status',"successfully Deleted");
    }

}
