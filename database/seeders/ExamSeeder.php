<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('exam')->insert([
          'language' => 'ar',
          'title' => 'الامتحان الأول',
          'exam_num' => '1',
          'img'=>''
      ],
    );

    DB::table('exam')->insert(
    [
        'language' => 'ar',
        'title' => 'الامتحان الثاني',
        'exam_num' => '2',
        'img'=>''
    ],
  );

  DB::table('exam')->insert(
  [
      'language' => 'en',
      'title' => 'First Examination',
      'exam_num' => '1',
      'img'=>''
  ],
);
DB::table('exam')->insert(
[
    'language' => 'nl',
    'title' => 'Eerste Toets',
    'exam_num' => '1',
    'img'=>''
],
);
DB::table('exam')->insert(
[
    'language' => 'nl',
    'title' => 'Tweede Toets',
    'exam_num' => '2',
    'img'=>''
],
);
    }
}
