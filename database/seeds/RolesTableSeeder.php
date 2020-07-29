<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //add role
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Administration',
                'description' => 'Only one and only admin',
            ],
            [
                'name' => 'wali_kelas',
                'display_name' => 'Registed wali kelas',
                'description' => 'Access for registed wali kelas',
            ],
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }

        //add user
        $users = [
            [
                // 'name' => 'admin1',
                // 'email' => 'admin1@local.local',
                // 'password' => bcrypt('admin1'),
                'username'=>'admin',
            	'password'=>bcrypt('123456'),
            	'password_unscript'=>'123456',
            ],
            [
                'username'=>'wali_kelas',
            	'password'=>bcrypt('123456'),
            	'password_unscript'=>'123456',
            ],
        ];
        $n=1;
        foreach ($users as $key => $value) {
            $user=User::create($value);
            $user->attachRole($n);
            $n++;
        }

    }
}
