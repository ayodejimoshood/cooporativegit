<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'stages';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'stage_id';


    protected $fillable = [
        'stage_name',  
        'stage_status',
    ];

    
    public function approvals (){
        return $this->hasMany('App\Approval');
    }

    public function comments (){
        return $this->hasMany('App\Comment');
    }

    public function loans (){
        return $this->hasMany('App\Loan');
    }


}
