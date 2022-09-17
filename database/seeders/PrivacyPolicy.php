<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pages;

class PrivacyPolicy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $privacy_info = [
            'name' => 'Privacy policy',
            'heading' => 'Privacy policy',
            'content' => 'Privacy policy content',
            'images' => '',
            'urls' => '',
            'type' => '',
            'slug' => 'privacy-policy',
        ];
        Pages::create($privacy_info);
    }
}
