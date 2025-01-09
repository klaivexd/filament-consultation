<?php

namespace Database\Seeders;

use App\Models\ConsultationCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $physicalId = \App\Models\ConsultationType::where('title', 'Physical Consultation')->value('id');
        $webId = \App\Models\ConsultationType::where('title', 'Web Consultation')->value('id');
        $mobileId = \App\Models\ConsultationType::where('title', 'Mobile Consultation')->value('id');

        // Physical Consultation Categories
        ConsultationCategory::insert([
            ['title' => 'Dental Issues', 'description' => 'Dental problems', 'number_of_slots' => 5, 'consultation_type_id' => $physicalId, 'parent_consultation_category' => null, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Gastroentrology', 'description' => 'Stomach issues', 'number_of_slots' => 10, 'consultation_type_id' => $physicalId, 'parent_consultation_category' => null, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Vaccination', 'description' => 'Vaccination-related', 'number_of_slots' => 8, 'consultation_type_id' => $physicalId, 'parent_consultation_category' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
