<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\NewsStatusEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'author' => \fake()->userName(),
                'status' => NewsStatusEnum::DRAFT->value,
                'description' => \fake()->text(100),
                'created_at' => \now(),
                'updated_at' => \now()
            ];
        }
        return $data;
    }
}
