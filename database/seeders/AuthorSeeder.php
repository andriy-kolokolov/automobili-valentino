<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    public function run() : void
    {
        Author::create([
            'name'         => 'Pavel',
            'lastname'     => 'Ivlev',
            'bio'          => 'Member of Kunteynir',
            'social_links' => json_encode(['twitter' => '@technique']),
            'is_active'    => true,
        ]);

        Author::create([
            'name'         => "Antonio",
            'lastname'     => "Margaretti",
            'bio'          => 'Member of Inglorious Bastards',
            'social_links' => json_encode(['twitter' => '@maragretti']),
            'is_active'    => true,
        ]);
    }
}
