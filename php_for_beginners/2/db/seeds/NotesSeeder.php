<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class NotesSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [];
        $titles = [
            'First Note', 'Second Note', 'Third Note', 'Fourth Note', 'Fifth Note',
            'Sixth Note', 'Seventh Note', 'Eighth Note', 'Ninth Note', 'Tenth Note',
            'Eleventh Note', 'Twelfth Note', 'Thirteenth Note', 'Fourteenth Note', 'Fifteenth Note',
            'Sixteenth Note', 'Seventeenth Note', 'Eighteenth Note', 'Nineteenth Note', 'Twentieth Note',
            'Twenty-First Note', 'Twenty-Second Note', 'Twenty-Third Note', 'Twenty-Fourth Note', 'Twenty-Fifth Note'
        ];

        for ($i = 0; $i < 25; $i++) {
            $data[] = [
                'title' => $titles[$i],
                'content' => 'This is the content of ' . $titles[$i] . '. It contains detailed information and insights about the topic of ' . $titles[$i] . '. The content is designed to provide a comprehensive understanding and thorough explanation of ' . $titles[$i] . '.',
                'user_id' => rand(1, 5),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        }

        $this->table('notes')->insert($data)->saveData();
    }
}
