<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {
    function get_all_categories()
     {
         return $this->db->query("SELECT * FROM category")->result_array();
     }
    function get_product_by_id($product_id)
     {
          return $this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array();
     }
     function add_product($product)
     {
        $query = "INSERT INTO products (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], 'Now()', 'Now()'); 

         return $this->db->query($query, $values);
     }

    function delete_product($product_id)
    {  //TO DO

        $query = "DELETE comments, messages 
                  FROM comments, messages 
                  WHERE comments.message_id = messages.id  
                  AND messages.id = {$dlt_details['message_id']}";
        return $this->db->query($query);
     }


}