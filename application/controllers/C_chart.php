<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_chart extends CI_Controller {

    public function index()
    {

    
        try {

            $dataJson = shell_exec("curl https://api.kawalcorona.com/indonesia/");
            $decode = json_decode($dataJson, true);

            if (!$decode) {
                throw new Exception("Tidak dapat memuat Data Terjadi Kesalahan Pada Server");
            }

            foreach ($decode as $key) {
                $nama      = $key['name'];
                $positif   = $key['positif'];
                $sembuh    = $key['sembuh'];
                $meninggal = $key['meninggal'];
                $dirawat   = $key['dirawat'];
            }

        } catch (\Exception $er) {

            $nama      = 'Memuat';
            $positif   = 'Memuat';
            $sembuh    = 'Memuat';
            $meninggal = 'Memuat';
            $dirawat   = 'Memuat';
            
            // echo $er->getMessage();
            
        } catch (\Throwable $th) {
            
            $nama      = 'Memuat';
            $positif   = 'Memuat';
            $sembuh    = 'Memuat';
            $meninggal = 'Memuat';
            $dirawat   = 'Memuat';
            
            // echo $th->getMessage();
            
        } finally {

            $data = array(
                'title'      => "Chart Covid-19",
                'positif'    => $positif,
                'sembuh'     => $sembuh,
                'meninggal'  => $meninggal,
                'dirawat'    => $dirawat,
            );
            $this->load->view('home/chart', $data, FALSE);
        }

        
    }

}

/* End of file C_chart.php */
