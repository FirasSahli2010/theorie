<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('exampart')->insert([
          'exam' => '1',
          'title' => 'القسم الأول',
          'desc' => 'القسم الأول  .......',
          'img' => '',
      ],
      [
          'exam' => '1',
          'title' => 'القسم الثاني',
          'desc' => 'القسم الثاني  .......',
          'img' => '',
      ],
      [
          'exam' => '2',
          'title' => 'القسم الأول',
          'desc' => 'القسم الأول  .......',
          'img' => '',
      ],
      [
          'exam' => '2',
          'title' => 'القسم الثاني',
          'desc' => 'القسم الثاني  .......',
          'img' => '',
      ],
      [
          'exam' => '1',
          'title' => 'First section',
          'desc' => 'First Section .....',
          'img' => '',
      ],
      [
          'exam' => '1',
          'title' => 'Seconf section',
          'desc' => 'Second Section .....',
          'img' => '',

      ],
      [
          'exam' => '2',
          'title' => 'First section',
          'desc' => 'First Section .....',
          'img' => '',
      ],
      [
          'exam' => '2',
          'title' => 'Second section',
          'desc' => 'Second Section .....'
      ],
      [
          'exam' => '1',
          'title' => 'Eerst section',
          'desc' => 'Eerst Section .....',
          'img' => '',
      ],
      [
          'exam' => '1',
          'title' => 'Tweede section',
          'desc' => 'Second Section .....',
          'img' => '',
      ],
      [
          'exam' => '2',
          'title' => 'Eerst section',
          'desc' => 'Eerst Section .....',
          'img' => '',

      ],
      [
          'exam' => '2',
          'title' => 'Tweede section',
          'desc' => 'Tweede Section .....',
          'img' => '',
        ],
      );
      }
  }
