<?php
// File: database/seeders/DatabaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@portfolio.com',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Hero Settings
        DB::table('hero_settings')->insert([
            'name' => 'Alex Ramadhan',
            'tagline' => 'Full Stack Developer & UI Designer',
            'description' => 'Saya adalah developer berpengalaman yang passionate dalam menciptakan aplikasi web yang indah, fungsional, dan berdampak. Saya suka mengubah ide menjadi kenyataan digital.',
            'github_url' => 'https://github.com',
            'linkedin_url' => 'https://linkedin.com',
            'instagram_url' => 'https://instagram.com',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // About Settings
        DB::table('about_settings')->insert([
            'title' => 'Tentang Saya',
            'bio' => 'Halo! Saya Alex, seorang Full Stack Developer dengan lebih dari 3 tahun pengalaman dalam pengembangan web. Saya berspesialisasi dalam Laravel, Vue.js, dan React. Saya percaya bahwa kode yang baik adalah seni yang memenuhi fungsi.',
            'location' => 'Jakarta, Indonesia',
            'email' => 'alex@portfolio.com',
            'phone' => '+62 812 3456 7890',
            'years_experience' => 3,
            'projects_done' => 47,
            'clients' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Skills
        $skills = [
            ['name' => 'Laravel', 'level' => 90, 'category' => 'Backend', 'order' => 1],
            ['name' => 'PHP', 'level' => 88, 'category' => 'Backend', 'order' => 2],
            ['name' => 'MySQL', 'level' => 85, 'category' => 'Backend', 'order' => 3],
            ['name' => 'Vue.js', 'level' => 82, 'category' => 'Frontend', 'order' => 4],
            ['name' => 'React', 'level' => 78, 'category' => 'Frontend', 'order' => 5],
            ['name' => 'JavaScript', 'level' => 88, 'category' => 'Frontend', 'order' => 6],
            ['name' => 'Tailwind CSS', 'level' => 92, 'category' => 'Frontend', 'order' => 7],
            ['name' => 'Git', 'level' => 85, 'category' => 'Tools', 'order' => 8],
            ['name' => 'Docker', 'level' => 70, 'category' => 'Tools', 'order' => 9],
        ];

        foreach ($skills as $skill) {
            DB::table('skills')->insert(array_merge($skill, [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Portfolios
        $portfolios = [
            [
                'title' => 'E-Commerce Platform',
                'description' => 'Platform e-commerce lengkap dengan fitur cart, payment gateway Midtrans, dan admin dashboard yang komprehensif.',
                'category' => 'Web App',
                'tech_stack' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Midtrans']),
                'project_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'title' => 'Hospital Management System',
                'description' => 'Sistem manajemen rumah sakit dengan fitur jadwal dokter, rekam medis pasien, dan laporan keuangan.',
                'category' => 'Web App',
                'tech_stack' => json_encode(['Laravel', 'React', 'PostgreSQL']),
                'project_url' => null,
                'github_url' => 'https://github.com',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'title' => 'Portfolio Website',
                'description' => 'Website portfolio modern dengan CMS admin panel, animasi smooth, dan desain yang eye-catching.',
                'category' => 'Website',
                'tech_stack' => json_encode(['Laravel', 'Alpine.js', 'Tailwind']),
                'project_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'is_featured' => false,
                'order' => 3,
            ],
            [
                'title' => 'Task Management App',
                'description' => 'Aplikasi manajemen tugas tim dengan real-time notifications, kanban board, dan time tracking.',
                'category' => 'Web App',
                'tech_stack' => json_encode(['Laravel', 'Vue.js', 'WebSocket', 'Redis']),
                'project_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'is_featured' => false,
                'order' => 4,
            ],
        ];

        foreach ($portfolios as $portfolio) {
            DB::table('portfolios')->insert(array_merge($portfolio, [
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        // Site Settings
        $settings = [
            ['key' => 'site_title', 'value' => 'Alex Portfolio'],
            ['key' => 'primary_color', 'value' => '#6366f1'],
            ['key' => 'accent_color', 'value' => '#f59e0b'],
            ['key' => 'footer_text', 'value' => '© 2024 Alex Ramadhan. All rights reserved.'],
            ['key' => 'meta_description', 'value' => 'Portfolio Alex Ramadhan - Full Stack Developer'],
        ];

        foreach ($settings as $setting) {
            DB::table('site_settings')->insert(array_merge($setting, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
