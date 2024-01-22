<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userAdmin = new User;
        $userAdmin->name = "admin";
        $userAdmin->email = "admin@iaw.com";
        $userAdmin->password = bcrypt("admin123");
        $userAdmin->rol = "admin";
        $userAdmin->save();

        $editor = new User;
        $editor->name = "editor";
        $editor->email = "editor@iaw.com";
        $editor->password = bcrypt("editor123");
        $editor->rol = "editor";
        $editor->save();
    }
}
