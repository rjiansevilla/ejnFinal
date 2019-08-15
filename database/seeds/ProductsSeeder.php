<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seed.
     * 
     * @return void
     */
    public function run()
    {
        $arrProducts = [
            [
                "user_id" => '1',
                "name" => 'Copra',
                "desc" => 'This is Copra products.',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "user_id" => '1',
                "name" => 'Coffee',
                "desc" => 'This is Coffe products.',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ],
            [
                "user_id" => '1',
                "name" => 'Rubber',
                "desc" => 'This is Rubber products.',
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            ]
        ];

        DB::table('products')->insert($arrProducts);
    }
}