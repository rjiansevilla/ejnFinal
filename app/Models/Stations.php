<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    protected $table = 'stations';

    protected $fillable = ['user_id', 'name', 'address'];

    public $timestamp = true;

    // ELOQUENT RELATIONSHIP
    public function transaction() {
        return $this->hasMany('App\Models\Transactions', 'station_id');
    }
}