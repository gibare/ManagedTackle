<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakernamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $makernames = [
            ['code' => 1, 'name' => 'SHIMANO（シマノ）'],
            ['code' => 2, 'name' => 'DAIWA（ダイワ）'],
            ['code' => 3, 'name' => 'AbuGarucia（アブガルシア）'],
            ['code' => 4, 'name' => 'Megabass（メガバス）'],
            ['code' => 5, 'name' => 'deps（デプス）'],
            ['code' => 6, 'name' => 'EVERGREEN（エバーグリーン）'],
            ['code' => 7, 'name' => 'Major Craft（メジャークラフト）'],
            ['code' => 8, 'name' => 'tailwalk（テイルウォーク）'],
            ['code' => 9, 'name' => 'パームス'],
            ['code' => 10, 'name' => 'ガマカツ'],
            ['code' => 11, 'name' => 'ニッシン'],
            ['code' => 12, 'name' => 'オリムピック'],
            ['code' => 13, 'name' => 'アピア'],
            ['code' => 14, 'name' => 'アリゲーター'],
            ['code' => 15, 'name' => 'アルファタックル'],
            ['code' => 16, 'name' => 'ウエダ'],
            ['code' => 17, 'name' => 'NFT'],
            ['code' => 18, 'name' => 'オクマ'],
            ['code' => 19, 'name' => 'オフト'],
            ['code' => 20, 'name' => 'ガンクラフト'],
            ['code' => 21, 'name' => 'クレイジーオーシャン'],
            ['code' => 22, 'name' => '黒鯛工房'],
            ['code' => 23, 'name' => 'ゴールデンミーン'],
            ['code' => 24, 'name' => 'ザウルス'], 
            ['code' => 25, 'name' => 'ジークラシック'],
            ['code' => 26, 'name' => 'Gクラフト'],
            ['code' => 27, 'name' => 'CBワン'],
            ['code' => 28, 'name' => 'ジャクソン'],
            ['code' => 29, 'name' => 'ジャッカル'],
            ['code' => 30, 'name' => 'スタジオミネギシ'],
            ['code' => 31, 'name' => 'スミス'],
            ['code' => 32, 'name' => 'セイコー'],
            ['code' => 33, 'name' => 'ゼスタ'],
            ['code' => 34, 'name' => 'ゼナック'],
            ['code' => 35, 'name' => 'ゼニス'],
            ['code' => 36, 'name' => 'ダイコー'],
            ['code' => 37, 'name' => 'ツララ'],
            ['code' => 38, 'name' => 'ティクト'],
            ['code' => 39, 'name' => 'ティムコ'],
            ['code' => 40, 'name' => 'テンリュー'],
            ['code' => 41, 'name' => 'ノリーズ'],
            ['code' => 42, 'name' => 'バリバス'],
            ['code' => 43, 'name' => 'バレーヒル'],
            ['code' => 44, 'name' => 'フェンウィック'],
            ['code' => 45, 'name' => 'ブリーデン'],
            ['code' => 46, 'name' => 'ペン'],
            ['code' => 47, 'name' => 'マミヤOP'],
            ['code' => 48, 'name' => 'MCワークス'],
            ['code' => 49, 'name' => 'ヤマガブランクス'],
            ['code' => 50, 'name' => 'リョービ'],
            ['code' => 51, 'name' => 'レイドジャパン'],
            ['code' => 52, 'name' => 'レジットデザイン'],
            ['code' => 53, 'name' => 'ロデオクラフト'],
            ['code' => 54, 'name' => 'その他'],
        ];
        DB::table('makernames')->insert($makernames);
    }
}
