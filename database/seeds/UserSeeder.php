<?php
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'manuel freund',
            'email' => 'manuelfreund318@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
