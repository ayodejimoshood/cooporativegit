<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'transactions';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'member_id', 
        'transaction_type_id', 
        'narrative', 
        'transaction_status', 
        'transaction_amount', 
        'account_balance', 
        //'cooporative_status', 
    ];

    
    public function member (){
        return $this->belongsTo('App\Member');
    }


}
