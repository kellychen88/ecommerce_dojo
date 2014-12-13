<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	private $sort = 'sort_price';

	public function __construct()
	{
		parent::__construct();

		$this->load->model('product');   
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		date_default_timezone_set('America/Los_Angeles'); 
		$name="";
//		$this->output->enable_profiler();		
	}

	public function index()
	{

	if ($this->input->post('sort') == '') {
			$array['sort'] = "price";
		} elseif ($this->input->post('sort') == 'most popular') {
			$array['sort'] = "quantity_sold";
		} else {
			$array['sort'] = $this->input->post('sort');
		}

		if($this->input->get('limit')){ $limit = $this->input->get('limit');}else{$limit = 8;};
	 	if($this->input->get('page')){ $page = $this->input->get('page');}else{$page = 1;};
	 	$start = ( $page - 1 ) * $limit;
		$array['sort'] = "price";
	 	$array['each_page'] = $this->product->product_sorted_pages($start, $limit, $array['sort'] );
	 	$array['category'] = $this->product->get_all_categories();
		$array['product']  = $this->product->get_all_products();	
		$array['id'] = 'all';
		$array['name'] = 'All products';
		
		$this->load->view('category_page', $array);
	}
	
	public function show($id, $name)
	 {

	 	if ($this->input->post('sort') == 'sort_popular') {
			$array['sort'] = "quantity_sold";
		}  else {
			$array['sort'] = "price";
		} 

	 	if($this->input->get('limit')){ $limit = $this->input->get('limit');}else{$limit = 8;};
	 	if($this->input->get('page')){ $page = $this->input->get('page');}else{$page = 1;};
	 	$start = ( $page - 1 ) * $limit;
		$name = str_replace('%20', ' ', $name);
		$array['id'] = $id;
		$array['name'] = $name; 
		$array['category'] = $this->product->get_all_categories();

		if ($id == 'all') {
			$array['product']  = $this->product->get_all_products($array['sort']);
			$array['each_page'] = $this->product->product_sorted_pages($start, $limit, $array['sort']);	

		} else {
			$array['product']  = $this->product->get_product_by_category_id($id);
			$array['each_page'] = $this->product->product_pages_id($start, $limit, $id);	
		}
	//var_dump($array); 
		$this->load->view('category_page', $array);
	}	
	public function add_shipping()
	{
		$cart = $this->session->userdata('cart');
		$shipping = 10;
		$grand_total = 0;
		foreach ($cart as $item)
		{
			foreach($item as $key => $value)
			{
				$prod_id = $key;
				$prod_qty = $value;
				$one_item = $this->product->get_product_by_id($prod_id);
				$total = (($one_item['price'])*($value));
				$grand_total += $total;		
			}
		}
		$order['amount'] = $grand_total;
		$order['shipping'] = $shipping;
		$order['status'] = "process";
		$ship['first_name_ship'] = $this->input->post('first_name_ship');
		$ship['last_name_ship'] = $this->input->post('last_name_ship');
		$ship['address1_ship'] = $this->input->post('address1_ship');
		$ship['address2_ship'] = $this->input->post('address2_ship');
		$ship['city_ship'] = $this->input->post('city_ship');
		$ship['state_ship'] = $this->input->post('state_ship');
		$ship['zip_ship'] = $this->input->post('zip_ship');
		$this->product->add_shipping($ship);
		$user_id = $this->product->get_last_id();
		$this->product->add_order($order);
		$order_id = $this->product->get_last_id();
		$orders_users = array(
			"user_id" => $user_id,
			"order_id" => $order_id
			);
		$this->product->insert_orders_users($orders_users);
		foreach($cart as $item)
		{
			foreach($item as $key => $value)
			{
				$items = array(
					"id" => $key,
					"qty" => $value,
					"order_id" => $order_id
					);
			}
			$this->product->add_ordered_products($items);
		}
		$this->session->unset_userdata('cart_qty');
		$this->session->unset_userdata('cart');
		redirect('products/index');
	}
	
	public function edit_qty_cart($id)
	{
		$new_qty = $this->input->post('qty');
		$cart = $this->session->userdata('cart');
		$cart_qty = $this->session->userdata('cart_qty');

		foreach ($cart as $key_cart => $item)
		{
			if (isset($item[$id]))
			{ 	
				$qty = $item[$id];
				$card_id_update_val=$key_cart;
			}
		}
		$cart[$card_id_update_val] = array(
			"$id" => $new_qty
			);
		$adjust = ($new_qty - $qty);

		if ($adjust > 0)
		{
			$cart_qty = $cart_qty + $adjust;
		}
		else
		{
			$neg_adjust = abs($adjust);
			$cart_qty = $cart_qty - $neg_adjust;
		}	
		// var_dump($adjust);
		$this->session->set_userdata('cart', $cart);
		$this->session->set_userdata('cart_qty', $cart_qty);
		redirect('/products/carts');
	}
	public function delete_item_cart($id)
	{
		$cart = $this->session->userdata('cart');
		$cart_qty = $this->session->userdata('cart_qty');
		foreach ($cart as $key_cart => $item)
		{
			if (isset($item[$id]))
			{ 	
				$qty = $item[$id];
				$card_id_delete=$key_cart;
			}
		}
		$cart_qty -= $qty;
		unset($cart[$card_id_delete]);
		$this->session->set_userdata('cart', $cart);
		$this->session->set_userdata('cart_qty', $cart_qty);
		redirect('/products/carts');
		// var_dump($cart);
	}
	public function search()
	{

		$array['category'] = $this->product->get_all_categories();
		if(isset($_POST['search-product']))
		{
			$array['name'] = $_POST['search-product'];
			$array['each_page'] = $this->product->get_product_by_product_name($_POST['search-product']);
			$this->load->view('category_page', $array);
		}	
	}

	public function prod_details($prod_id)
	{
		$array['cat_name'] = $this->product->get_cat_name_by_product_id($prod_id);
		$array['category'] = $this->product->get_cat_id_by_product_id($prod_id);
		$array['product']  = $this->product->get_product_by_id($prod_id);
		$array['image']  = $this->product->get_image_by_id($prod_id);


		$array['product'] =  $this->product->get_product_by_id($prod_id);
		// $array['image'] = $this->product->get_images_by_id($prod_id);

		$this->load->view('prod_details_page', $array);
	}
	public function carts()
	{
		$items = array();
		$cart = $this->session->userdata('cart');
		if($cart)
		{
			foreach ($cart as $item)
			{

				foreach($item as $key => $value)
				{

					$prod_id = $key;
					$one_item= $this->product->get_product_by_id($prod_id);
					$items['items'][] = array(
						"id" => $one_item['id'],
						"name" => $one_item['name'],
						"price" => $one_item['price'],
						"qty" => $value,
						"total" => (($one_item['price'])*($value))
						);
				}
			}
		}
		$this->load->view('carts_page', $items);
	}

	public function buy($id)
	{
		$cart_qty = $this->session->userdata('cart_qty');
		$cart = $this->session->userdata('cart');
		$item['id'] = $id;
		$item['qty'] = $this->input->post('qty');
		$cart_qty += $item['qty'];
		$cart_item = array(
				"{$item['id']}" => $item['qty']
				);
		// $cart_item[$item['id']] = $item['qty'];
		$cart[] = $cart_item;
		$this->session->set_userdata('cart', $cart);
		$this->session->set_userdata('cart_qty', $cart_qty);
		redirect('/products/carts');
	}

}

//end of main controller