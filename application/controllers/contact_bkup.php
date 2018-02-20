<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/contact
	 *	- or -
	 * 		http://example.com/index.php/contact/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/contact/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function send()
	{
            $this->load->helper(array('form', 'url'));

            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname', 'First Name', 'trim|required');
            $this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|is_natural_no_zero');
            $this->form_validation->set_rules('include_images', 'Are you going to provide the images or will we have to create them', 'trim|required');
            //$this->form_validation->set_rules('image_placement', 'Image Placement', 'trim|required');
            $this->form_validation->set_rules('repeat_frequency', 'How often will this order be repeated', 'required');
            $this->form_validation->set_rules('repeat', 'Will this be a repeat order', 'trim|required');
            $this->form_validation->set_rules('address1', 'Address Line 1', 'trim|required');
            $this->form_validation->set_rules('city', 'City', 'trim|required');
            $this->form_validation->set_rules('zip', 'Zip', 'trim|required|min_length[5]|numeric');
            

            if ($this->form_validation->run() == FALSE) {
                $this->load->helper('url');
                $this->load->helper('form');

                $data = array();
                $data['tabs']['tab_index'] = '';
                $data['tabs']['tab_about'] = '';
                $data['tabs']['tab_contact'] = 'class="active"';
                $data['tabs']['tab_product'] = '';

                $this->load->view('templates/header.php', $data);
                $this->load->view('contact');
                $this->load->view('templates/footer.php');
            }
            else {
                $this->load->view('formsuccess');
            }
	}
}
