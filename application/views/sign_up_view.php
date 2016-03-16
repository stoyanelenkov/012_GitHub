<h1>Sign Up!</h1>
<?php
    echo form_open("login/sign_up");
    
        // Generate the Name camp    
    echo form_label("Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
    echo form_input(array('name'=>"name",'type' => 'text','placeholder' => ' Put your name here...'));
    echo form_error('name');
    echo "<br/>";
    
        // Generate the Surname camp    
    echo form_label("Surname: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
    echo form_input(array('name'=>"surname",'type' => 'text','placeholder' => ' Put your surname here...'));
    echo form_error('surname');
    echo "<br/>";
    
    // Generate el email camp in the form
    $data = array(
        'name' => 'email',
        'type' => 'email',
        'value' => '',
        'maxlength' => '100',
        'size' => '28');
    $data['value'] = set_value('name');
    echo form_label("Email: &nbsp;");
    echo form_input($data);
    echo form_error('email');
    echo "<br/>";
    
    // Generate the password camp
    echo form_label("Password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
    echo form_password("pass");
    echo form_error("pass");
    echo "<br/>";
    
    // Generate the confirm password camp
    echo form_label("Repet password: ");
    echo form_password("pass2");
    echo form_error("pass2");
    echo "<br/>";
    // Generate submit button
    echo form_submit("submit", "Sign up");
    echo form_close();
?>
<p><a href="<?=  site_url('/login');?>">Back</a></p>   
    