<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('dob');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('is_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        */

        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'phone_number' => '+621234567890',
            'dob' => '1945-08-17',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ]);

        User::create([
            'first_name' => 'user',
            'last_name' => 'user',
            'email' => 'user@user.com',
            'phone_number' => '+620987654321',
            'dob' => '1998-05-21',
            'password' => bcrypt('user'),
        ]);

        Article::create([
            'title' => 'All About The Ocean',
            'author_name' => 'Mario Chao',
            'image' => '1.jpg',
            'content' =>
            "
            <p>The ocean covers 70 percent of Earth's surface. It contains about 1.35 billion cubic kilometers (324 million cubic miles) of water, which is about 97 percent of all the water on Earth. The ocean makes all life on Earth possible, and makes the planet appear blue when viewed from space. Earth is the only planet in our solar system that is definitely known to contain liquid water.</p>
            <p>Although the ocean is one continuous body of water, oceanographers have divided it into five principal areas: the Pacific, Atlantic, Indian, Arctic, and Southern Oceans. The Atlantic, Indian, and Pacific Oceans merge into icy waters around Antarctica.</p>

            <h2><b>Cimate</b></h2>
            <p>The ocean plays a vital role in climate and weather. The sun's heat causes water to evaporate, adding moisture to the air. The oceans provide most of this evaporated water. The water vapor condenses to form clouds, which release their moisture as rain or other kinds of precipitation. All life on Earth depends on this process, called the water cycle.</p>
            <p>The atmosphere receives much of its heat from the ocean. As the sun warms the water, the ocean transfers heat to the atmosphere. In turn, the atmosphere distributes the heat around the globe.</p>
            <p>Because water absorbs and loses heat more slowly than land masses, the ocean helps balance global temperatures by absorbing heat in the summer and releasing it in the winter. Without the ocean to help regulate global temperatures, Earth's climate would be bitterly cold.</p>

            <h2><b>Ocean Formation</b></h2>
            <p>After Earth began to form about 4.6 billion years ago, it gradually separated into layers of lighter and heavier rock. The lighter rock rose and formed Earth's crust. The heavier rock sank and formed Earth's core and mantle.</p>
            <p>The ocean's water came from rocks inside the newly forming Earth. As the molten rocks cooled, they released water vapor and other gases. Eventually, the water vapor condensed and covered the crust with a primitive ocean. Today, hot gases from the Earth's interior continue to produce new water at the bottom of the ocean.</p>

            <h2><b>Ocean Floor</b></h2>
            <p>Scientists began mapping the ocean floor in the 1920s. They used instruments called echo sounders, which measure water depths using sound waves. Echo sounders use sonar technology. Sonar is an acronym for SOund Navigation And Ranging. The sonar showed that the ocean floor has dramatic physical features, including huge mountains, deep canyons, steep cliffs, and wide plains.</p>
            <p>The ocean's crust is a thin layer of volcanic rock called basalt. The ocean floor is divided into several different areas. The first is the continental shelf, the nearly flat, underwater extension of a continent. Continental shelves vary in width. They are usually wide along low-lying land, and narrow along mountainous coasts.</p>
            <p>A shelf is covered in sediment from the nearby continent. Some of the sediment is deposited by rivers and trapped by features such as natural dams. Most sediment comes from the last glacial period, or Ice Age, when the oceans receded and exposed the continental shelf. This sediment is called relict sediment.</p>
            <p>At the outer edge of the continental shelf, the land drops off sharply in what is called the continental slope. The slope descends almost to the bottom of the ocean. Then it tapers off into a gentler slope known as the continental rise. The continental rise descends to the deep ocean floor, which is called the abyssal plain.</p>
            <p>Abyssal plains are broad, flat areas that lie at depths of about 4,000 to 6,000 meters (13,123 to 19,680 feet). Abyssal plains cover 30 percent of the ocean floor and are the flattest feature on Earth. They are covered by fine-grained sediment like clay and silt. Pelagic sediments, the remains of small ocean organisms, also drift down from upper layers of the ocean. Scattered across abyssal plains are abyssal hills and underwater volcanic peaks called seamounts.</p>
            <p>Rising from the abyssal plains in each major ocean is a huge chain of mostly undersea mountains. Called the mid-ocean ridge, the chain circles Earth, stretching more than 64,000 kilometers (40,000 miles). Much of the mid-ocean ridge is split by a deep central rift, or crack. Mid-ocean ridges mark the boundaries between tectonic plates. Molten rock from Earth's interior wells up from the rift, building new seafloor in a process called seafloor spreading. A major portion of the ridge runs down the middle of the Atlantic Ocean and is known as the Mid-Atlantic Ridge. It was not directly seen or explored until 1973.</p>
            <p>Some areas of the ocean floor have deep, narrow depressions called ocean trenches. They are the deepest parts of the ocean. The deepest spot of all is the Challenger Deep, which lies in the Mariana Trench in the Pacific Ocean near the island of Guam. Its true depth is not known, but the most accurate measurements put the Challenger Deep at 11,000 meters (36,198 feet) below the ocean's surface—that's more than 2,000 meters (6,000 feet) taller than Mount Everest, Earth's highest point. The pressure in the Challenger Deep is about eight tons per square inch</p>"
        ]);

        Article::create([
            'title' => 'The Menace Below: Understanding the Impact of Microplastics in Our Oceans',
            'author_name' => 'Mario Chao',
            'image' => '2.jpg',
            'content' =>
            "<p>The oceans, vast and seemingly endless, harbor a hidden threat beneath their shimmering waves: microplastics. These minuscule plastic particles, often invisible to the naked eye, have become ubiquitous in marine environments, posing a significant risk to marine life and ultimately, human health. In this article, we delve into the world of microplastics, exploring their origins, impact, and the urgent need for global action to mitigate their harmful effects on ocean ecosystems.</p>

            <h2>What are Microplastics?</h2>
            <p>Microplastics are tiny pieces of plastic debris, typically less than 5 millimeters in size, that originate from the breakdown of larger plastic items or are intentionally manufactured for use in products such as microbeads in personal care products, synthetic fibers in clothing, and pellets used in industrial processes. These particles can be categorized into two main types: primary microplastics, which are directly released into the environment in their small size, and secondary microplastics, which result from the fragmentation of larger plastic items over time due to exposure to sunlight, waves, and physical abrasion.</p>

            <h2><b>Sources and Pathways:</b></h2>
            <p>The sources of microplastics are diverse and widespread, ranging from land-based activities such as improper waste disposal and industrial runoff to maritime sources including shipping activities, fishing gear, and the breakdown of plastic debris at sea. Once in the marine environment, microplastics can be transported vast distances by ocean currents, accumulating in coastal areas, deep-sea sediments, and even polar regions, where they pose a threat to a wide range of marine organisms.</p>

            <h2><b>Impact on Marine Life:</b></h2>
            <p>The pervasive presence of microplastics in the oceans has far-reaching consequences for marine life. Small marine organisms such as plankton and filter-feeders often mistake microplastics for food, leading to ingestion and potential blockage of their digestive systems. This can disrupt feeding behavior, hinder growth and reproduction, and ultimately contribute to decreased population levels. Furthermore, as microplastics move up the marine food chain, they can accumulate in higher trophic levels, including fish, seabirds, and marine mammals, posing a risk to both individual animals and entire ecosystems.</p>

            <h2><b>Environmental and Health Risks:</b></h2>
            <p>Beyond their direct impact on marine organisms, microplastics can also pose environmental and health risks to humans. These tiny particles have been found in various seafood products consumed by humans, raising concerns about the potential transfer of harmful chemicals and toxins associated with plastics into the human food chain. Furthermore, microplastics have been detected in drinking water supplies, highlighting the need for further research into their potential effects on human health, including their role in the transmission of pathogens and pollutants.</p>

            <h2><b>Addressing the Issue:</b></h2>
            <p>Addressing the challenge of microplastic pollution requires a multi-faceted approach involving concerted efforts at the local, national, and international levels. Strategies to mitigate microplastic pollution include reducing the use of single-use plastics, improving waste management infrastructure to prevent plastic leakage into the environment, promoting sustainable alternatives to plastic products, and implementing regulations to limit the release of microplastics from various sources. Additionally, innovative technologies for the detection, monitoring, and removal of microplastics from marine environments are being developed to aid in conservation efforts and ecosystem restoration.</p>
            "

        ]);

        Article::create([
            'title' => 'Exploring the Wonders of Marine Life in the Ocean',
            'author_name' => 'Mario Chao',
            'image' => '3.jpg',
            'content' =>
            "
            <p>The ocean covers more than 70% of the Earth's surface and is home to an incredibly diverse array of life forms. From the smallest plankton to the largest whales, marine life encompasses a vast range of species adapted to thrive in various marine ecosystems. Let's embark on a journey beneath the waves to discover the fascinating world of marine life.</p>

            <h2><b>The Coral Reef Ecosystem</b></h2>
            <p>Coral reefs are often referred to as the rainforests of the sea due to their extraordinary biodiversity. These underwater ecosystems provide a habitat for countless species of fish, invertebrates, and marine plants. Coral polyps, tiny organisms that build intricate calcium carbonate structures, form the foundation of coral reefs. Among the vibrant corals, you'll find colorful fish such as parrotfish, angelfish, and clownfish darting among the coral branches.</p>

            <h2><b>The Deep Sea Realm</b></h2>
            <p>Beneath the sunlit surface waters lies the mysterious realm of the deep sea. Here, in the vast darkness of the ocean depths, an array of bizarre and otherworldly creatures thrive. From the elusive giant squid to the eerie anglerfish with its glowing lure, the deep sea is teeming with life adapted to extreme pressure and cold temperatures. Deep-sea vents, where superheated water rich in minerals gushes from the ocean floor, support unique ecosystems populated by strange organisms such as tube worms and giant clams.</p>

            <h2><b>The Pelagic Zone</b></h2>
            <p>Above the ocean floor, the pelagic zone encompasses the vast expanse of open water. Here, marine life roams freely, from sleek predators like sharks and dolphins to graceful giants such as whales and manta rays. Schools of fish shimmer like silver clouds as they move in synchronized patterns, while seabirds soar overhead, diving gracefully to catch their prey. The pelagic zone is also home to plankton, tiny organisms that form the base of the marine food web and play a crucial role in nutrient cycling.</p>

            <h2><b>Threats to Marine Life</b></h2>
            <p>Despite the resilience of marine life, human activities pose significant threats to ocean ecosystems. Pollution, overfishing, habitat destruction, and climate change are putting immense pressure on marine species worldwide. Coral reefs are particularly vulnerable to warming ocean temperatures and ocean acidification, which can lead to coral bleaching and decline. Plastic pollution poses a direct threat to marine life, with millions of tons of plastic waste entering the oceans each year, endangering marine animals through ingestion and entanglement.</p>

            <h2><b>Conservation Efforts</b></h2>
            <p>Efforts to conserve marine life are underway around the globe, from the establishment of marine protected areas to the implementation of sustainable fishing practices. Conservation initiatives aim to reduce pollution, mitigate the impacts of climate change, and preserve critical habitats such as coral reefs and mangrove forests. Public awareness and education play a crucial role in fostering a sense of stewardship for the oceans and inspiring action to protect marine life for future generations.</p>
            "

        ]);
    }
}
