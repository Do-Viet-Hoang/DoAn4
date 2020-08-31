<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(sanpham::class);
    }
}
class sanpham extends Seeder
{
    public function run()
    {
        DB::table('san_pham')->insert(
            [
                [
                    'id'=>'6',
                    'id_loai'=>'1',
                    'name'=>'abc',
                    'hangsp'=>'abc',
                    'gia'=>'10000000',
                    'manhinh'=>'abc',
                    'hedieuhanh'=>'abc',
                    'cpu'=>'abc',
                    'cameratruoc'=>'abc',
                    'camerasau'=>'abc',
                    'ram'=>'abc',
                    'bonho'=>'abc',
                    'sim'=>'abc',
                    'pin'=>'abc',
                    'hinhanh'=>'iphonexs.jpg',
                ],
                [
                    'id'=>'7',
                    'id_loai'=>'1',
                    'name'=>'abc',
                    'hangsp'=>'abc',
                    'gia'=>'10000000',
                    'manhinh'=>'abc',
                    'hedieuhanh'=>'abc',
                    'cpu'=>'abc',
                    'cameratruoc'=>'abc',
                    'camerasau'=>'abc',
                    'ram'=>'abc',
                    'bonho'=>'abc',
                    'sim'=>'abc',
                    'pin'=>'abc',
                    'hinhanh'=>'abc',
                ]

            ]
            );
    }
}
