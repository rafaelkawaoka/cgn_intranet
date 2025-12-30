<?php

namespace Database\Seeders;

use App\Models\JapanProvince;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JapanProvinces extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces = [
            ['provincia' => 'AICHI KEN', 'kanji' => '愛知県'],
            ['provincia' => 'AKITA KEN', 'kanji' => '秋田県'],
            ['provincia' => 'AOMORI KEN', 'kanji' => '青森県'],
            ['provincia' => 'CHIBA KEN', 'kanji' => '千葉県'],
            ['provincia' => 'EHIME KEN', 'kanji' => '愛媛県'],
            ['provincia' => 'FUKUI KEN', 'kanji' => '福井県'],
            ['provincia' => 'FUKUOKA KEN', 'kanji' => '福岡県'],
            ['provincia' => 'FUKUSHIMA KEN', 'kanji' => '福島県'],
            ['provincia' => 'GIFU KEN', 'kanji' => '岐阜県'],
            ['provincia' => 'GUMMA KEN', 'kanji' => '群馬県'],
            ['provincia' => 'HIROSHIMA KEN', 'kanji' => '広島県'],
            ['provincia' => 'HOKKAIDO', 'kanji' => '北海道'],
            ['provincia' => 'HYOGO KEN', 'kanji' => '兵庫県'],
            ['provincia' => 'IBARAKI KEN', 'kanji' => '茨城県'],
            ['provincia' => 'ISHIKAWA KEN', 'kanji' => '石川県'],
            ['provincia' => 'IWATE KEN', 'kanji' => '岩手県'],
            ['provincia' => 'KAGAWA KEN', 'kanji' => '香川県'],
            ['provincia' => 'KAGOSHIMA KEN', 'kanji' => '鹿児島県'],
            ['provincia' => 'KANAGAWA KEN', 'kanji' => '神奈川県'],
            ['provincia' => 'KOCHI KEN', 'kanji' => '高知県'],
            ['provincia' => 'KUMAMOTO KEN', 'kanji' => '熊本県'],
            ['provincia' => 'KYOTO FU', 'kanji' => '京都府'],
            ['provincia' => 'MIE KEN', 'kanji' => '三重県'],
            ['provincia' => 'MIYAGI KEN', 'kanji' => '宮城県'],
            ['provincia' => 'MIYAZAKI KEN', 'kanji' => '宮崎県'],
            ['provincia' => 'NAGANO KEN', 'kanji' => '長野県'],
            ['provincia' => 'NAGASAKI KEN', 'kanji' => '長崎県'],
            ['provincia' => 'NARA KEN', 'kanji' => '奈良県'],
            ['provincia' => 'NIIGATA KEN', 'kanji' => '新潟県'],
            ['provincia' => 'OITA KEN', 'kanji' => '大分県'],
            ['provincia' => 'OKAYAMA KEN', 'kanji' => '岡山県'],
            ['provincia' => 'OKINAWA KEN', 'kanji' => '沖縄県'],
            ['provincia' => 'OSAKA FU', 'kanji' => '大阪府'],
            ['provincia' => 'SAGA KEN', 'kanji' => '佐賀県'],
            ['provincia' => 'SAITAMA KEN', 'kanji' => '埼玉県'],
            ['provincia' => 'SHIGA KEN', 'kanji' => '滋賀県'],
            ['provincia' => 'SHIMANE KEN', 'kanji' => '島根県'],
            ['provincia' => 'SHIZUOKA KEN', 'kanji' => '静岡県'],
            ['provincia' => 'TOCHIGI KEN', 'kanji' => '栃木県'],
            ['provincia' => 'TOKUSHIMA KEN', 'kanji' => '徳島県'],
            ['provincia' => 'TOKYO TO', 'kanji' => '東京都'],
            ['provincia' => 'TOTTORI KEN', 'kanji' => '鳥取県'],
            ['provincia' => 'TOYAMA KEN', 'kanji' => '富山県'],
            ['provincia' => 'WAKAYAMA KEN', 'kanji' => '和歌山県'],
            ['provincia' => 'YAMAGATA KEN', 'kanji' => '山形県'],
            ['provincia' => 'YAMAGUCHI KEN', 'kanji' => '山口県'],
            ['provincia' => 'YAMANASHI KEN', 'kanji' => '山梨県'],
        ];

        foreach ($provinces as $province) {
            JapanProvince::create($province);
        }
    }
}
