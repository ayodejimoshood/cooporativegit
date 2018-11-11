<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'contributions';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'contribution_id';


    protected $fillable = [
        'contribution_id', 
        'user_id', 
        'period_id', 
        'contribution_amount', 
        'total_payment', 
        'balance_payment', 
    ];

    
    public function members (){
        return $this->hasMany('App\Member');
    } 

    public function user (){
        return $this->belongsTo('App\User');
    }


}
