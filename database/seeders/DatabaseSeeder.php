<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Category;
use App\Models\ProjectStatus;
use App\Models\TaskStatus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fname' => 'Perdana',
            'lname' => 'Erda',
            'username' => 'perdanaerda',
            'role_id' => '1',
            'email' => 'erdakun22@gmail.com',
            'password' => '$2y$10$3YoBB0Tt/K3Vy.ewR/ZgEusfhfMlUKAXrtYBWEbORAMYjkTdDaJRC',
            'avatar' => 'uploads/avatars//2Ijk48zgof2EO6lhc5hPIa2CgfBSjChMsQ8xtdTq.png',
        ]);

        ProjectStatus::create([
            'name' => 'Active',
            'slug' => 'active',
            'color' => 'primary'
        ]);
        ProjectStatus::create([
            'name' => 'Pending',
            'slug' => 'pending',
            'color' => 'warning',
        ]);
        ProjectStatus::create([
            'name' => 'Completed',
            'slug' => 'completed',
            'color' => 'success',
        ]);

        TaskStatus::create([
            'name' => 'Completed',
            'slug' => 'completed',
            'color' => 'success',
        ]);

        TaskStatus::create([
            'name' => 'Delayed',
            'slug' => 'delayed',
            'color' => 'warning',
        ]);

        TaskStatus::create([
            'name' => 'On Progress',
            'slug' => 'onprogress',
            'color' => 'primary',
        ]);
        
        \App\Models\User::factory(10)->create();


        Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        Role::create([
            'name' => 'User',
            'slug' => 'user',
        ]);

        Category::create([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'description' => 'Pembuatan Website',
        ]);

        Category::create([
            'name' => 'Mobile Apps Development',
            'slug' => 'mobile-apps-development',
            'description' => 'Pembuatan Aplikasi Mobile',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
