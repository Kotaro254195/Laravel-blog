<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::create([
            "site_name"=>"Laravel Blog",
            "author"=>"Kotaro",
            "author_bio"=>"Web Developer with more than 10 years of experience",
            "contact_number"=>"9663080817",
            "contact_email"=>"15503@fsnct.com",
            "address"=>"Koramangala, Bangalore"
        ]);
    }
}
