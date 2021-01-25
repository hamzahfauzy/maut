<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Facades\File;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = new \DirectoryIterator(database_path('dummy/detik/detail'));
        foreach ($files as $file) {
            //do your work here
            $extension = (new \SplFileInfo($file))->getExtension();
            if ($extension != "json") continue;
            $file = File::get(database_path("dummy/detik/detail/{$file}"));
            $datas = collect(json_decode($file));
            foreach ($datas as $data) {
                if (isset($data->titles) && isset($data->data) && isset($data->dateset)) {
                    $article = [
                        "media_id"    => 1,
                        "title"       => $data->titles->title,
                        "description" => $data->data,
                        "event_date"  => $data->dateset->publish_original,
                    ];
                    News::create($article);
                }
            }
        }
    }
}
