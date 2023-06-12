<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\user;

// $user = new User;
// $user->name = 'Admin Admin';
// $user->email = 'admin';
// $user->password = bcrypt('admin1234');
// $user->role = 'admin';
// $user->save();

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
