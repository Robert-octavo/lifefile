<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        DB::table('departments')->insert([[
            'name' => 'Accounting',
            'created_at' => '2021-01-01 00:00:00',
            'updated_at' => '2021-01-01 00:00:00',
        ], [
            'name' => 'Administration',
            'created_at' => '2021-01-01 00:00:00',
            'updated_at' => '2021-01-01 00:00:00',
        ], [
            'name' => 'Customer Service',
            'created_at' => '2021-01-01 00:00:00',
            'updated_at' => '2021-01-01 00:00:00',
        ], [
            'name' => 'Engineering',
            'created_at' => '2021-01-01 00:00:00',
            'updated_at' => '2021-01-01 00:00:00',
        ], [
            'name' => 'Information Technology',
            'created_at' => '2021-01-01 00:00:00',
            'updated_at' => '2021-01-01 00:00:00',
        ]]);

        $department_all = \App\Models\Department::all();

        for ($i = 0; $i < 30; $i++) {
            \App\Models\User::factory()->create([
                //random number from 1 to 5
                'department_id' => $department_all->random()->id,
            ]);
        }

        $users = \App\Models\User::all()->shuffle();

        for ($i = 0; $i < 50; $i++) {
            \App\Models\Record::factory()->create([
                'user_id' => $users->random()->id,
            ]);
        }


        // \App\Models\User::factory(30)->create([
        //     //random number from 1 to 5
        //     'department_id' => $department_all->random()->id,
        // ]);

        // $users = \App\Models\User::all();

        // for ($i = 0; $i < 10; $i++) {
        //     \App\Models\Department::factory()->create([
        //         'user_id' => $users->random()->id,
        //     ]);
        // }

        // asign a department to all the users
        // $departments = \App\Models\Department::all();
        // for ($i = 0; $i < 20; $i++) {
        //     \App\Models\User::factory()->create([
        //         'department_id' => $departments->random()->id,
        //     ]);
        // }



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => bcrypt('password'),
        //     'department_id' => 1,
        //     'access_room_911' => true,
        // ]);
    }
}
