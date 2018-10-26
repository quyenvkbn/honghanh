<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('contact_model');
        $this->load->library('session');
    }


    public function edit($id = 1) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('company', 'Tiêu đề', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $contact = $this->contact_model->find($id);
            if(!$contact){
                redirect('admin/contact', 'refresh');
            }
            $this->data['contact'] = $contact;
            $this->render('admin/contact/edit_contact_view');
        } else {
            if ($this->input->post()) {
                $data = array(
                    'company' => $this->input->post('company'),
                    'address' => $this->input->post('address'),
                    'numberphone' => $this->input->post('numberphone'),
                    'email' => $this->input->post('email'),
                    'website' => $this->input->post('website'),
                    'map' => $this->input->post('map'),
                );
                try {
                    $this->contact_model->common_update($id, $data);
                    $this->session->set_flashdata('message', 'Item updated successfully');
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', 'There was an error updating item: ' . $e->getMessage());
                }
                redirect('admin/contact/detail', 'refresh');
            }
        }
    }
    public function detail($id = 1) {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $contact = $this->contact_model->find($id);
        $this->data['detail'] = $contact;
        $this->render('admin/contact/detail_contact_view');
    }

}
