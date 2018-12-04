<?php

class Formtest extends CI_Controller
{
    private function get_photo_config(){
        return [
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png',
            'max_size' => 2048,
            'max_width' => 2048,
            'max_height' => 1920,
        ];
    }
    public function index()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('upload', $this->get_photo_config());

        // #TODO Populate $batches from test.batchrepresentative.batch
        $batches = [2008, 2009, 2010];

        // $form_maker_data -> Data required for initializing view
        $form_maker_data["Batch_Nb"] = $batches;

        // Form Validation Rules:
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="errormsg">', '</p>');
        $this->form_validation->set_rules('Batch', 'Batch Year', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        // #TODO add validation for photo field
        $this->form_validation->set_rules('photo', 'Photo', 'callback_photo_check');
        // if (empty($_FILES['photo']['name']))
        // {
        //     $this->form_validation->set_rules('photo', 'Photo', 'required');
        // }
        $this->form_validation->set_rules('father', 'Father\'s  Name', 'required');
        $this->form_validation->set_rules('mother', 'Mother\'s  Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required|callback_gender_check');
        $this->form_validation->set_rules('mstat', 'Marital Status', 'required|callback_marital_check');
        $this->form_validation->set_rules('occupation', 'Occupation', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('contact', 'contact', 'required|callback_contact_check');

        // Form Validation
        if ($this->form_validation->run() == false) {
            $this->load->view('formtest', $form_maker_data);
        } else {
            // $data_from_form -> user data to be inserted in test.userinfo
            $data_from_form = [
                'Batch' => $this->input->post('Batch'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'photo' => array('upload_data' => $this->upload->data()),
                'father' => $this->input->post('father'),
                'mother' => $this->input->post('mother'),
                'gender' => $this->input->post('gender'),
                'mstat' => $this->input->post('mstat'),
                'occupation' => $this->input->post('occupation'),
                'designation' => $this->input->post('designation'),
                'contact' => $this->input->post('contact'),
            ];

            $data = ['data' => $data_from_form];

            // #TODO call data insertion function here

            // #TODO on insertion success load payment instruction view
            $this->load->view('Formsuccess', $data);

            // #TODO on insertion failure load register view
        }
    }
    public function photo_check($field)
    {
        if ( ! $this->upload->do_upload('photo')) {
            $this->form_validation->set_message('photo_check', $this->upload->display_errors('<p class="errormsg">', '</p>'));
            return false;
        } else {
            return true;
        }
    }
    public function contact_check($number)
    {
        // regex for contact number: /^(\+88)?(01)([5-9])([0-9]{8})$/
        // for regex help: https://regexr.com/

        if (preg_match('/^(\+88)?(01)([5-9])([0-9]{8})$/', $number)) {
            return true;
        } else {
            $this->form_validation->set_message('contact_check', 'Enter a Valid Number');
            return false;
        }
    }
    public function marital_check($str)
    {
        if ($str == 'married' || $str == 'unmarried') {
            return true;
        } else {
            $this->form_validation->set_message('marital_check', 'Invalid Marital Status');
            return false;
        }
    }
    public function gender_check($str)
    {
        if ($str == 'male' || $str == 'female') {
            return true;
        } else {
            $this->form_validation->set_message('gender_check', 'Invalid Gender');
            return false;
        }
    }
}