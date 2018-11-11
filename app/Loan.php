<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'loans';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'loan_id';


    protected $fillable = [
        'user_id', 
        'loan_amount', 
        'monthly_payment', 
        'interest', 
        'total_payment', 
        'start_date', 
        'end_date', 
    ];

    
    public function user (){
        return $this->belongsTo('App\User');
    } 

    public function approvals (){
        return $this->hasMany ('App\Approval');
    } 

    public function comments (){
        return $this->hasMany('App\Comment');
    } 

    public function repayments (){
        return $this->hasMany('App\Repayment');
    }

    public function stage (){
        return $this->belongsTo('App\Stage');
    } 

    /*public function user (){
        return $this->belongsTo('App\Member');
    }*/


}
