<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{
    protected $table = "agents";

    protected $fillable = ['user_id', 'name', 'fname', 'lname', 'mobile', 'address', 'email'];

    public $timestamps = true;

    // ELOQUENT RELATIONSHIP
    public function transaction() {
        return $this->hasMany('App\Models\Transactions', 'agent_id');
    }

    public function cheque() {
        return $this->hasMany('App\Models\Cheque', 'agent_id');
    }
}