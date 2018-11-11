<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';


    protected $fillable = [
        'user_id', 
        'title', 
        'firstname', 
        'lastname', 
        'telephone', 
        'gender', 
        'employment_category', 
        'address', 
        'cooporative_id',
        'privilege_id', 
        'email', 
        'password', 
        'next_of_kin_name', 
        'next_of_kin_email', 
        'next_of_kin_number', 
        'next_of_kin_address',
        'user_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function privilege (){
        return $this->belongsTo('App\Privilege');
    }

    public function userCooporative (){
        return $this->belongsTo('App\Cooporative');
    }
    
    public function userTransactions (){
        return $this->belongsTo('App\Transaction');
    }
    
    /*
        Get all deposits by the user
    */
    public function contributions (){
        return $this->hasMany('App\Contribution');
    }

    public function loans (){
        return $this->hasMany('App\Loan');

    }

     public function approvals (){
        return $this->hasMany ('App\Approval');
    } 
}
