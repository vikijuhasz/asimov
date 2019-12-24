<?php
  namespace Migrations;
  use Core\Migration;

  class Migration1561964855 extends Migration {
    public function up() {
        $table = 'categories';
        $this->createTable($table);
        $this->addColumn($table, 'name', 'varchar', ['size' => 100]);
        $this->addIndex($table, 'name');
    }
  }
  