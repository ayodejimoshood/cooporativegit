<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Cooporative;
use App\Member;
use App\User;
use App\Period;
use App\Approval;
use App\Contribution;
use App\Loan;
use App\Repayment;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\createMemberForm;
use App\Http\Requests\makePayment;
use App\Http\Requests\doLoan;
use App\Http\Requests\editMember;
use App\Http\Requests\loanComment;
use App\Http\Requests\resetPassword;
use App\Http\Requests\disbursementForm;
use App\Http\Requests\repayLoan;

class MemberController extends Controller
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
        $members = User::all();
       //dd($members);
        //dd($cooperatives);

        $data = [
            'title' => $title,
            'members' => $members,
        ];

        return view('admin.members', $data);
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

    public function viewMember ($member_id){
        $member = User::where('user_id', $member_id)->first();

        $currentUser = \Auth::user();

        if (count($member) == 0){
            return Redirect::back()->with('flash_error', 'Invalid Member Information. Kindly, contact the Administrator!!');
        }

        $contributions = Contribution::where('user_id', $member_id)->get();

        $title = 'Members Information';

        $data = [
            'title' => $title,
            'member' => $member,
            //'currentUser' => $currentUser,
            'contributions' => $contributions,
        ];

        return view('admin.member', $data);

    }


    public function create (){
        
        $title = 'Cooperative Management System | Create Member | ERP';
        $cooporatives = Cooporative::all();

        $data = [
            'title' => $title,
            'cooporatives' => $cooporatives,
        ];

        return view('admin.createmember', $data);
    }

    public function viewCooporative ($cooporative_id){

    }

    public function doCreate (createMemberForm $requests){

        $user_id = "COR".date('U');
       
        $member = New User;
            $member->user_id = $user_id;
            $member->firstname = $requests['firstname'];
            $member->lastname = $requests['lastname'];
            $member->gender = $requests['gender'];
            $member->email = $requests['email'];
            $member->password = \Hash::make($requests['password']);
            $member->privilege_id = $requests['user_type'];
            $member->employment_category = $requests['employment_category'];
            $member->grade_level_id = $requests['grade_level'];
            $member->telephone = $requests['telephone_number'];
            $member->address = $requests['address'];
            $member->bank_name = $requests['bank_name'];
            $member->account_number = $requests['account_number'];
            //$member->cooporative_id = $requests['cooperative'];
            $member->next_of_kin_name = $requests['next_of_kin_name'];
            $member->next_of_kin_number = $requests['next_of_kin_number'];
            $member->next_of_kin_address = $requests['next_of_kin_address'];
            $member->next_of_kin_email = $requests['next_of_kin_email'];
        $member->save();

        /*$member = New Member;
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
        $member->save();*/

        return \Redirect::back()->with('message', 'Member account has been successfully created!');
    }

    public function payment ($member_id){
        $title = 'Make payment';

        $member = User::where('user_id', $member_id)->first();

        if(count($member) == 0){
            return 'Invalid member ID | some error page!';
        }

        $data = [
            'title' => $title,
            'member' => $member,
        ];

        return view('admin.fund', $data);

    } 


    public function doPayment (makePayment $requests){
        //dd($requests['member_id']);


        $member = User::where('user_id', $requests['member_id'])->first();

        if (count($member) == 0){
            return "Invalid member ID | Error!";
        }


        if ($requests->hasFile('deposit_slip')){
            $deposit_slip = 'payments/contributions/'.$member->firstname.'_'.$member->lastname.'_'.time().'.'.$requests->deposit_slip->getClientOriginalExtension();
            $requests->deposit_slip->move(public_path('payments/contributions'), $deposit_slip);
        //dd($passport);
        } else {
            $deposit_slip = '';
        } 
        
            //CALCULATE FOR MONTHLY CONTRIBUTION
            $contribution = New Contribution;
                $contribution->user_id = $requests['member_id'];
                $contribution->contribution_amount = $requests['payment_amount'];
                $contribution->evidence = $deposit_slip;
            $contribution->save();

            return \Redirect::back()->with('message', 'Monthly Contribution Has been successfully made!');

    }

    /*public function getMonthName ($month) {
        $monthName = '';

        if ($month == 01){
            $monthName = 'January '.$month;
        }  elseif ($month == 02) {
            $monthName = 'February '.$month;
        }elseif ($month == 03) {
            $monthName = 'March '.$month;
        }elseif ($month == 04) {
            $monthName = 'April '.$month;
        }elseif ($month == 05) {
            $monthName = 'May '.$month;
        }elseif ($month == 06) {
            $monthName = 'June '.$month;
        }elseif ($month == 07) {
            $monthName = 'July '.$month;
        }elseif ($month == 08) {
            $monthName = 'August '.$month;
        }elseif ($month == 09) {
            $monthName = 'September '.$month;
        }elseif ($month == 10) {
            $monthName = 'October '.$month;
        }elseif ($month == 11) {
            $monthName = 'November '.$month;
        }elseif ($month == 12) {
            $monthName = 'December '.$month;
        }

        return $monthName;
    }*/

    public function loan ($member_id){
        $title = 'Loan application';

        $member = User::where('user_id', $member_id)->first();

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
                $loan->monthly_payment = $requests['loan_amount']/$requests['payment_duration'];
            $loan->save();

            return \Redirect::back()->with('message', 'Loan application sent!');

    }

    public function edit ($member_id){
        $title = 'Edit Member details';

        $member = User::where('user_id', $member_id)->first();

        if(count($member) == 0){
            return 'Invalid member ID | some error page!';
        }

        $data = [
            'title' => $title,
            'member' => $member,
        ];

        return view('admin.editmember', $data);

    }



    public function doEdit (editMember $requests){
        
        //CALCULATE FOR MONTHLY CONTRIBUTION
        $member = User::where('user_id', $requests['member_id'])->first();
        if (count($member) == 0){
            return "Invalid Member ID";
        }

                $member->firstname = $requests['firstname'];
                $member->lastname = $requests['lastname'];
                $member->gender = $requests['gender'];
                $member->privilege_id = $requests['user_type'];
                $member->employment_category = $requests['employment_category'];
                $member->grade_level_id = $requests['grade_level'];
                $member->telephone = $requests['telephone_number'];
                $member->address = $requests['address'];
                $member->bank_name = $requests['bank_name'];
                $member->account_number = $requests['account_number'];
                //$member->cooporative_id = $requests['cooperative'];
                $member->next_of_kin_name = $requests['next_of_kin_name'];
                $member->next_of_kin_number = $requests['next_of_kin_number'];
                $member->next_of_kin_address = $requests['next_of_kin_address'];
                $member->next_of_kin_email = $requests['next_of_kin_email'];
            $member->save();

        return \Redirect::back()->with('message', 'Changes was successfully made!');

    }


    public function loans (){

        $title = 'Loan Approval';

        $userPrivilege = \Auth::user()->privilege_id;

        if ($userPrivilege == 2){
            //$loans = Loan::where();
            $loans = Approval::where('approval_state', 0)->where('stage_id', 1)->get();
        } elseif ($userPrivilege > 3){
            //$loans = Loan::where();
            $loans = Approval::where('approval_state', 0)->where('stage_id', 2)->get();
        } elseif ($userPrivilege == 3){           
            //$loans = Loan::where();
            $loans = Approval::where('approval_state', '=', 0)->where('stage_id', 3)->orWhere('stage_id', 4)->get();
        }

        //dd($loans);

        $data = [
            'title' => $title,
            'loans' => $loans,
        ];

        return view('admin.approveloans', $data);

    }
  
    public function loanTreated (){

        $title = 'Loan Treated By Me';

        $userPrivilege = \Auth::user()->privilege_id;
        //dd($userPrivilege);

        /*if ($userPrivilege == 2){
            //$loans = Loan::where();
            $loans = Approval::where('stage_id', 1)->where('approval_state', '!=', 0)->get();
        } elseif ($userPrivilege > 3){
            //$loans = Loan::where();
            $loans = Approval::where('stage_id', 2)->where('approval_state', '!=', 0)->get();
        } elseif ($userPrivilege == 3){           
            //$loans = Loan::where();
            $loans = Approval::where('stage_id', 3)->orWhere('stage_id', 4)->where('approval_state', '!=', 0)->get();
        }*/

        $loans = Approval::where('user_id', \Auth::user()->user_id)->where('approval_state', '!=', 0)->get();
        
        $data = [
            'title' => $title,
            'loans' => $loans,
        ];

        return view('admin.approvedloans', $data);

    }


    public function approveLoan ($approval_id){

        //dd($approval_id);

        //$loan = Loan::where('loan_id', $loan_id)->first();
        $loan = Approval::where('approval_id', $approval_id)->first();

        //dd($loan);

        if (count($loan) == 0){
            return "Invalid Loan Transaction ID | Error!!!";
        }

        //dd($loan->approvals->orderBy(''));

        $title = 'Loan Application Details';


        $data = [
            'title' => $title,
            'loan' => $loan,
        ];

        return view('admin.viewloan', $data);

    }


     public function loanComment (loanComment $requests){
        
        $comment = New Comment;
                $comment->user_id = \Auth::user()->user_id;
                $comment->loan_id = $requests['loan_id'];
                $comment->stage_id = $requests['stage_id'];
                $comment->comment = $requests['comment'];
            $comment->save();

        return \Redirect::back()->with('message', 'Comment has been placed!');

    }

    public function approveStageLoan ($loan_id, $stage_id){

        $approval = Approval::where('loan_id', $loan_id)->where('stage_id', $stage_id)->first();
            $approval->user_id = \Auth::user()->user_id;
            $approval->approval_state = 1;
        $approval->save();

        //dd($approval);
        $next_stage =  $stage_id + 1;
        //Pass to the next in line for approval
        $approvalExist = Approval::where('loan_id', $loan_id)->where('stage_id', $next_stage)->first();

        if (count($approvalExist) == 0){
            $approval = New Approval;
                $approval->stage_id = $next_stage;
                $approval->loan_id = $loan_id;
            $approval->save();
        }

        return \Redirect::to('/loans/treated')->with('message', 'Loan Approved!');

    }


    public function denyStageLoan ($loan_id, $stage_id){

        $approval = Approval::where('loan_id', $loan_id)->where('stage_id', $stage_id)->first();
            $approval->user_id = \Auth::user()->user_id;
            $approval->approval_state = 2;
        $approval->save();


        return \Redirect::to('/loans/treated')->with('message', 'Loan Approved!');

    }


    public function changePassword (){

       
        //dd($loan->approvals->orderBy(''));

        $title = 'Change Password';


        $data = [
            'title' => $title,
        ];


        return view('admin.changepassword', $data);
    }    

    public function doChangePassword (resetPassword $requests){

        //dd('here');

        $user_id = \Auth::user()->user_id;

        $user = User::where('user_id', $user_id)->first();

        if (count($user) == 0){

            return "Invalid user details | Error!";
        }

        $user->password = \Hash::make($requests['password']);
        $user->save();

        return \Redirect::back()->with('message', 'Password was successfully changeed!!');

    }

    public function disbursement ($loan_id, $stage_id){

       //dd($stage_id);

        $loan = Approval::where('loan_id', $loan_id)->where('stage_id', $stage_id)->first();

        if (count($loan) == 0){
            return 'Invalin Loan ID | Error!';
        }

        //dd($loan);


        $title = 'Disburse Loan';


        $data = [
            'title' => $title,
            'loan' => $loan,
        ];


        return view('admin.disbursement', $data);
    }

    public function doDisbursement (disbursementForm $requests) {

        $disbursement_date = $requests['year'].'/'.$requests['month'].'/'.$requests['day'];
        
        //dd($disbursement_date);

        $approval = Approval::where('approval_id', $requests['approval_id'])->first();
        
        //dd($approval->loan);

            $approval->user_id = \Auth::user()->user_id;
            $approval->approval_state = 1;
        $approval->save();

        //INITIALIZE TOTAL AMOUNT PAID
        $total_paid = $approval->loan->monthly_payment;


        //LOOP THROUGH TABLE TO INCLUDE ALL REPAYMENTS
        for ($c=1; $c<$approval->loan->duration +1; $c++){
            $repayments = New Repayment;
                $repayments->loan_id = $approval->loan->loan_id;
                $repayments->repayment_amount = $approval->loan->monthly_payment;
                $repayments->loan_balance = $approval->loan->total_payment - $total_paid;
            $repayments->save();

            $total_paid += $approval->loan->monthly_payment;
        }

            //UPDATE LOAN TO INCLUDE DISBURSEMENT DATE
            $loan = Loan::where('loan_id', $approval->loan->loan_id)->first();
                $loan->disbursement_date = $disbursement_date;
            $loan->save();

        return \Redirect::to('/loans/treated')->with('message', 'Loan Approved!');
    }

    public function loanRepayment ($loan_id){
        
        $title = 'Make Loan Repayment';

        $loan = Loan::where('loan_id', $loan_id)->first();

        if(count($loan) == 0){
            return 'Invalid loan ID | some error page!';
        }

        $data = [
            'title' => $title,
            'member' => $loan->user,
            'loan' => $loan,
        ];

        return view('admin.loanrepayment', $data);

    }

    public function doRepayment (repayLoan $requests) {

        $member = User::where('user_id', $requests['member_id'])->first();

        if (count($member) == 0){
            return "Invalid member ID | Error!";
        }

        $repayments = Repayment::where('loan_id', $requests['loan_id'])->where('payment_status', 0)->first();

        if (count($repayments) == 0){
            return "I think loan has been completely paid off. Kindly verify this with accountant!";
        }

        if ($requests->hasFile('deposit_slip')){
            $deposit_slip = 'payments/repayments/'.$member->firstname.'_'.$member->lastname.'_'.time().'.'.$requests->deposit_slip->getClientOriginalExtension();
            $requests->deposit_slip->move(public_path('payments/repayments'), $deposit_slip);
        //dd($passport);
        } else {
            $deposit_slip = '';
        } 

            $repayments->payment_status = 1;
            $repayments->evidence = $deposit_slip;
        $repayments->save();

        return \Redirect::back()->with('message', 'Loan Repayment Made!');
    }
}
