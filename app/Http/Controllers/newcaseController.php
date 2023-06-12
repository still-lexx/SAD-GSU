<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cases;

class newcaseController extends Controller
{
    //
    public function index()
    {
        return view('pages.newcase');
    }

    public function store(Request $request)
    {
        $randNum1 = rand(000 , 555);
        $randNum2 = rand(556 , 999);

        $rands = $randNum1. ' '.$randNum2;

        // $staffData->phone_number = $request->phone;
        $cases = new cases();
        $cases -> case_id = $rands;
        $cases -> reg_num = $request -> reg;
        $cases -> name = $request -> name;
        $cases -> department = $request -> dept;
        $cases -> level = $request -> level;
        $cases -> caseDesc = $request -> description;
        $cases -> statement = $request -> statement;

        $cases ->save();
        return redirect('/case')->with('success','Saved Successfully');
    }
}
