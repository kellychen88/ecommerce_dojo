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
     function product_pages($start, $limit)
    {
        $query = "SELECT * FROM products LIMIT {$start}, {$limit}";
        return $this->db->query($query)->result_array();
    }
    function get_product_by_id($product_id)
     {
        //var_dump($product_id);
        //var_dump($this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array());
        return $this->db->query("SELECT * FROM products WHERE id = ?", array($product_id))->row_array();
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

     function get_cat_id_by_product_id($prod_id){
        return $this->db->query("SELECT category_id FROM products_has_category WHERE products_id = ?", array($prod_id))->row_array();
     }

     function get_all_images_by_id($prod_id){
        return $this->db->query("SELECT * FROM images WHERE product_id = ?", array($prod_id))->result_array();        
     }

     function get_product_by_category_id($cat_id)
     {
        // var_dump("model");
        // var_dump($cat_id);
        // return $this->db->query("SELECT products.*, products_has_category.category_id FROM products left join products_has_category on products.ID = products_has_category.products_id left join category on category.id=products_has_category.category_id WHERE category.ID = ?", array($cat_id))->result_array();

        return $this->db->query("SELECT products.*, products_has_category.category_id FROM products left join products_has_category on products.ID = products_has_category.products_id WHERE products_has_category.category_id = ?", array($cat_id))->result_array();
     }
     function add_shipping($data)
     {
         $query = "INSERT INTO users (name, street_address, city_state, zipcode, created_at, updated_at) 
             VALUES(CONCAT('{$data['first_name_ship']}', '{$data['last_name_ship']}'), CONCAT('{$data['address1_ship']}', '{$data['address2_ship']}'), CONCAT('{$data['city_ship']}', '{$data['state_ship']}'), '{$data['zip_ship']}', NOW(), NOW())";
             return $this->db->query($query);
     }
     function check($user)
     {
         $query = "SELECT * FROM admin WHERE admin.email = '{$user['email']}' AND admin.password = '{$user['password']}'";
         return $this->db->query($query)->row_array();
     }
     function delete_img($img)
     {
        $query = "DELETE FROM images WHERE images = '{$img}'";
        return $this->db->query($query);   
     }
}