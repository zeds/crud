<?php

use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // articlesテーブルにデータをinsert
        DB::table('blogs')->insert([
            [
            'title' => 'タイトル1',
            'body' => '内容1'
            ],
            [
            'title' => 'タイトル2',
            'body' => '内容2'
            ],
            [
            'title' => 'タイトル3',
            'body' => '内容3'
            ],
        ]);
    }
}
