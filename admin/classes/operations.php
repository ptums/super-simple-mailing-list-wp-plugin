<?php

// Table Crud Operations

class TableOperations {

  public function hello_world(){
    return "hello world..";
  }

}
$table_operations = new TableOperations();
$hello_world_message = $table_operations->hello_world();
