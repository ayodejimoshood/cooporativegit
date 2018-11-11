<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'repayments';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'repayment_id';

    protected $fillable = [
        'loan_id', 
        'repayment_amount', 
        'payment_deadline', 
        'payment_status', 
        'loan_balance', 
        //'cooporative_status', 
    ];

    
    public function loan (){
        return $this->belongsTo('App\Loan');
    }


}
