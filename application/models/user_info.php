<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_info extends CI_Model {
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
    function admin_products($start, $limit)
    {
        $query = "SELECT * FROM products LIMIT {$start}, {$limit}";
        return $this->db->query($query)->result_array();
    }
    function all_products()
    {
        $query = "SELECT * FROM products";
        return $this->db->query($query)->result_array();
    }

}