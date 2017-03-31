<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Morris Mukiri",
            'email' => "morrismukiri@hotmail.com",
            'username' => "morrismukiri",
            'phone' => "+254716043576",
            'gender' => "male",
            'address' => "378 Chuka",
            'dob' => "2017-03-09",
            'password' => bcrypt('password123')
        ]);

        factory(\App\User::class, 10)->create()->each(function ($u) {
            $u->polls()->save(factory(App\Models\Poll::class)->make());
        });
    }
}
