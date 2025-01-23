<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Event;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Mendapatkan event yang sudah ada
        $seminarAI = Event::where('title', 'Seminar Teknologi AI')->first();
        $seminarKesehatanMental = Event::where('title', 'Pelatihan Kesehatan Mental')->first();
        $festivalTari = Event::where('title', 'Festival Seni Tari')->first();
        $workshopMenulis = Event::where('title', 'Workshop Menulis Cerita')->first();
        $konserJazz = Event::where('title', 'Konser Musik Jazz')->first();

        // Mengambil user kedua dan ketiga
        $user2 = User::skip(1)->first(); // User kedua
        $user3 = User::skip(2)->first(); // User ketiga

        // Menambahkan review untuk 'Seminar Teknologi AI'
        Review::create([
            'event_id' => $seminarAI->id,
            'user_id' => $user2->id,
            'review' => 'Sangat informatif dan membuka wawasan mengenai AI.',
            'rating' => 5
        ]);

        Review::create([
            'event_id' => $seminarAI->id,
            'user_id' => $user3->id,
            'review' => 'Materinya bagus, tapi penyampaian bisa lebih menarik.',
            'rating' => 3
        ]);

        // Menambahkan review untuk 'Pelatihan Kesehatan Mental'
        Review::create([
            'event_id' => $seminarKesehatanMental->id,
            'user_id' => $user2->id,
            'review' => 'Sangat bermanfaat untuk menjaga kesejahteraan mental.',
            'rating' => 4
        ]);

        Review::create([
            'event_id' => $seminarKesehatanMental->id,
            'user_id' => $user3->id,
            'review' => 'Topik yang penting, tetapi waktunya terlalu singkat.',
            'rating' => 3
        ]);

        // Menambahkan review untuk 'Festival Seni Tari'
        Review::create([
            'event_id' => $festivalTari->id,
            'user_id' => $user2->id,
            'review' => 'Pertunjukan luar biasa! Sangat menghibur.',
            'rating' => 5
        ]);

        Review::create([
            'event_id' => $festivalTari->id,
            'user_id' => $user3->id,
            'review' => 'Tariannya menarik, tapi lokasi kurang nyaman.',
            'rating' => 4
        ]);

        // Menambahkan review untuk 'Workshop Menulis Cerita'
        Review::create([
            'event_id' => $workshopMenulis->id,
            'user_id' => $user2->id,
            'review' => 'Workshop yang sangat berguna untuk penulis pemula.',
            'rating' => 4
        ]);

        Review::create([
            'event_id' => $workshopMenulis->id,
            'user_id' => $user3->id,
            'review' => 'Penyampaian materi sangat mudah dipahami.',
            'rating' => 5
        ]);

        // Menambahkan review untuk 'Konser Musik Jazz'
        Review::create([
            'event_id' => $konserJazz->id,
            'user_id' => $user2->id,
            'review' => 'Konser yang sangat mengesankan, penampilannya luar biasa.',
            'rating' => 5
        ]);

        Review::create([
            'event_id' => $konserJazz->id,
            'user_id' => $user3->id,
            'review' => 'Musiknya sangat bagus, tetapi tempatnya kurang nyaman.',
            'rating' => 4
        ]);
    }
}
