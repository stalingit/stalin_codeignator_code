<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Cust extends CI_Controller {
    function __construct() { 
        parent::__construct(); 
        $this->load->library('cart'); 
        $this->load->helper('form'); 
        $this->load->helper('url'); 
        $this->load->helper('security'); 
        $this->load->model('Shop_model');   
        $this->load->model('News_model');
        $this->load->library("pagination");
    } 

    public function index($page = 'home') {
    	
       // redirect('cust/user_details');
       $data['page'] =$page;
    	$this->load->view('shop/codeig_example',$data);
    }
    public function view($page = 'home')
    {
    	if ( ! file_exists(APPPATH.'views/shop/'.$page.'.php'))
    	{
    		// Whoops, we don't have a page for that!
    		show_404();
    	}
    	$data['app_path'] = APPPATH;
    	$data['page'] = ucfirst($page); // Capitalize the first letter
    
    	
    	$this->load->view('shop/'.$page, $data);
    	
    }
   
    
    
    
    
    
    

    public function user_details() { 
        $this->load->library('form_validation'); 
        $this->form_validation->set_error_delimiters(); 
 
        // Set validation rules 
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[1]|max_length[125]'); 
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[1]|max_length[125]'); 
        $this->form_validation->set_rules('email', 'Email Address', 'required|min_length[1]|max_length[255]|valid_email'); 
        $this->form_validation->set_rules('email_confirm', 'Comfirmation Email Address', 'required|min_length[1]|max_length[255]|valid_email|matches[email]'); 
        $this->form_validation->set_rules('payment_address', 'Payment Address', 'required|min_length[1]|max_length[1000]'); 
        $this->form_validation->set_rules('delivery_address', 'Delivery Address', 'min_length[1]|max_length[1000]'); 
            
        // Begin validation 
        if ($this->form_validation->run() == FALSE) { 
            $this->load->view('shop/user_details'); 
        } else { 
            $cust_data = array( 
            'cust_first_name' => $this->input->post('first_name'), 
            'cust_last_name' => $this->input->post('last_name'), 
            'cust_email'=> $this->input->post('email'), 
            'cust_address'  => $this->input->post('payment_address'), 
            'cust_created_at' => time()); 
                    
            $payment_code = mt_rand(); 
                    
            $order_data = array( 
            'order_details' => serialize($this->cart->contents()), 
            'order_delivery_address' => $this->input->post('delivery_address'), 
            'order_created_at' => time(), 
            'order_closed' => '0', 
            'order_fulfilment_code' => $payment_code,
            'order_delivery_address' => $this->input->post('payment_address')); 
                    
            if ($this->Shop_model->save_cart_to_database($cust_data, $order_data)) {
                echo 'Order and Customer saved to DB';
            } else {
                echo 'Could not save to DB';
            }
        }        
    } 
}
