<?php
//
//namespace Database\Seeders;
//
//use App\Models\Team;
//use Illuminate\Database\Seeder;
//
//class TeamsTableSeeder extends Seeder
//{
//    public function run()
//    {
//        // Clear the teams table before seeding
//        Team::truncate();
//
//        $teams = [
//            [
//                'name' => 'Manchester United',
//                'stadium' => 'Old Trafford',
//                'coach' => 'Erik ten Hag',
//                'founded' => 1878,
//                'logo' => 'https://upload.wikimedia.org/wikipedia/en/7/7a/Manchester_United_FC_crest.svg',
//            ],
//            [
//                'name' => 'Real Madrid',
//                'stadium' => 'Santiago Bernabéu',
//                'coach' => 'Carlo Ancelotti',
//                'founded' => 1902,
//                'logo' => 'https://upload.wikimedia.org/wikipedia/en/5/56/Real_Madrid_CF.svg',
//            ],
//            // Add more teams...
//        ];
//
//        foreach ($teams as $team) {
//            \Log::info('Inserting team:', $team); // Log the team data
//            Team::create($team);
//        }
//    }
//}
