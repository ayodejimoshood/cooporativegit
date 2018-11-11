<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'members';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'member_id';


    protected $fillable = [
        'title', 
        'firstname', 
        'lastname', 
        'telephone', 
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

    public function userPrivilege (){
        return $this->belongsTo('App\Privilege');
    } 

    public function transactions (){
        return $this->hasMany('App\Transaction');
    }

    public function cooporative (){
        return $this->belongsTo('App\Cooporative');
    }
    
    public function memberTransactions (){
        return $this->belongsTo('App\Transaction');
    }
    
    /*
        Get all deposits by the user
    */
    public function memberContributions (){
        return $this->belongsTo('App\Transaction');
    }
}
