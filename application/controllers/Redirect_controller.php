<?php 
   class Redirect_controller extends CI_Controller { 
	
      public function index() { 
         /*Load the URL helper*/ 
         $this->load->helper('url'); 
   
         /*Redirect the user to some site*/ 
         redirect('http://www.facebook.com'); 
      }
		
      public function surattugasonline($url) { 
         /*Load the URL helper*/ 
         $this->load->helper('url'); 
         redirect($url); 
         print "<script type=\"text/javascript\">alert('Surat dengan nomor $url tidak mempunyai detail surat');</script>";	
      } 
  
      public function version2() { 
         /*Load the URL helper*/ 
         $this->load->helper('url'); 
   
         /*Redirect the user to some internal controller’s method*/ 
         redirect('redirect/computer_graphics'); 
      } 
		
   } 
?>