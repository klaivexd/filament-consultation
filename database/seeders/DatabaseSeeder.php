<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ConsultationTypeSeeder;
use Database\Seeders\ConsultationCategorySeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        
        User::create([
            'name' => 'Chrisjohn Laxa',
            'email' => 'chrisjohn.laxa@exocoder.io',
            'password' => bcrypt('password'),
        ]);
        
        $this->call([
            ConsultationTypeSeeder::class,
            ConsultationCategorySeeder::class,
        ]);
        // $this->call(ConsultationCategorySeeder::class);
    }
}
