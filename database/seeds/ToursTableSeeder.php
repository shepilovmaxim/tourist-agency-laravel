<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tours = [
            [
                'type_id' => 1,
                'hotel_id' => 1,
                'name' => 'Albena',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 
                'people' => 1, 
                'start_date' => '2019-06-19', 
                'duration' => 8, 
                'price' => 500, 
                'amount' => 5, 
                'image' => '1.jpg'
            ],
            [
                'type_id' => 1,
                'hotel_id' => 11,
                'name' => 'Istanbul',
                'description' => 'Formerly known as Byzantium and Constantinople, is the most populous city in Turkey and the countrys economic, cultural and historic center. Istanbul is a transcontinental city in Eurasia, straddling the Bosporus strait (which separates Europe and Asia) between the Sea of Marmara and the Black Sea. Its commercial and historical center lies on the European side and about a third of its population lives in suburbs on the Asian side of the Bosporus. With a total population of around 15 million residents in its metropolitan area, Istanbul is one of the worlds most populous cities, ranking as the worlds fourth largest city proper and the largest European city. The city is the administrative center of the Istanbul Metropolitan Municipality (coterminous with Istanbul Province). Istanbul is a bridge between the East and West.', 
                'people' => 1, 
                'start_date' => '2019-07-02', 
                'duration' => 3, 
                'price' => 300, 
                'amount' => 1, 
                'image' => '3.jpg'
            ],
            [
                'type_id' => 11,
                'hotel_id' => 21,
                'name' => 'Athens',
                'description' => 'Athens is located on the picturesque Attica peninsula in Greece. This ancient city attracts tourists with its numerous museums, clean beaches, romantic quarters and modern streets. Representative offices of international companies, shopping and entertainment centers, ancient monuments are concentrated in Athens. Tours in Athens will appeal to history buffs, shopping fans, and are also perfect for business trips.', 
                'people' => 2, 
                'start_date' => '2019-07-15', 
                'duration' => 10, 
                'price' => 2000, 
                'amount' => 11, 
                'image' => '2.jpg'
            ],
            [
                'type_id' => 1,
                'hotel_id' => 31,
                'name' => 'Ecuador',
                'description' => 'The best time to travel around Ecuador is May-December, but June and July are the best time to visit the Galapagos Islands. Our partners in Ecuador have a decade of experience working with groups from all over the world, as well as group discounts on hotels and transport, which makes our general program of tours to Ecuador very cheap compared to other programs in Ecuador and Galapagos. What to see in Ecuador: first of all, of course, the Galapagos, the capital of Quito, Cotopaxi volcano, the city of Tena, the national park El Kahas, the proud Mantanita, the Chimboraso volcano, the Middle of the World, the Sangay national park, the Nueva Cathedral in Cuenca, the Karondelier Palace, the Palon del Diablo waterfall and so on.', 
                'people' => 5, 
                'start_date' => '2019-07-27', 
                'duration' => 6, 
                'price' => 1250, 
                'amount' => 15, 
                'image' => '4.jpg'
            ]
        ];

        DB::table('tours')->insert($tours);
    }
}
