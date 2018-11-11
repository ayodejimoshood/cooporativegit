<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'approvals';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'approval_id';


    protected $fillable = [
        'user_id', 
        'loan_id', 
        'approval_state',
    ];

    
    public function user (){
        return $this->belongsTo('App\User');
    }

    public function loan (){
        return $this->belongsTo('App\Loan');
    }   

    public function stage (){
        return $this->belongsTo('App\Stage');
    } 
    
   

    /*public function user (){
        return $this->belongsTo('App\Member');
    }*/


}
