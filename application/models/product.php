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
    function get_product_by_id($id)
     {
        return $this->db->query("SELECT * FROM products WHERE id = ?", array($id))->row_array();
     }
     function add_product($product,$main_img_path)
     {
        $query = "INSERT INTO products (name, description, price, main_path, created_at, updated_at) VALUES (?,?,?,?,?,?)";
        $values = array($product['name'], $product['description'], $product['price'], $main_img_path, 'NOW()', 'NOW()'); 
        return $this->db->query($query, $values);
     }
     function edit_product($product,$main_img_path)
     {
        $query = "UPDATE products SET name=?, description=?, price=?, inventory_count=?, main_path=?, updated_at=NOW() WHERE id=?";
        $values = array($product['name'], $product['description'], $product['price'], $product['quantity'], $main_img_path, $product['product_id']); 
        return $this->db->query($query, $values);
     }
     function add_image($product_id,$image)
     {
        $query = "INSERT INTO images (product_id, image_path, filename, main) VALUES (?,?,?,?)";
        $values = array($product_id,$image['image_path'],$image['image_name'],$image['image_main']);
        $this->db->query($query, $values);
     }
     function edit_images($product_id,$image)
     {
        $query = "UPDATE images SET product_id=?, image_path=?, filename=?, main=? WHERE id=?";
        $values = array($product_id,$image['image_path'],$image['image_name'],$image['image_main'], $image['image_ID']);
        return $this->db->query($query, $values);
     }
     function get_all_image_IDs()
     {
        return $this->db->query("SELECT id FROM images")->result_array();
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

     function get_cat_name_by_product_id($prod_id){
        $query = "SELECT category.name FROM category JOIN products_has_category ON category.id = products_has_category.category_id JOIN products ON products.id=products_has_category.products_id WHERE products.id = {$prod_id} ";
//var_dump("get_cat_name_by_product_id"); var_dump($query); die();
        return $this->db->query($query)->row_array();;
     } // for go back

     function get_all_images_by_id($prod_id){
        return $this->db->query("SELECT * FROM images WHERE product_id = ?", array($prod_id))->result_array();        
     }

     function get_product_by_category_id($cat_id)
     {
        return $this->db->query("SELECT products.*, products_has_category.category_id FROM products left join products_has_category on products.ID = products_has_category.products_id WHERE products_has_category.category_id = ?", array($cat_id))->result_array();
     }
    function get_product_by_product_name($product_name)
     {
        return $this->db->query("SELECT * FROM products WHERE name = ?", array($product_name))->result_array();
     } 
     function product_pages_id($start, $limit, $cat_id)
     {
        $query = "SELECT products.*, products_has_category.category_id FROM products 
            left join products_has_category on products.ID = products_has_category.products_id 
            WHERE products_has_category.category_id = {$cat_id} LIMIT {$start}, {$limit}";
        return $this->db->query($query)->result_array();
     }
     function add_shipping($data)
     {
         $query = "INSERT INTO users (name, street_address, city_state, zipcode, created_at, updated_at) 
             VALUES(CONCAT('{$data['first_name_ship']}','.','{$data['last_name_ship']}'), CONCAT('{$data['address1_ship']}','.','{$data['address2_ship']}'), CONCAT('{$data['city_ship']}','.','{$data['state_ship']}'), '{$data['zip_ship']}', NOW(), NOW())";
             return $this->db->query($query);
     }
     function add_order($data)
     {
         $query = "INSERT INTO orders (shipping, amount, status, created_at, updated_at) 
             VALUES({$data['shipping']}, {$data['amount']}, '{$data['status']}', NOW(), NOW())";
             return $this->db->query($query);
     }
     function add_ordered_products($data)
     {
         $query = "INSERT INTO ordered_product (quantity, orders_id, product_id) 
             VALUES({$data['qty']}, {$data['order_id']}, {$data['id']})";
             return $this->db->query($query);
     }
     function insert_orders_users($data)
     {
        $query = "INSERT INTO orders_has_users (orders_id, users_id) 
            VALUES({$data['order_id']}, {$data['user_id']})";
            return $this->db->query($query);
     }
     function check($user)
     {
         $query = "SELECT * FROM admin WHERE admin.email = '{$user['email']}' AND admin.password = '{$user['password']}'";
         return $this->db->query($query)->row_array();
     }

     function get_image_by_id($prod_id)
     {
        return $this->db->query("SELECT image_path FROM images WHERE product_id = ?", array($prod_id))->result_array();
     }
     function delete_img($img_id)
     {
        $query = "DELETE FROM images WHERE ID ='{$img_id}'";
        return $this->db->query($query);   
     }
     function display_all_orders()
     {
        $query = "SELECT orders_has_users.orders_id AS order_id, users.*, DATE_FORMAT(orders.created_at, '%c/%e/%y') as format_date, orders.amount, orders.status 
        FROM orders_has_users JOIN users ON users.id = orders_has_users.users_id JOIN orders ON orders.id = orders_has_users.orders_id";
        return $this->db->query($query)->result_array();  
     }
     function get_order_by_id($order_id)
     {
        $query = "SELECT orders_has_users.orders_id AS order_id, users.name, users.street_address, users.city_state, users.zipcode
            FROM orders_has_users JOIN users ON users.id = orders_has_users.users_id 
            WHERE orders_has_users.orders_id = {$order_id}";
        return $this->db->query($query)->row_array();  
     }
     function get_products_by_id($order_id)
     {
         $query = "SELECT ordered_product.orders_id, ordered_product.quantity, ordered_product.product_id, orders.shipping, orders.amount, orders.status, products.name, products.price
            FROM ordered_product JOIN orders ON orders.id = ordered_product.orders_id
            JOIN products ON products.id = ordered_product.product_id
            WHERE ordered_product.orders_id = {$order_id}";
        return $this->db->query($query)->result_array();
     }
     function get_last_id()
     {
        return $this->db->insert_id();
     }
}