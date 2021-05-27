<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_chart extends CI_Controller {

    public function index()
    {
        
        $dataJson = shell_exec("curl https://api.kawalcorona.com/indonesia/");
        $decode = json_decode($dataJson, true);
        foreach($decode as $key){
            $nama      = $key['name'];
            $positif   = $key['positif'];
            $sembuh    = $key['sembuh'];
            $meninggal = $key['meninggal'];
            $dirawat   = $key['dirawat'];
        }
    
        $data = array(
            'title'      => "Chart Covid-19", 
            'positif'    => $positif,
            'sembuh'     => $sembuh,
            'meninggal'  => $positif,
            'dirawat'    => $dirawat,
        );

        $this->load->view('home/chart', $data, FALSE);
    
    }

}

/* End of file C_chart.php */
