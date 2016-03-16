<?php
class Product_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function show_products($per_page) {
        $this->load->model('login_model');
        $this->login_model->check_logged();       
        
        $query=$this->db->get('b_products',$per_page,$this->uri->segment(3));
        return $query->result();
    }
    
    public function delete_product($id) {
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $this->db->delete('b_products',array('id_product'=>$id)); //$query=
        if($this->db->affected_rows() > 0){
        return 'deleted' ;}
        else{
        return 'not_deleted';}
    }
    
    public function add_product($type, $brand, $model, $price, $file_name) {
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $data = array(
            'type' => $type,
            'brand' => $brand,
            'model' => $model,
            'price' => $price,
            'img_url' => $file_name
        );

        $this->db->insert('b_products', $data);
        if($this->db->affected_rows() > 0){
        return 'added' ;}//added correctly
        else{
        return 'not_added';}//not added
    }


    public function image_upload() {
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $config['upload_path'] = 'images/products/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;
        $config['max_size'] = '3000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
            $this->db->select_max('id_product');
            $query = $this->db->get('b_products');
            $nu=$query->row()->id_product;
        $config['file_name'] = $nu;
        
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('img_name')) {
            $img_name="";
            //echo $this->upload->display_errors();
        } else {
            $data = $this->upload->data();
        
//Here I set the picture name in the DB    
            $dataa = array(
               'img_url' => $data['file_name']
            );
            $this->db->where('id_product', $nu);
            $this->db->update('b_products', $dataa); 
//End            
            $img_name=$data['file_name'];
            $this->image_resize($img_name);
        }
        return $img_name;
    }    
        
    public function image_resize($img_name) {
        $this->load->model('login_model');
        $this->login_model->check_logged();
        
        $config['image_library'] = 'GD2';
        $config['source_image'] = 'images/products/' . $img_name;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 150;
        $config['height'] = 150;
        $this->image_lib->initialize($config);
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
        echo $this->image_lib->display_errors();
    }
    
}

