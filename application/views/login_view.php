<?php
    //$this->load->helper("form");
    echo form_open("login/check_login");
    // Generate el email camp in the form
    $data = array(
        'name' => 'email',
        'type' => 'email',
        'value' => '',
        'maxlength' => '100',
        'size' => '24');
    $data['value'] = set_value('name');
    echo form_label("Email: ");
    echo form_input($data);
    echo form_error('email');
    echo "<br/>";
    // Generate the password camp
    echo form_label("Password: ");
    echo form_password("pass");
    echo form_error("pass");
    echo "<br/>";
    // Generate submit button
    echo form_submit("submit", "Login");
    echo form_close();
?>
<p>Not Registered?  <a href="<?=  site_url('/login/sign_up_form');?>"> Sign up </a></p>   
    