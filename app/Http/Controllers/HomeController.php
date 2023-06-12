<?php

namespace App\Http\Controllers;


use App\Models\cases;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cases = cases::all();
        $allCase = DB::table('cases')->count();

        $pend = DB::table('cases')
        ->select('*')
        ->where('status', '=', 'pending')
        ->count();

        $invited = DB::table('cases')
            ->select('*')
            ->where('status', '=', 'invite')
            ->count();
        $expelled = DB::table('cases')
            ->select('*')
            ->where('status', '=', 'expel')
            ->count();
        $suspension = DB::table('cases')
            ->select('*')
            ->where('status', '=', 'suspension')
            ->count();
        $cleared = DB::table('cases')
            ->select('*')
            ->where('status', '=', 'cleared')
            ->count();   

        $resolved = $expelled + $suspension + $cleared;
        $pending = $invited + $pend;

        $recent = DB::table('cases')->whereDate('created_at', DB::raw('CURDATE()'))->count();

        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();
        $latest = DB::table('cases')->whereBetween('created_at', [$startDate, $endDate])->get();

        if ($latest->isEmpty()) {
            $message = "No Latest case record found.";
            } else {
                $message = "";
            }        

        return view('home', compact('cases', 'allCase', 'resolved', 'recent', 'pending' , 'latest', 'message'));
    }
}
