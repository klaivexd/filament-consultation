<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ConsultationType;

class ConsultationTypeSeeder extends Seeder
{
    public function run()
    {
        ConsultationType::insert([
            ['title' => 'Physical Consultation', 'description' => 'In-person consultation'],
            ['title' => 'Online Consultation', 'description' => 'Remote consultation via video call'],
        ]);
    }
}