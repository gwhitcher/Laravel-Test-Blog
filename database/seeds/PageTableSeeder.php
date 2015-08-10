<?php

use App\Page;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Seed the tags table
     */
    public function run()
    {
        Page::truncate();

        factory(Page::class, 1)->create();
    }
}