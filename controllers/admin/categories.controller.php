
<?php

class categoriesController extends BaseController
{      
    
    public function index()
    {
        if($this->registry->session->get('user')){
            
            $this->registry->template->total_rows = $this->registry->categories_model->total_rows();
            $this->registry->template->categories_data = $this->registry->categories_model->get_all();
            
            //$this->registry->template->show('admin/header.view.php');
            $this->registry->template->show('admin/categories/categories_browse.view.php');
            //$this->registry->template->show('admin/footer.view.php'); 
        } else {

            login();

        }
    }

    public function create(){
       
        if($this->registry->session->get('user')){
            
            $this->registry->template->show('admin/header.view.php');
            $this->registry->template->show('admin/categories/categorie_form.view.php');
            $this->registry->template->show('admin/footer.view.php');
        } else {

            login();

        }

    }
    
    public function create_action(){
           
        if($this->registry->session->get('user')){
            
            $data = array(
            'categories_name' => $_REQUEST['categories_name'],
            'categories_slug' => $_REQUEST['categories_slug']
            );

            $this->registry->categories_model->create($data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/categories');
        } else {

            login();

        }
        
    }
    
    public function update($id) {
        
        if($this->registry->session->get('user')){
            
            $row = $this->registry->categories_model->get_by_id($id);

            //var_dump($row);

            if ($row) {
                $this->registry->template->data =  $row;
                //$this->registry->template->show('admin/header.view.php');
                $this->registry->template->show('admin/categories/categories_update_form.view.php');
                //$this->registry->template->show('admin/footer.view.php'); 
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/admin/categories');
            }

        } else {

            login();

        }
    }
    
    public function update_action($id){
        
        if($this->registry->session->get('user')){

            $data = array(
            'categories_name' => $_REQUEST['categories_name'],
            'categories_slug' => $_REQUEST['categories_slug']
            );

            $this->registry->categories_model->update($id, $data);
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect('/admin/categories');
        } else {

            login();

        }
        
    }
    
    public function delete($id) {
        if($this->registry->session->get('user')){
            $row = $this->registry->categories_model->get_by_id($id);

            if ($row) {
                $this->registry->categories_model->delete($id);
                //$this->session->set_flashdata('message', 'Delete Record Success');
                redirect('/admin/categories');
            } else {
                //$this->session->set_flashdata('message', 'Record Not Found');
                redirect('/admin/categories');
            }

        } else {

            login();

        }
    }

}