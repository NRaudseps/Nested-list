<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SectionTable extends AbstractMigration
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
        $table = $this->table('sections');
        $table->addIndex(['id'])
            ->addColumn('user_id', 'integer', [])
            ->addColumn('parent_id', 'integer', ['null' => true])
            ->addColumn('name', 'string', ['limit' => 20])
            ->addColumn('description', 'string', ['limit' => 140])
            ->addForeignKey('user_id', 'users', 'id')
            ->create();
    }
}
