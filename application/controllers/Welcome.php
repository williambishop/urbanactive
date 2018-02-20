<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->load->helper('url');
            
            $this->active_tab('tab_index');

            $this->load->view('welcome_message');
            $this->load->view('templates/footer.php');
	}
        
        public function about()
	{
            $this->load->helper('url');
            
            $this->active_tab('tab_about');
            
            $this->load->view('about');
            $this->load->view('templates/footer.php');
	}
        
        public function contact( $submit = '')
	{
            $this->load->helper('url');
            $this->load->helper('form');
            
            if($submit == 'submit') {
                $this->submit();
            }
            
            $this->active_tab('tab_contact');
            
            $this->load->view('contact');
            $this->load->view('templates/footer.php');
	}
        
        public function products()
	{
            $this->load->helper('url');
            
            $this->active_tab('tab_product');
            
            $this->load->view('products');
            $this->load->view('templates/footer.php');
	}
        
        public function active_tab($tab)
        {
            $data = array();
            $data['tabs']['tab_index'] = ($tab == 'tab_index' ? 'class="active"': '');
            $data['tabs']['tab_about'] = ($tab == 'tab_about' ? 'class="active"': '');
            $data['tabs']['tab_contact'] = ($tab == 'tab_contact' ? 'class="active"': '');
            $data['tabs']['tab_product'] = ($tab == 'tab_product' ? 'class="active"': '');
            
            $this->load->view('templates/header.php', $data);
        }
        
        private function submit() 
        {
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');
            
            $this->form_validation->set_error_delimiters('<span class="alert-danger">', '</span>');
            
            //Set Customer error messages
            $this->form_validation->set_message('required', '(Required)');
            $this->form_validation->set_message('numeric', '(Must be numeric)');
            $this->form_validation->set_message('is_natural_no_zero', ' (Must be greater than 0)');
            $this->form_validation->set_message('valid_email', ' (Valid Email Required)');
            
            $this->form_validation->set_rules('fname', '', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|is_natural_no_zero');
            $this->form_validation->set_rules('include_images', 'Are you going to provide the images or will we have to create them', 'trim|required');
            //$this->form_validation->set_rules('image_placement', 'Image Placement', 'trim|required');
            
            if($this->input->post('repeat') == 'y') {
                $this->form_validation->set_rules('repeat_frequency', 'How often will this order be repeated', 'trim|required');
            }
            
            $this->form_validation->set_rules('repeat', 'Will this be a repeat order', 'trim|required');
            $this->form_validation->set_rules('address1', 'Address Line 1', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('zip', 'Zip', 'trim|required|numeric|callback_min_length_zip_5');
            
            //$data = $this->security->xss_clean($data);
            
            /*
             * if we decide to let user upload images this will need to be used
             */
//            if ($this->security->xss_clean($file, TRUE) === FALSE) {
//                    // file failed the XSS test
//            }
            

            if ($this->form_validation->run() == FALSE) {
                
            }
            else {
                date_default_timezone_set('America/New_York');
                $this->load->library('email');
                
                $this->email->from('quote@urbangraffiti.com', 'UrbanGraffiti');
                $this->email->to("bish4207@gmail.com");
                $this->email->subject('Urban Graffiti Request for a Quote');
                
                $message = 'Name = ' . $this->input->post('fname') . ' ' . $this->input->post('lname') . "\r\n";
                $message .= 'Email = ' . $this->input->post('email') . "\r\n";
                $message .= 'Phone = ' . $this->input->post('phone') . "\r\n";
                
                
                
                $message .= 'Preferred method of contact = ' . $this->input->post('phone') . "\r\n";
                $message .= 'What products would you like = ' . $this->input->post('phone') . "\r\n";
                $message .= 'Quantity (Best Estimate) = ' . $this->input->post('phone') . "\r\n";
                $message .= 'Are you going to provide the images or will we have to create them = ' . $this->input->post('phone') . "\r\n";
                $message .= 'Image Placement = ' . $this->input->post('phone') . "\r\n";
                $message .= 'Will this be a repeat order = ' . $this->input->post('phone') . "\r\n";
                
                if($this->input->post('repeat') == 'y') {
                    $message .= 'How often will this order be repeated = ' . $this->input->post('phone') . "\r\n";
                }
                
                $message .= 'Short Description = ' . $this->input->post('phone') . "\r\n";
                $message .= 'Address Line 1 = ' . $this->input->post('address1') . "\r\n";
                $message .= 'Address Line 2 = ' . $this->input->post('address2') . "\r\n";
                $message .= 'City = ' . $this->input->post('city') . "\r\n";
                $message .= 'State = ' . $this->input->post('state') . "\r\n";
                $message .= 'Zip = ' . $this->input->post('zip') . "\r\n";

                //$this->email->message( $message ) ;
                $this->email->set_mailtype('html');
                $this->email->send();
                
                mail( 'bish4207@gmail.com', 'test quote', 'message' ) ;
                
                echo 'EMAIL DEBUGGER' . $this->email->print_debugger();
                exit();
                
                $this->load->view('formsuccess');
            }
	}
        
    public function min_length_zip_5($zip)
    {
    	if (strlen($zip) < 5) {
            $this->form_validation->set_message('min_length_zip_5', ' (Must be at least 5 digits)');
            return FALSE;
    	}

    	return TRUE;
    }
}
