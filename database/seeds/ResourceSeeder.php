<?php

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert($this->getData());
    }

    private function getData()
    {
        $data = [];

        $data[] = [
            'url' => 'https://news.yandex.ru/gadgets.rss',
            'created_at' => now()
            ];
        $data[] = [
            'url' => 'https://news.yandex.ru/index.rss',
            'created_at' => now()
        ];
        $data[] = [
            'url' => 'https://news.yandex.ru/martial_arts.rss',
            'created_at' => now()
        ];
        $data[] = [
            'url' => 'https://news.yandex.ru/communal.rss',
            'created_at' => now()
        ];
        $data[] = [
            'url' => 'https://news.yandex.ru/health.rss',
            'created_at' => now()
        ];

        return $data;
    }
}
