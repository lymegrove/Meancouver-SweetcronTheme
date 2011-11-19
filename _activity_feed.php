<?php if (stristr($_SERVER['HTTP_USER_AGENT'], "iPhone")){

$this->load->view('themes/'.$this->config->item('theme').'/_activity_feed-iphone');

}else{

$this->load->view('themes/'.$this->config->item('theme').'/_activity_feed-normal');

} ?>