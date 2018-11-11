<?php namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Cooporative extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'cooporatives';
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'cooporative_id';


    protected $fillable = [
        'cooporative_name', 
        'cooporative_desc', 
        'lga_id', 
        'contact_name', 
        'contact_number', 
        'contact_email', 
        'cooporative_status', 
    ];

    
    public function members (){
        return $this->hasMany('App\Member');
    }

    public function cooporativeLGA (){
        return $this->belongsTo('App\Lga');
    }

}
