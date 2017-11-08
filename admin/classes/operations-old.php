<?php



// Table Crud Operations
class TableOperations {



  // delete subscriber function
  public function delete_subscriber($id=[]){
    // use wordpress database class
    global $wpdb;

    // get table
    $table_name = $wpdb->prefix . "blog_subscribers_sh";

    // deletion query
    $sql = "DELETE FROM ".$table_name." WHERE id =".$id." LIMIT 1";

    //execute query
    $wpdb->query($sql);

    // update row id numbers and flush cache
    $wpdb->flush();

  }

  // edit subscriber function
  public function edit_subscriber($id="", $email="", $categories=""){
    // use wordpress database class
    global $wpdb;

    // get table
    $table_name = sanitize_text_field($wpdb->prefix . "blog_subscribers_sh");

    //sanitize values
    $ems = sanitize_text_field($email);
    $cats = sanitize_text_field($categories);

    // update query


    $sql ="UPDATE ".$table_name." SET email='".$ems."', categories='".$cats."' WHERE id=".$id." LIMIT 1";

    //execute query
    $wpdb->query($sql);

    // update row id numbers and flush cache
    $wpdb->flush();



  }

}
$table_operations = new TableOperations();
