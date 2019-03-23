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
         DB::table('t009_usuarios')->insert(array( // row #0
            'f009_nombre' => "admin",
            'f009_documento' => "123456789",
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'created_at' 	 => date('Y-m-d H:m:s'),
            'updated_at' 	 => date('Y-m-d H:m:s'),
        ));
    }
}
