<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'Kati Fractz',
            'email'=>'katifractz@yahoo.co.in',
            'password'=>bcrypt('password'),
            'admin'=>1
        ]);
        Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'uploads/avatars/1.png',
            'about'=>'lorem ipsum dolar sit amet, consectetur adispicting elit.',
            'facebook'=>'facebook.com'
        ]);
    }
}
