<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\LoginCredentials;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class adminLogin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputs = [
            'fullname' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'avatar' => 'default-user.png',
            'mobile' => '7894561230',
            'login_type' => 'email',
            'role_status' => 1,
            'user_status' => 1,
            'user_block_status' => 1,
        ];

        Admin::create($inputs);

        $inputs = [
            'auth_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'role_status' => 1,
        ];

        LoginCredentials::create($inputs);
    }
}
