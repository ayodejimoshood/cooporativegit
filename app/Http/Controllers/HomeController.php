<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Loan;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;

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
        

        $title = 'Cooperative Management System | Staco Insurance | ERP';

        $user = \Auth::user();

        $totalContributions = Contribution::sum('contribution_amount');
        
        $totalLoan = Loan::where('payment_status', 0)->sum('loan_amount');

        $myContributions = Contribution::where('user_id', $user->user_id)->sum('contribution_amount');
        
        $myLoan = Loan::where('user_id', $user->user_id)->where('payment_status', 0)->sum('loan_amount');

        $data = [
            'title' => $title,
            'myContributions' => $myContributions,
            'totalContributions' => $totalContributions,
            'totalLoan' => $totalLoan,
            'myLoan' => $myLoan,
            'users' => User::all(),
        ];

        return view('admin.home', $data);
    }
}
