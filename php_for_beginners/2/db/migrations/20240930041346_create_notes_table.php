<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateNotesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $notes = $this->table('notes', ['id' => true]);
        $notes->addColumn('title', 'string', ['limit' => 100])
            ->addColumn('content', 'text')
            ->addColumn('user_id', 'integer')
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime');

        $notes->addForeignKey('user_id', 'users', 'id', ['delete' => 'CASCADE', 'update' => 'CASCADE']);

        $notes->create();
    }
}
