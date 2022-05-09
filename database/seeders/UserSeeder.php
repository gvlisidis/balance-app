<?php

namespace Database\Seeders;

use App\Enum\CategoryEnum;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create(['name' => 'George', 'email' => 'gv@mail.com']);
        User::factory()->create(['name' => 'Zina', 'email' => 'zs@mail.com']);

        foreach (CategoryEnum::cases() as $category){
            Category::create(['title' => $category->value])->save();
        }
    }
}
