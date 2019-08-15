<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    protected $table = "banks";

    protected $fillable = ["user_id", "name", "account_no"];

    public $timestamps = true;

    // ELOQUENT RELATIONSHIP
    protected function cheque() {
        return $this->hasMany('App\Models\Transactions', 'bank_id');
    }
}