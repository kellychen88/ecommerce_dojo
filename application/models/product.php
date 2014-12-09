<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Model {
     function get_all_users()
     {
         return $this->db->query("SELECT * FROM products")->result_array();
     }
     function get_product_by_id($course_id)
     {
         return $this->db->query("SELECT * FROM products WHERE id = ?", array($course_id))->row_array();
     }
     function add_product($product)
     {
        $query = "INSERT INTO products (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array($user['first_name'], $user['last_name'], $user['email'], $user['password'], 'Now()', 'Now()'); 

         return $this->db->query($query, $values);
     }
    function get_product_by_id($product_id)
     {
         return $this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array();
     }

    function add_image($image){
        
    }
}