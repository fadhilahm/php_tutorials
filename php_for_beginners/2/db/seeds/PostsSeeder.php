<?php

use Phinx\Seed\AbstractSeed;

class PostsSeeder extends AbstractSeed
{
    public function run(): void
    {
        // Define initial data for the 'posts' table
        $data = [
            [
                'title' => 'First Post',
                'content' => 'This is the content of the first post.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Second Post',
                'content' => 'This is the content of the second post.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Third Post',
                'content' => 'This is the content of the third post.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Fourth Post',
                'content' => 'This is the content of the fourth post.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'title' => 'Fifth Post',
                'content' => 'This is the content of the fifth post.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Insert the data into the 'posts' table
        $posts = $this->table('posts');
        $posts->insert($data)->save();
    }
}