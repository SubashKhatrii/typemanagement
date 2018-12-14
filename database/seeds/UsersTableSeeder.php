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
        //
       
        DB::table('users')->insert([
            'name' => 'shyam',
            'email' => 'shyam@gmail.com',
            'address' => 'bhaktapur',
            'phone'=>98000000
        ]);
        DB::table('users')->insert([
            'name' => 'sh',
            'email' => 'sh@gmail.com',
            'address' => 'bhaktapur',
            'phone'=>98000000
        ]);
        DB::table('users')->insert([
            'name' => 'ash',
            'email' => 'ash@gmail.com',
            'address' => 'bhaktapur',
            'phone'=>98000000
        ]);DB::table('users')->insert([
            'name' => 's',
            'email' => 's@gmail.com',
            'address' => 'bhaktapur',
            'phone'=>98000000
        ]);
        DB::table('users')->insert([
            'name' => 'hari',
            'email' => 'sharih@gmail.com',
            'address' => 'bhaktapur',
            'phone'=>98000000
        ]);
        DB::table('users')->insert([
            'name' => 'suna',
            'email' => 'subah@gmail.com',
            'address' => 'bhaktapur',
            'phone'=>98000000
        ]);
        DB::table('users')->insert([
            'name' => 'stuna',
            'email' => 'suash@gmail.com',
            'address' => 'bhaktapur',
            'phone'=>98000000
        ]);

    }
}
