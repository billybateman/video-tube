
<?php

class site_infoController extends BaseController
{      
    
    public function index()
    {
        
        if (isset($_REQUEST['q'])) {
            $q = urldecode($_REQUEST['q']);
            $start = intval($_REQUEST['start']);
            
            $this->registry->template->url = "/admin/site_info/?q=". urlencode($q);
            $this->registry->template->first_url = "/admin/site_info/?q=" . urlencode($q);
        } else {
            $q = '';
            $start = 0;
            $this->registry->template->url = "/admin/site_info/";
            $this->registry->template->first_url = "/admin/site_info/";
        }
        
        $this->registry->template->q = $q;
        $this->registry->template->start = $start;
        $this->registry->template->per_page = 10;
        $this->registry->template->page_query_string = TRUE;
        $this->registry->template->total_rows = $this->registry->site_info_model->total_rows();
        $this->registry->template->site_info_data = $this->registry->site_info_model->get_limit_data(10, $start, $q);
/*
        $this->loadLibrary('pagination');
        $this->pagination->initialize($this->registry->template);

        $this->registry->template->pagination = $this->pagination->create_links();
        */
        $this->registry->template->show('admin/header.view.php');
        $this->registry->template->show('admin/site_info/site_info_browse.view.php');
        $this->registry->template->show('admin/footer.view.php'); 
    }
    
    public function view($id){
        $row = $this->registry->site_info_model->get_by_id($id);
        if ($row) {
            $this->registry->template->data = array(
		'site_info_id' => $row->site_info_id,
		'site_info_name' => $row->site_info_name,
		'site_info_description' => $row->site_info_description,
		'site_info_keywords' => $row->site_info_keywords,
		'site_info_modified' => $row->site_info_modified,
	    );
	    
            $this->registry->template->show('admin/header.view.php');
            $this->registry->template->show('admin/site_info/site_info_view.view.php');
            $this->registry->template->show('admin/footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/site_info');
        }
    }

    public function create(){
        $this->registry->template->data = array(
            'button' => 'Create',
            'action' => '/admin/site_info/create_action'
	);
        $this->registry->template->show('admin/header.view.php');
        $this->registry->template->show('admin/site_info/site_info_form.view.php');
        $this->registry->template->show('admin/footer.view.php'); 
    }
    
    public function create_action(){
           
       $data = array(
		'site_info_id' => $row->site_info_id,
		'site_info_name' => $row->site_info_name,
		'site_info_description' => $row->site_info_description,
		'site_info_keywords' => $row->site_info_keywords,
		'site_info_modified' => $row->site_info_modified,
	    );

            $this->registry->site_info_model->insert($data);
            //$this->session->set_flashdata('message', 'Create Record Success');
            redirect('/admin/site_info');
        
    }
    
    public function update($id) {
        $row = $this->registry->site_info_model->get_by_id($id);

        if ($row) {
            $this->registry->template->data = array(
		'site_info_id' => $row->site_info_id,
		'site_info_name' => $row->site_info_name,
		'site_info_description' => $row->site_info_description,
		'site_info_keywords' => $row->site_info_keywords,
		'site_info_modified' => $row->site_info_modified,
	    );
            $this->registry->template->show('admin/header.view.php');
            $this->registry->template->show('admin/site_info/site_info_update_form.view.php');
            $this->registry->template->show('admin/footer.view.php'); 
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/site_info');
        }
    }
    
    public function update_action(){
        
        $data = array(
		'site_info_id' => $row->site_info_id,
		'site_info_name' => $row->site_info_name,
		'site_info_description' => $row->site_info_description,
		'site_info_keywords' => $row->site_info_keywords,
		'site_info_modified' => $row->site_info_modified,
	    );
        $this->registry->site_info_model->update($_REQUEST['site_info_id'], $data);
        //$this->session->set_flashdata('message', 'Update Record Success');
        redirect('/admin/site_info');
        
    }
    
    public function delete($id) {
        $row = $this->registry->site_info_model->get_by_id($id);

        if ($row) {
            $this->registry->site_info_model->delete($id);
            //$this->session->set_flashdata('message', 'Delete Record Success');
            redirect('/admin/site_info');
        } else {
            //$this->session->set_flashdata('message', 'Record Not Found');
            redirect('/admin/site_info');
        }
    }


}

