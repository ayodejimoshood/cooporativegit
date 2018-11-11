<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class Privilege extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'privileges';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'privilege_id';


    protected $fillable = [
        'privilege_name', 
        'privilege_status', 
    ];

    
    public function users (){
        return $this->hasMany('App\User');
    }

}
