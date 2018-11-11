<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'periods';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'period_id';


    protected $fillable = [
        'period_date', 
    ];

    
    public function members (){
        return $this->hasMany('App\Contribution');
    } 


}
