<?php
  namespace Migrations;
  use Core\Migration;

  class Migration1571327801 extends Migration {
    public function up() {
        $table = "carts";
        $this->createTable($table);
        $this->addTimeStamps($table);
        $this->addColumn($table, 'purchased', 'tinyint');
        
         $table = "cart_items";
        $this->createTable($table);
        $this->addColumn($table, 'cart_id', 'int');
        $this->addColumn($table, 'product_id', 'int');
        $this->addColumn($table, 'quantity', 'int');
        $this->addIndex($table, 'cart_id');
    }
  }
  