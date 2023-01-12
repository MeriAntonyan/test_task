<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campaigns = [
            'Gucchi',
            'Versace',
            'Adidas',
        ];

        foreach ($campaigns as $campaign) {
            Campaign::create([
                'title' => $campaign,
            ]);
        }
    }
}
