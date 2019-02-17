<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Proyecto;

class DatabaseSeeder extends Seeder
{
    public function run()
    {   
        DB::table('users')->delete();
        DB::table('proyectos')->delete();

        User::create(array(
            'name' => 'Ruben',
            'email' => 'Ruben@gmail.com',
            'type' => 'developer',
            'password' => bcrypt('123456')
        ));

        $SM_ID = DB::table('users')->insertGetId(
            [
                'name' => 'Leandro',
                'email' => 'Leandro@gmail.com',
                'type' => 'ScrumMaster',
                'password' => bcrypt('123456')
            ]);

        $PO_ID = DB::table('users')->insertGetId(
            [
                'name' => 'Enric',
                'email' => 'Enric@gmail.com',
                'type' => 'ProductOwner',
                'password' => bcrypt('123456')
            ]);

        Proyecto::create(array(
            'name' => 'Scrum',
            'description' => 'Un proyecto importante',
            'scrum_master' => $SM_ID,
            'product_owner' => $PO_ID,
            'grupo' => 1
        ));
    }
}