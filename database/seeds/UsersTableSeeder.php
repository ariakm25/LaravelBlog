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
        $user = App\User::create([
            'name'      => 'Aria K',
            'email'     => 'ariakm25@gmail.com',
            'password'  => bcrypt('password')
        ]);

        App\Profile::create([
            'user_id'   => $user->id,
            'avatar'    => 'uploads/avatars/default.png',
            'about'     => 'Just a Hooman',
            'facebook'  => 'https://facebook.com/ariakm25',
            'website'   =>  'https://ariakm.jp/'
        ]);
    }
}
