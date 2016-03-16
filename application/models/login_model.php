<?php
class Login_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        //$this->load->database();
    }
    public function check_user($email, $pass){
        $r=$this->db->get_where('b_users', array('email' => $email, 'password' => $pass));
        //$r = $this->db->query("SELECT * FROM b_users WHERE email = '$email' AND password='$pass' ");
        if ($r->num_rows() == 0) {
            return false;
        }
        else {
            return true;
        }
    }
    
    public function check_logged() {
        $logged_in=$this->session->userdata('logged_in');
        if($logged_in!=1){
            $this->session->sess_destroy();
            header('Location: '.base_url());            
        }
    }
    
        public function try_sign_up($name,$surname,$email, $pass) {
            $data = array(
                'name' => $name,
                'surname' => $surname,
                'email' => $email ,
                'password' => $pass 
            );
        $this->db->insert('b_users', $data);
        $r=$this->db->affected_rows();
        if ($r == 0) {
            return false;
        } else {
            return true;
        }
    }

}