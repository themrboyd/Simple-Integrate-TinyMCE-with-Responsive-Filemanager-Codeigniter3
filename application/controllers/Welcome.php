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
		$this->load->view('welcome_message');
	}
	
	 function tinymce_upload() {


        $path = FCPATH . 'assets/upload/image/';

       
            $config['upload_path']= $path ;
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 5000;
            $config['encrypt_name'] = TRUE;
             
            $this->upload->initialize($config);

            if($this->upload->do_upload("file")){

                $file = $this->upload->data();

                $data = array('upload_data' => $this->upload->data());
                $fileimage= $data['upload_data']['file_name']; 
                $fileimage_full= $data['upload_data']['full_path'];
                chmod($fileimage_full,0777); // CHMOD file

                $this->output
                    ->set_content_type('application/json', 'utf-8')
                    ->set_output(json_encode(['location' => base_url().'assets/upload/image/'.$file['file_name']]))
                    ->_display();
                exit;
            }else{
                $this->output->set_header('HTTP/1.0 500 Server Error');
                exit;
            }
    }
}
