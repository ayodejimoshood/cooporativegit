<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Cooporative;
use App\Contribution;
use App\Member;
use App\User;
use App\Loan;
use App\Approval;
use Illuminate\Http\Request;
use App\Http\Requests\createMemberForm;
use App\Http\Requests\doLoan;


class UserController extends Controller
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
    public function index(){

        $title = 'Cooperative Management System | Staco Insurance | ERP';
        $users = User::all();
        //dd($cooperatives);

        $data = [
            'title' => $title,
            'users' => $user,s
        ];

        return view('admin.users', $data);
    }

    public function viewMembers ($cooporative_id){
        $cooporatives = Cooporative::where('cooporative_id', $cooporative_id)->first();

        if (count($cooporatives) == 0){
            return redirect::back()->with('flash_error', 'Invalid Cooporative Information. Kindly, contact the Administrator!!');
        }
        //dd($cooporatives);

        $members = $cooporatives->members;
        //dd($cooperatives);

        $title = $cooporatives->cooporative_name.' Members';

        $data = [
            'title' => $title,
            'members' => $members,
        ];

        return view('admin.members', $data);

    }

    public function create (){
        
        $title = 'Cooperative Management System | Create User | ERP';
        //$cooporatives = Cooporative::all();

        $data = [
            'title' => $title,
            //'cooporatives' => $cooporatives,
        ];

        return view('admin.createuser', $data);
    }

    public function viewCooporative ($cooporative_id){

    }

    public function doCreate (createMemberForm $requests){
       
        $member = New Member;
            $member->firstname = $requests['firstname'];
            $member->lastname = $requests['lastname'];
            $member->gender = $requests['gender'];
            $member->email = $requests['email'];
            $member->telephone = $requests['telephone_number'];
            $member->address = $requests['address'];
            $member->cooporative_id = $requests['cooperative'];
            $member->next_of_kin_name = $requests['next_of_kin_name'];
            $member->next_of_kin_number = $requests['next_of_kin_number'];
            $member->next_of_kin_address = $requests['next_of_kin_address'];
            $member->next_of_kin_email = $requests['next_of_kin_email'];
        $member->save();

        return \Redirect::back()->with('message', 'Member account has been successfully created!');
    }

    public function payments () {


        $user = \Auth::user();

        $contributions = $user->contributions;

        //dd($user);
        //dd($contributions);

        $data = [
            'title' => 'User Contributions',
            'contributions' => $contributions,
        ];

        return view('admin.payments', $data);


    } 

    public function loans () {


        $user = \Auth::user();

        $loans = $user->loans;

        //dd($user);
        //dd($contributions);

        $data = [
            'title' => 'User Loans',
            'loans' => $loans,
        ];

        return view('admin.loans', $data);


    }

    public function loan (){
        
        $title = 'Loan application';

        $member = \Auth::user();

        if(count($member) == 0){
            return 'Invalid member ID | some error page!';
        }

        $data = [
            'title' => $title,
            'member' => $member,
        ];

        return view('admin.loan', $data);

    }

     public function doLoan (doLoan $requests){
        //dd($requests['member_id']);


        
           $loan = New Loan;
                $loan->user_id = $requests['member_id'];
                $loan->loan_amount = $requests['loan_amount'];
                $loan->interest = 0.05;
                $loan->monthly_payment = (($requests['loan_amount'] * 0.05) +  $requests['loan_amount'])/$requests['payment_duration'];
                $loan->total_payment = $requests['loan_amount'] * 0.05 + $requests['loan_amount'];
                $loan->duration = $requests['payment_duration'];
                $loan->payment_status = 1;
                $loan->stage_id = 1;
            $loan->save();

            $approvalExist = Approval::where('loan_id', $loan->loan_id)->where('stage_id', 1)->first();

            if (count($approvalExist) == 0){
                $approval = New Approval;
                    $approval->stage_id = 1;
                    $approval->loan_id = $loan->loan_id;
                $approval->save();

            }

            return \Redirect::back()->with('message', 'Loan application sent!');

    }
}
