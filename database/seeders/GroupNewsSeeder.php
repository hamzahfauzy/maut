<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Support\Str;

class GroupNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $groups = [
        //     "Kejahatan terhadap Nyawa",
        //     "Kejahatan terhadap Fisik/Badan",
        //     "Kejahatan terhadap Kesusilaan",
        //     "Kejahatan terhadap Kemerdekaan Orang",
        //     "Kejahatan terhadap Hak Milik/Barang dengan Penggunaan Kekerasan",
        //     "Kejahatan terhadap Hak Milik/Barang tanpa kekerasan",
        //     "Kejahatan terkait Narkotika",
        //     "Kejahatan terkait Penipuan, Penggelapan dan Korupsi",
        //     "Kejahatan Terhadap Ketertiban Umum",
        // ];

        // foreach ($groups as $key=>$group) {
        //     Group::insert(["id"=>$key+1, "color"=>"#000000","name"=>$group,"slug"=>Str::slug($group),"status"=>1]);
        // }

        $categories = [
            ["id"=>11, "name"=> "Pembunuhan"],
            ["id"=>21, "name"=> "Penganiayaan Berat"],
            ["id"=>22, "name"=> "Penganiayaan Ringan"],
            ["id"=>23, "name"=> "Kekerasan dalam Rumah Tangga"],
            ["id"=>31, "name"=> "Perkosaan"],
            ["id"=>32, "name"=> "Pencabulan"],
            ["id"=>41, "name"=> "Penculikan"],
            ["id"=>42, "name"=> "Mempekerjakan anak dibawah umur"],
            ["id"=>51, "name"=> "Pencurian dengan kekerasan"],
            ["id"=>52, "name"=> "Pencurian dengan senjata api"],
            ["id"=>53, "name"=> "Pencurian dengan senjata tajam"],
            ["id"=>61, "name"=> "Pencurian ringan"],
            ["id"=>62, "name"=> "Pencurian dengan memberatkan"],
            ["id"=>63, "name"=> "Pencurian sepeda motor"],
            ["id"=>64, "name"=> "Pengrusakan/Penghancuran barang"],
            ["id"=>65, "name"=> "Pembakaran dengan sengaja"],
            ["id"=>66, "name"=> "Penadahan"],
            ["id"=>71, "name"=> "Narkotika dan Psikotoprika"],
            ["id"=>81, "name"=> "Penipuan/Perbuatan Curang"],
            ["id"=>82, "name"=> "Penggelapan"],
            ["id"=>83, "name"=> "Korupsi"],
            ["id"=>91, "name"=> "Terhadap Ketertiban Umum"],
        ];

        foreach ($categories as $cat) {
            Category::insert(["group_id"=> substr($cat["id"], 0, 1), "id"=>$cat["id"],"name"=>$cat["name"]]);
        }

    }
}
