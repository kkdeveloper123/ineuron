<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment_setting;


class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paytm = [
          [
            'api_keys' => json_encode(["key"=>"abhishek","secret"=>"bhai"]),
            'type' => 'paypal',
            'mode' => '1',
            'status' => 1,
        ],
        [
            'api_keys' => json_encode(["key"=>"abhishek","secret"=>"bhai"]),
            'type' => 'stripe',
            'mode' => '1',
            'status' => 1,
        ]
      ];
      foreach($paytm as $key => $value ) {
        Payment_setting::create($value);
      }


    }
}
