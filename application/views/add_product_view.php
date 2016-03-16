<br/>
<?php
echo form_fieldset('<p>Add new product:</p>');
    //$this->load->helper("form");
    echo form_open_multipart("login/add_product");
   
    // Generate the Type camp in the form
    $options1=array(
        ''=>'--- select ---',
        'monitor'=>'monitor',
        'keyboard'=>'keyboard',
        'mouse'=>'mouse',
        'headphones'=>'headphones',
        'speakers'=>'speakers',
        'webcam'=>'webcam'
    );
    echo form_label("Type: ");
    echo form_dropdown("type",$options1,'', 'required="required"');
    echo "<br/>";
    
    // Generate the Brand camp
    $options2=array(
        ''=>'--- select ---',
        'Trust'=>'Trust',
        'Logitech'=>'Logitech',
        'Sony'=>'Sony',
        'Samsung'=>'Samsung',
        'JBL'=>'JBL'
    );    
    echo form_label("Brand: ");
    echo form_dropdown("brand",$options2,'', 'required="required"');
    echo "<br/>";   
    
    // Generate the Model camp    
    echo form_label("Model: ");
    echo form_input(array('name'=>"model",'placeholder' => '--- model ---'));
    echo form_error('model');
    echo "<br/>";
        
    // Generate the Price camp 
    $data1=array(
        'name'=>'price',
        'type'=>'number',
        'placeholder' => '--- price ---'
    );
    echo form_label("Price: ");
    echo form_input($data1);
    echo "<br/>";
        
    // Generate the Img camp    
    $data3=array(
        'name'=>'img_name'
    );
    echo form_label("Select Image: ");
    echo form_upload($data3);
    echo "<br/>";

    echo form_fieldset_close(); 
    
    echo "<br/>";    
    // Generate submit button
    echo form_submit("submit", "Add");
    echo form_reset("Reset","Reset");
    echo form_close();