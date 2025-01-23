<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        // Data yang sudah ada
        Event::create([
            'title' => 'Seminar Teknologi AI',
            'description' => 'Membahas tentang perkembangan Artificial Intelligence di Indonesia.',
            'event_date' => '2025-02-01',
            'start_time' => '2025-02-01 09:00:00',
            'end_time' => '2025-02-01 12:00:00',
            'category_id' => 1, // Seminar
            'is_online' => true,
            'image' => 'images/events/ai_seminar.jpg',
            'price' => 50000,
            'location' => 'Online via Zoom',
        ]);

        // Tambahkan data baru di bawah ini
        Event::create([
            'title' => 'Pelatihan Kesehatan Mental',
            'description' => 'Pelatihan pentingnya menjaga kesehatan mental di era modern.',
            'event_date' => '2025-02-01',
            'start_time' => '2025-05-15 09:00:00',
            'end_time' => '2025-05-15 12:00:00',
            'category_id' => 1, // Seminar
            'is_online' => true,
            'image' => 'images/events/kesehatan_mental.jpg',
            'price' => 30000,
            'location' => 'Online via Zoom',
        ]);

        Event::create([
            'title' => 'Festival Seni Tari',
            'description' => 'Pertunjukan seni tari tradisional dan modern.',
            'event_date' => '2025-02-01',
            'start_time' => '2025-06-01 16:00:00',
            'end_time' => '2025-06-01 22:00:00',
            'category_id' => 2, // Festival
            'is_online' => false,
            'image' => 'images/events/festival_tari.jpg',
            'price' => 0,
            'location' => 'Gedung Kesenian Surabaya',
        ]);

        Event::create([
            'title' => 'Workshop Menulis Cerita',
            'description' => 'Panduan menulis cerita pendek yang menarik.',
            'event_date' => '2025-02-01',
            'start_time' => '2025-06-10 09:00:00',
            'end_time' => '2025-06-10 16:00:00',
            'category_id' => 3, // Workshop
            'is_online' => true,
            'image' => 'images/events/workshop_cerita.jpg',
            'price' => 75000,
            'location' => 'Online via Microsoft Teams',
        ]);

        Event::create([
            'title' => 'Konser Musik Jazz',
            'description' => 'Nikmati alunan musik jazz bersama musisi ternama.',
            'event_date' => '2025-02-03',
            'start_time' => '2025-06-15 19:00:00',
            'end_time' => '2025-06-15 23:00:00',
            'category_id' => 2, // Festival
            'is_online' => false,
            'image' => 'images/events/jazz_konser.jpg',
            'price' => 100000,
            'location' => 'Teater Besar, Yogyakarta',
        ]);

        Event::create([
            'title' => 'Seminar Pemrograman Web',
            'description' => 'Belajar dasar-dasar pemrograman web menggunakan Laravel.',
            'event_date' => '2025-02-03',
            'start_time' => '2025-07-01 09:00:00',
            'end_time' => '2025-07-01 12:00:00',
            'category_id' => 1, // Seminar
            'is_online' => true,
            'image' => 'images/events/web_programming.jpg',
            'price' => 50000,
            'location' => 'Online via Zoom',
        ]);

        Event::create([
            'title' => 'Pameran Game Indie',
            'description' => 'Pameran karya game developer indie dari seluruh Indonesia.',
            'event_date' => '2025-02-03',
            'start_time' => '2025-07-15 10:00:00',
            'end_time' => '2025-07-15 18:00:00',
            'category_id' => 5, // Pameran
            'is_online' => true,
            'image' => 'images/events/game_indie.jpg',
            'price' => 0,
            'location' => 'Online via Discord',
        ]);

        Event::create([
            'title' => 'Workshop Teknik Produksi Film',
            'description' => 'Belajar teknik produksi film dari ahli perfilman.',
            'event_date' => '2025-02-06',
            'start_time' => '2025-07-20 09:00:00',
            'end_time' => '2025-07-20 15:00:00',
            'category_id' => 3, // Workshop
            'is_online' => false,
            'image' => 'images/events/film_workshop.jpg',
            'price' => 125000,
            'location' => 'Kampus Seni Film Jakarta',
        ]);

        Event::create([
            'title' => 'Turnamen Catur Nasional',
            'description' => 'Kompetisi catur dengan hadiah besar.',
            'event_date' => '2025-02-06',
            'start_time' => '2025-08-01 09:00:00',
            'end_time' => '2025-08-01 18:00:00',
            'category_id' => 4, // Kompetisi
            'is_online' => false,
            'image' => 'images/events/catur_turnamen.jpg',
            'price' => 0,
            'location' => 'Gedung Olahraga Bandung',
        ]);

        Event::create([
            'title' => 'Seminar Teknologi Blockchain',
            'description' => 'Mengenal aplikasi teknologi blockchain di dunia nyata.',
            'event_date' => '2025-02-06',
            'start_time' => '2025-08-10 09:00:00',
            'end_time' => '2025-08-10 12:00:00',
            'category_id' => 1, // Seminar
            'is_online' => true,
            'image' => 'images/events/blockchain_seminar.jpg',
            'price' => 60000,
            'location' => 'Online via Zoom',
        ]);

        Event::create([
            'title' => 'Festival Teater Tradisional',
            'description' => 'Pertunjukan teater tradisional khas daerah Indonesia.',
            'event_date' => '2025-02-06',
            'start_time' => '2025-08-20 18:00:00',
            'end_time' => '2025-08-20 23:00:00',
            'category_id' => 2, // Festival
            'is_online' => false,
            'image' => 'images/events/teater_festival.jpg',
            'price' => 0,
            'location' => 'Gedung Kesenian Bali',
        ]);

        Event::create([
            'title' => 'Pameran Produk Lokal',
            'description' => 'Eksibisi produk lokal inovatif karya anak bangsa.',
            'event_date' => '2025-02-07',
            'start_time' => '2025-08-25 10:00:00',
            'end_time' => '2025-08-25 17:00:00',
            'category_id' => 5, // Pameran
            'is_online' => false,
            'image' => 'images/events/produk_lokal.jpg',
            'price' => 0,
            'location' => 'Mall Grand Indonesia, Jakarta',
        ]);

        Event::create([
            'title' => 'Workshop Desain UI/UX',
            'description' => 'Pelatihan mendesain antarmuka pengguna yang intuitif.',
            'event_date' => '2025-02-07',
            'start_time' => '2025-09-01 09:00:00',
            'end_time' => '2025-09-01 16:00:00',
            'category_id' => 3, // Workshop
            'is_online' => true,
            'image' => 'images/events/uiux_workshop.jpg',
            'price' => 85000,
            'location' => 'Online via Google Meet',
        ]);

        Event::create([
            'title' => 'Lomba Karya Tulis Ilmiah',
            'description' => 'Kompetisi menulis karya ilmiah untuk pelajar dan mahasiswa.',
            'event_date' => '2025-02-07',
            'start_time' => '2025-09-10 10:00:00',
            'end_time' => '2025-09-10 17:00:00',
            'category_id' => 4, // Kompetisi
            'is_online' => false,
            'image' => 'images/events/karya_tulis.jpg',
            'price' => 0,
            'location' => 'Universitas Indonesia, Depok',
        ]);

        Event::create([
            'title' => 'Seminar Kepemimpinan Generasi Muda',
            'description' => 'Membangun kepemimpinan efektif untuk anak muda.',
            'event_date' => '2025-02-07',
            'start_time' => '2025-09-15 09:00:00',
            'end_time' => '2025-09-15 12:00:00',
            'category_id' => 1, // Seminar
            'is_online' => true,
            'image' => 'images/events/kepemimpinan_seminar.jpg',
            'price' => 40000,
            'location' => 'Online via Zoom',
        ]);
    }
}
