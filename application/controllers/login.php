<?php
class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //$this->load->model('');
    }
    
    public function index(){
        //$data["page_name"] = "login_view";
        $this->load->view("header");
        $this->load->view("login_view");        
        $this->load->view("footer");
        //$this->load->view("main_template", $data);
    }
    
    public function check_login(){
        //$this->load->library("form_validation");
        $this->form_validation->set_rules("email","Email", "required");
        $this->form_validation->set_rules("pass","Password", "required|min_length[6]");
        $this->form_validation->set_message("required", "%s is required field");
        if ($this->form_validation->run() == FALSE){
            $this->index();
        }
        else{
            $this->load->model("login_model");
            if ($this->login_model->check_user($this->input->post('email'), $this->input->post('pass'))){
                $newdata = array(
                   'email'  => $this->input->post('email'),
                   'logged_in' => TRUE
                );
                $this->session->set_userdata($newdata);
                
                $this->show_wellcome_page();
            }
            else{
                $this->index();
            }
        }
    }
    public function show_wellcome_page() {
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $data["page_name"] = "main_app";
        $data["menu_type"] = "top_menu_admin";
        $this->load->view("main_template", $data);
    }
    
    public function exit1() {
        $this->session->sess_destroy();
        header('Location: '.base_url());
        //$this->index();
    }
    
    public function download_code(){
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $data["page_name"] = "download_code_view";
        $data["menu_type"] = "top_menu_admin";
        $this->load->view("main_template", $data);        
    }  
    
    public function download_code_now(){
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $data = file_get_contents("source_code.rar"); // Read the file's contents
        $name = 'source_code.rar';

        force_download($name, $data);
    }

    
    public function show_all_products($msg=""){
        $this->load->model('login_model');
        $this->login_model->check_logged();

        if(ISSET($msg)&$msg=='deleted'){$data["msg"]="deleted";}
        if(ISSET($msg)&$msg=='not_deleted'){$data["msg"]="error";}
        if(ISSET($msg)&$msg=='added'){$data["msg"]="added";}
        if(ISSET($msg)&$msg=='not_added'){$data["msg"]="not_added";}
        
        
        //Pagination
        $config['base_url'] = base_url().'/index.php/login/show_all_products/';
        //$config['base_url'] = 'http://localhost/012-CI-Login/index.php/login/show_all_products/';
        $config['total_rows'] = $this->db->get('b_products')->num_rows();
        $config['per_page'] = 3;
        $this->pagination->initialize($config);   
        //END Pagination
        
        
        $this->load->model("product_model");
        $all_prods=$this->product_model->show_products($config['per_page']);
        $data["page_name"] = "show_all_products_view";
        $data["menu_type"] = "top_menu_admin";
        $data['prod_array']=$all_prods;
        
        
        
        
        
        $this->load->view("main_template", $data);        
        
    }
    
    public function delete_confirmation($id="",$type,$brand,$model,$price,$img_url=''){
        // Also it can be done by creating a private propertie $all_prods....
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        
        $data["id"]=$id;
        $data["type"]=$type;
        $data["brand"]=$brand;
        $data["model"]=$model;
        $data["price"]=$price;
        $data["img_url"]=$img_url;
        $data["menu_type"] = "top_menu_admin";
        $data["page_name"] = "show_delete_confirmation_view";
        $this->load->view("main_template", $data); 
    }
    
    public function delete_product($id=""){
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        //$data["id"]=$id;
        $this->load->model("product_model");
        $deleted=$this->product_model->delete_product($id);
        $this->show_all_products($deleted);
    }
    
    
    public function add_product_form(){
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $data["page_name"] = "add_product_view";
        $data["menu_type"] = "top_menu_admin";
        $this->load->view("main_template", $data);         
    }
    
    public function add_product() {
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $this->form_validation->set_rules("type","Type", "required");
        $this->form_validation->set_rules("brand","Brand", "required");
        $this->form_validation->set_rules("model","Model", "required");
        $this->form_validation->set_message("required", "%s is required field");
        
        
        if ($this->form_validation->run() == FALSE){
            $this->add_product_form();
        }
        else{
            $this->load->model("product_model");            
            $img_name="";            
            $inserted=$this->product_model->add_product($this->input->post('type'), $this->input->post('brand'), $this->input->post('model'), $this->input->post('price'), $img_name);
            $this->product_model->image_upload();
            $this->show_all_products($inserted);
            }

    }
    
    public function sign_up_form() {
        $this->load->view("header");
        $this->load->view("sign_up_view");        
        $this->load->view("footer");
    }
    
        public function sign_up() {
        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("surname", "Surname", "required");
        $this->form_validation->set_rules("email", "Email", "required|is_unique[b_users.email]");
        $this->form_validation->set_rules("pass", "Password", "required|min_length[6]|matches[pass2]");
        $this->form_validation->set_rules("pass2", "Password confirmation", "required|min_length[6]");
        $this->form_validation->set_message("required", "%s is required field");
        if ($this->form_validation->run() == FALSE) {
            $this->sign_up_form();
        } else {
            $this->load->model("login_model");
            if ($this->login_model->try_sign_up($this->input->post('name'),$this->input->post('surname'),$this->input->post('email'), $this->input->post('pass'))) {
                $this->load->view("signed_up_correct");
                //$this->index();
            } else {
                $this->sign_up_form();
            }
        }
    }

}