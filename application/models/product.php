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
        $query = "INSERT INTO products (name, description, price, image_path, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array($product['name'], $product['description'], $product['price'], $product['image_path'], 'Now()', 'Now()'); 
        return $this->db->query($query, $values);
     }
     function get_lastInsertID(){
        return $this->db->query("SELECT LAST_INSERT_ID()")->row_array();        
     }

     function add_cat_relationships($cat_id, $product_id)
     {
        $query = "INSERT INTO products_has_category (products_id, category_id) VALUES (?,?)";
        $values = array($product_id, $cat_id); 
        return $this->db->query($query, $values);        
     }

     function add_cat($cat_id)
     {
        $query = "INSERT INTO category (name, created_at, updated_at) VALUES (?,?,?)";
        $values = array($cat_id,'Now()', 'Now()'); 
        return $this->db->query($query, $values);
     }

     function get_cat_by_id($cat_id)
     {
        return $this->db->query("SELECT * FROM products WHERE id = ?", array($cat_id))->row_array();
     }
}