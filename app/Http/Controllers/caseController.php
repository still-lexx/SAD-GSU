<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cases;
use Illuminate\Support\Facades\DB;

class casecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = Userinfo::OrderByRaw('created_at DESC')->get();
        // return view('pages.case', compact('users'));
        // $casesCount = DB::table('cases')->select('reg_num', DB::raw('count(*) as total')) ->groupBy('reg_num')->get();
        // if($casesCount > 1) {
            $cases = cases::OrderByRaw('created_at DESC')->get();
            return view('pages.case', compact('cases'));
        // }

        return view('pages.case', compact('cases'));
    }

    public function viewCase($id)
    {
        $case = cases::find($id);
        $reg = DB::table('cases') -> select('reg_num')->where('id', '=', $id) ->get();

        $getDate = DB::table('cases') -> select('created_at')->where('id', '=', $id) ->get();

        $previous = DB::table('cases')
            ->select('*')
            ->where('reg_num', '=', $reg[0]->reg_num)
            ->where('created_at', '<', $getDate[0]->created_at)
            ->get();

        if ($previous->isEmpty()) {
            $message = "No previous case found.";
            } else {
                $message = "";
            }

        $notes = DB::table('cases') -> select('note')->where('id', '=', $id) ->get();

        if ($previous === " ") {
                $notemessage = "";
            } else {
                $notemessage = "Already Cleared";
            }


            return view('pages.view', compact('case', 'previous', 'message', 'notemessage'));
        }



    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {

        return cases::find($id);
    }


    public function update(Request $request)
    {
        //
        cases::find($request->id)->update([
            'note'=> $request->statement,
            'status'=> $request->status
        ]);
        return redirect('case')->with('success', 'Updated Successfully!');
    }


    public function destroy($id)
    {
        cases::where('id', $id)->delete();
        return redirect()->back()->with('status',"successfully Deleted");
    }
}
