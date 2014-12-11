<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Model {
    function get_all_categories()
     {
         return $this->db->query("SELECT * FROM category")->result_array();
     }
    function get_all_products()
     {
         return $this->db->query("SELECT * FROM products")->result_array();
     }
    function get_product_by_id($id)
     {
        return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
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
     function get_product_by_category_id($cat_id)
     {
        return $this->db->query("SELECT products.*, products_has_category.category_id FROM products left join products_has_category on products.ID = products_has_category.products_id WHERE products_has_category.category_id = ?", array($cat_id))->result_array();
     }
     function get_product_by_product_name($product_name)
     {
        return $this->db->query("SELECT * FROM products WHERE name = ?", array($product_name))->result_array();
     }

}