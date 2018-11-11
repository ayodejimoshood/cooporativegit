<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'comments';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'comment_id';


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

    public function loan (){
        return $this->belongsTo ('App\Loan');
    } 

    public function stage (){
        return $this->belongsTo('App\Stage');
    }


}
