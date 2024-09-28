<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder {
    /**
    * Run the database seeds.
    */

    public function run(): void {
        User::create( [
            'fullName' => 'Stefanus Albert Wilson',
            'email' => 'abed@gmail.com',
            'username' => 'abedsully',
            'phoneNumber' => '123',
            'password' => 'lala1234',
            'confirmPassword' => 'lala1234',
        ] );
    }
}
