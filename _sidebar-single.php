<?php if (stristr($_SERVER['HTTP_USER_AGENT'], "iPhone")){

$this->load->view('themes/'.$this->config->item('theme').'/_sidebar-iphone-single');

}else{

$this->load->view('themes/'.$this->config->item('theme').'/_sidebar-normal-single');

} ?>