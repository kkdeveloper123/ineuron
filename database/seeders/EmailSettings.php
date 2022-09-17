<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\EmailConfig;

class EmailSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email_info = [
            'name' => env('APP_NAME'),
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_user' => 'trialnbt@gmail.com',
            'smtp_pass' => 'cyrax$@123',
            'smtp_encryption' => 'tls',
            'type' => 'smtp',
        ];
        EmailConfig::create($email_info);
    }
}
