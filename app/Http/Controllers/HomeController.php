<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Survey;
use App\Models\Vote;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys_count = Survey::count();
        $polls_count = Poll::count();
        $participation_count = DB::table('votes')->groupBy('pollId')->count();
        $users_count = User::count();
        return view('home', compact('surveys_count', 'polls_count', 'participation_count', 'users_count'));
    }

    public function ps()
    {
        return view('passport_components');
    }
}
