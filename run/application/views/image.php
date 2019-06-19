<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peraturan_view extends Goodsyst_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('download');
        $this->load->helper('file');
        $this->load->helper('string');
    }
    $this->load->helper('file');
    $filename='Untitled_20181127094604.png';
    $imagePaths = '/prog/xampp/htdocs/run/application/uploads/' . $filename;
    if (isset($_REQUEST['src'])) {
     $imageId = intval($_REQUEST['src']);
     if (isset($imagePaths[$imageId]) AND file_exists($imagePaths[$imageId])) {
        $filename='Untitled_20181127094604.png';
        $fn=get_mime_by_extension($filename);
        //$path = '/prog/xampp/htdocs/run/application/uploads/' . $filename;
        header('Content-Length: ' . filesize($imagePaths));
        header("Content-type: $fn");
        header("Content-disposition: inline; filename=$filename");
        readfile($imagePaths);
     } else {
     http_response_code(404);
     }
    }else {
     http_response_code(404);
    }

}