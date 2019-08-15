<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = ['user_id', 'name', 'desc'];

    public $timestamp = true;

    // ELOQUENT RELATIONSHIP
    public function transaction() {
        return $this->hasMany('App\Models\Transactions', 'product_id');
    }
}