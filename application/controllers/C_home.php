<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    public function index()
    {
        $data = array(
            'title' => 'Home', 
        );
        
        $this->load->view('home/index', $data, FALSE);
        
    }

    public function klasifikasi()
    {

        $config['upload_path'] = './upload/images';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']  = '5000';
        $config['file_name'] = '0';
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('photo')){
            $error = array(
                'keterangan' => $this->upload->display_errors()
            );
            
            echo json_encode($error);
        }
        else{
            // $data = array(
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];
            // );
            $hasil = exec('/usr/bin/python3 /opt/lampp/htdocs/backend/klasifikasi/test.py', $output, $ret_code);

           echo $hasil; 
            // // var_dump($data);
            // $data = [
            //     'data' => $upload_data,
            //     'nama' => $file_name,
            //     'hasil' => $hasil,
            // ];
            // $this->load->view('home/result', $data, FALSE);
            
        }
    }

}

/* End of file C_home.php */
