<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Company::insert([
            [
                'name' => 'Tech Solutions',
                'address' => '1234 Tech Lane, Silicon Valley, CA, USA',
                'about' => 'A leading tech company specializing in innovative software solutions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'GreenTech Innovations',
                'address' => '5678 Green Blvd, Portland, OR, USA',
                'about' => 'Dedicated to sustainability and providing green tech solutions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Creative Studios',
                'address' => '9876 Design Street, New York, NY, USA',
                'about' => 'A creative agency that specializes in branding, digital marketing, and design.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'HealthFirst Solutions',
                'address' => '3456 Wellness Way, Chicago, IL, USA',
                'about' => 'Improving healthcare services through technology and innovative solutions.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Global Finance Group',
                'address' => '7890 Financial Plaza, Boston, MA, USA',
                'about' => 'A leading financial services company offering comprehensive solutions for personal and business financial management with expertise in investment banking, wealth management, and financial technology.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Quantum Research Labs',
                'address' => '2468 Innovation Drive, Austin, TX, USA',
                'about' => 'A cutting-edge research organization focused on quantum computing, artificial intelligence, and next-generation technologies that push the boundaries of whats possible in science and engineering.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
