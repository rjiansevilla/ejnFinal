<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seed.
     * 
     * @return void
     */
    function run()
    {
        // $arrBanks = [
        //     [
        //         "user_id" => '1',
        //         "name" => 'Banco De Oro' ,
        //     ],
        //     [
        //         "user_id" => '1',
        //         "name" => 'Metropolitan Bank and Trust Company' ,
        //     ],
        //     [
        //         "user_id" => '1',
        //         "name" => 'Land Bank of the Philippines' ,
        //     ],
        //     [
        //         "user_id" => '1',
        //         "name" => 'Bank of the Philippine Islands' ,
        //     ],
        //     [
        //         "user_id" => '1',
        //         "name" => 'Philippine National Bank' ,
        //     ]
        // ];

        $arrStations = [
            [
                "user_id" => 1,
                "name" => 'Main Office',
                "address" => 'Main Basilan',
            ],
            [
                "user_id" => 1,
                "name" => 'Basilan Office',
                "address" => 'Basilan City',
            ]
        ];


        DB::table('stations')->insert($arrStations);
        // DB::table('banks')->insert($arrBanks);
    }
}