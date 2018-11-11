<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Approval;

class GlobalComposer {

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        if (Auth::check()){
            $userPrivilege = \Auth::user()->privilege_id;
        //$userPrivilege = 2;
        //dd($userPrivilege);
              $toploans = array();
              
              if ($userPrivilege == 2){
            //$loans = Loan::where();
                  $toploans = Approval::where('approval_state', 0)->where('stage_id', 1)->get();
              } elseif ($userPrivilege > 3){
                  //$loans = Loan::where();
                  $toploans = Approval::where('approval_state', 0)->where('stage_id', 2)->get();
              } elseif ($userPrivilege == 3){           
                  //$loans = Loan::where();
                  $toploans = Approval::where('approval_state', '=', 0)->where('stage_id', 3)->orWhere('stage_id', 4)->get();
              } 

              //view::share('toploans', $toploans);
              //view()->share('toploans', $toploans);
              $currentUser = Auth::user();

              //dd($currentUser);
              $data = [
                'toploans' => $toploans,
                'currentUser' => $currentUser,
              ];
              

            $view->with('toploans', $toploans, 'currentUser', $currentUser);
        } 
        
        
    }

}