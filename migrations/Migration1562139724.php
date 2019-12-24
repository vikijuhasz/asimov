<?php
  namespace Migrations;
  use Core\Migration;

  class Migration1562139724 extends Migration {
    public function up() {
        $table = 'reviews';
        $this->createTable($table);
        $this->addTimeStamps($table);
        $this->addColumn($table, 'user_id', 'int', ['size' => 11]);
        $this->addColumn($table, 'book_id', 'int', ['size' => 11]);
        $this->addColumn($table, 'body', 'text');
        $this->addIndex($table, 'book_id');
    }
  }
  