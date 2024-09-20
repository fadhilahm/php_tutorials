<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePostsTable extends AbstractMigration
{
    public function change(): void
    {
        // Creating the 'posts' table
        $table = $this->table('posts');
        $table->addColumn('title', 'string', ['limit' => 255]) // Adds a 'title' column
              ->addColumn('content', 'text')                   // Adds a 'content' column
              ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP']) // Adds a 'created_at' column
              ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP']) // Adds 'updated_at'
              ->create();
    }
}
