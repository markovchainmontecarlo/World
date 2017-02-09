<?php

use Illuminate\Database\Seeder;

class WorldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\locales::truncate();
        App\countries::truncate();
        App\states::truncate();
        App\cities::truncate();

        App\Locales::insert([
			[ 'key' => 'al', 'name' => 'Alemannisch', 'status' => 'offline' ],
			[ 'key' => 'an', 'name' => 'Ænglisc', 'status' => 'offline' ],
			[ 'key' => 'ar', 'name' => 'العربية', 'status' => 'offline' ],
			[ 'key' => 'sd', 'name' => 'سنڌي', 'status' => 'offline' ],
			[ 'key' => 'az', 'name' => 'Azərbaycanca', 'status' => 'offline' ],
			[ 'key' => 'bg', 'name' => 'Български', 'status' => 'offline' ],
			[ 'key' => 'bj', 'name' => 'Bahasa Banjar', 'status' => 'offline' ],
			[ 'key' => 'bn', 'name' => 'বাংলা', 'status' => 'offline' ],
			[ 'key' => 'ca', 'name' => 'Català', 'status' => 'offline' ],
			[ 'key' => 'cs', 'name' => 'Česky', 'status' => 'offline' ],
			[ 'key' => 'cu', 'name' => 'Словѣ́ньскъ', 'status' => 'offline' ],
			[ 'key' => 'de', 'name' => 'Deutsch', 'status' => 'offline' ],
			[ 'key' => 'el', 'name' => 'Ελληνικά', 'status' => 'offline' ],
			[ 'key' => 'en', 'name' => 'English', 'status' => 'online' ],
			[ 'key' => 'eo', 'name' => 'Esperanto', 'status' => 'offline' ],
			[ 'key' => 'es', 'name' => 'Español', 'status' => 'offline' ],
			[ 'key' => 'fa', 'name' => 'فارسی', 'status' => 'offline' ],
			[ 'key' => 'fi', 'name' => 'Suomi', 'status' => 'offline' ],
			[ 'key' => 'fr', 'name' => 'Français', 'status' => 'offline' ],
			[ 'key' => 'gu', 'name' => 'ગુજરાતી', 'status' => 'offline' ],
			[ 'key' => 'he', 'name' => 'עברית', 'status' => 'offline' ],
			[ 'key' => 'hi', 'name' => 'हिन्दी', 'status' => 'offline' ],
			[ 'key' => 'hy', 'name' => 'Հայերեն', 'status' => 'offline' ],
			[ 'key' => 'id', 'name' => 'Bahasa Indonesia', 'status' => 'offline' ],
			[ 'key' => 'mr', 'name' => 'मराठी', 'status' => 'offline' ],
			[ 'key' => 'it', 'name' => 'Italiano', 'status' => 'offline' ],
			[ 'key' => 'ja', 'name' => '日本語', 'status' => 'offline' ],
			[ 'key' => 'jv', 'name' => 'Basa Jawa', 'status' => 'offline' ],
			[ 'key' => 'ka', 'name' => 'ქართული', 'status' => 'offline' ],
			[ 'key' => 'ko', 'name' => '한국어', 'status' => 'offline' ],
			[ 'key' => 'lv', 'name' => 'Latviešu', 'status' => 'offline' ],
			[ 'key' => 'lt', 'name' => 'Lietuvių', 'status' => 'offline' ],
			[ 'key' => 'hu', 'name' => 'Magyar', 'status' => 'offline' ],
			[ 'key' => 'ms', 'name' => 'Bahasa Melayu', 'status' => 'offline' ],
			[ 'key' => 'mk', 'name' => 'Македонски', 'status' => 'offline' ],
			[ 'key' => 'mz', 'name' => 'مازِرونی', 'status' => 'offline' ],
			[ 'key' => 'ne', 'name' => 'नेपाली', 'status' => 'offline' ],
			[ 'key' => 'pa', 'name' => 'ਪੰਜਾਬੀ', 'status' => 'offline' ],
			[ 'key' => 'pl', 'name' => 'Polski', 'status' => 'offline' ],
			[ 'key' => 'ps', 'name' => 'پښتو', 'status' => 'offline' ],
			[ 'key' => 'pt', 'name' => 'Português', 'status' => 'offline' ],
			[ 'key' => 'ro', 'name' => 'Română', 'status' => 'offline' ],
			[ 'key' => 'ru', 'name' => 'Русский', 'status' => 'offline' ],
			[ 'key' => 'sv', 'name' => 'Svenska', 'status' => 'offline' ],
			[ 'key' => 'ta', 'name' => 'தமிழ்', 'status' => 'offline' ],
			[ 'key' => 'th', 'name' => 'ไทย', 'status' => 'offline' ],
			[ 'key' => 'tr', 'name' => 'Türkçe', 'status' => 'online' ],
			[ 'key' => 'uk', 'name' => 'Українська', 'status' => 'offline' ],
			[ 'key' => 'vi', 'name' => 'Tiếng Việt', 'status' => 'offline' ],
			[ 'key' => 'yo', 'name' => 'Yorùbá', 'status' => 'offline' ],
			[ 'key' => 'zh', 'name' => '中文', 'status' => 'offline' ]
        ]);

        $data = File::get('database/data/countries.json');

        foreach (json_decode($data) as $obj) {
        	App\Countries::create([
        		'name' => $obj->name,
        		'short_code' => $obj->short_code,
        		'phone_code' => $obj->phone_code,
        		'status' => $obj->status,
        		'longitude' => $obj->longitude,
        		'latitude' => $obj->latitude,
        		'zoom' => $obj->zoom
        	]);
        }

        $data = File::get('database/data/states.json');

        foreach (json_decode($data) as $obj) {
        	App\States::create([
        		'name' => $obj->name,
        		'country_id' => $obj->country_id,
        		'longitude' => $obj->longitude,
        		'latitude' => $obj->latitude,
        		'zoom' => $obj->zoom
        	]);
        }

        $data = File::get('database/data/cities.json');

        foreach (json_decode($data) as $obj) {
        	App\Cities::create([
        		'name' => $obj->name,
        		'state_id' => $obj->state_id,
        		'longitude' => $obj->longitude,
        		'latitude' => $obj->latitude,
        		'zoom' => $obj->zoom
        	]);
        }
    }
}