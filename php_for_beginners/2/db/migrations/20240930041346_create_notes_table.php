<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateNotesTable extends AbstractMigration
{
    public function change(): void
    {
        $notes = $this->table('notes', ['id' => true]);
        $notes->addColumn('title', 'string', ['limit' => 100])
            ->addColumn('content', 'text')
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime');

        $notes->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE']);

        $notes->create();
    }
}
