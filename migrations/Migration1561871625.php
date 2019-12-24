<?php
  namespace Migrations;
  use Core\Migration;

  class Migration1561871625 extends Migration {
    public function up() {
        $table = "books";
        $this->createTable($table);
        $this->addTimeStamps($table);
        $this->addColumn($table, 'title', 'varchar', ['size' => 150]);
        $this->addColumn($table, 'category', 'varchar', ['size' => 50]);
        $this->addColumn($table, 'description', 'text');
        $this->addColumn($table, 'image_url', 'varchar', ['size' => 100]);
        $this->addColumn($table, 'price', 'decimal', ['precision' => '10,2']);
        $this->addColumn($table, 'inventory', 'int', ['size' => 11]);
        $this->addSoftDelete($table);
        $this->addIndex($table, 'title');
        $this->addIndex($table, 'category');
    }
  }
  