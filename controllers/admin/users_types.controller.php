
<?php

class users_typesController extends BaseController
{      
    
    public function index()
    {
        $q = '';
        $start = 0;
        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
        }
        if (isset($_REQUEST['start'])) {
            $start = intval($_REQUEST['start']);
        }
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 10;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->users_types_model->total_rows();
        $this->registry->template->users_types_data = $this->registry->users_types_model->get_limit_data(10, $start, $q);
/*
        $this->loadLibrary('pagination');
        $this->pagination->initialize($this->registry->template);

        $this->registry->template->pagination = $this->pagination->create_links();
        */
        //$this->registry->template->show('admin/header.view.php');
        $this->registry->template->show('admin/users_types/users_types_browse.view.php');
        //$this->registry->template->show('admin/footer.view.php'); 
    }
    
   
    public function create(){
       
        //$this->registry->template->show('admin/header.view.php');
        $this->registry->template->show('admin/users_types/users_types_form.view.php');
       // $this->registry->template->show('admin/footer.view.php'); 
    }
    
    public function create_action(){
           
       $data = array(
		'users_types_name' => $_REQUEST['users_types_name'],
		'users_types_value' => $_REQUEST['users_types_value']
	    );

        $this->registry->users_types_model->insert($data);
         //$this->session->set_flashdata('message', 'Create Record Success');
        redirect('/admin/users_types');
        
    }
    
    public function update($id) {
        $row = $this->registry->users_types_model->get_by_id($id);

        if ($row) {
            $this->registry->template->data = $row;
            //$this->registry->template->show('admin/header.view.php');
            $this->registry->template->show('admin/users_types/users_types_update_form.view.php');
            //$this->registry->template->show('admin/footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/users_types');
        }
    }
    
    public function update_action(){
        
        $data = array(
		'users_types_name' => $_REQUEST['users_types_name'],
		'users_types_value' => $_REQUEST['users_types_value']
	    );
        $this->registry->users_types_model->update($_REQUEST['users_types_id'], $data);
        //$this->session->set_flashdata('message', 'Update Record Success');
        redirect('/admin/users_types');
        
    }
    
    public function delete($id) {
        $row = $this->registry->users_types_model->get_by_id($id);

        if ($row) {
            $this->registry->users_types_model->delete($id);
        }

        redirect('/admin/users_types');
    }


}

