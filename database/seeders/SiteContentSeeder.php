<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteContent::create([
            'name' => "banner",
            'content' => json_encode([
                'title' => 'EVERY STUDENT YEARNS TO LEARN',
                'sub_title' => 'Making Your students World Better',
                'desc' => "Replenish seasons may male hath fruit beast were seas saw you arrie said man beast whales his void unto last session for bite. Set have great you'll male grass yielding yielding man"
            ]),

            'name' => "features",
            'content' => json_encode([
                'main_title' => 'Awesome <br> Feature',
                'main_desc' => 'Set have great you male grass yielding an yielding first their youre have called the abundantly fruit were man',
                'feature1_title' => 'Better Future',
                'feature1_desc' => 'Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male',
                'feature2_title' => 'Qualified Trainers',
                'feature2_desc' => 'Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male',
                'feature3_title' => 'Job Oppurtunity',
                'feature3_desc' => 'Set have great you male grasses yielding yielding first their to called deep abundantly Set have great you male'
            ]),

            'name' => "courses",
            'content' => json_encode([
                'title' => 'OUR COURSES',
                'sub_title' => 'Different Categories'
            ]),

            'name' => "tesimonials",
            'content' => json_encode([
                'title' => 'TESIMONIALS',
                'sub_title' => 'Happy Students'
            ]),

            'name' => "footer",
            'content' => json_encode([
                'desc1' => 'But when shot real her. Chamber her one visite removal six sending himself boys scot exquisite existend an',
                'desc2' => 'But when shot real her hamber her',
                'title' => 'News Letter',
                'desc3' => 'Stay updated with our latest trends Seed heaven so said place winged over given forth fruit.'
            ])
        ]);
    }
}
