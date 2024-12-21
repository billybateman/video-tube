<?php

class ApiController extends BaseController
{
	public function index(){
            
    }
        
    public function db_migration(){
        
        $output = '';
        
        // Read migration folder and file .sql files
        $files = glob(__APP_PATH.'/migrations/*.sql');
        
        foreach($files as $file){
            /* Excute */
            $command = "mysql --user={".DB_USER."} --password='{".DB_PASSWORD."'
                    . '}' "
            . "-h {".DB_HOST."} -D {".DB_NAME."} < {$script_path}";

            $output = shell_exec($command . _APP_PATH.'/migrations/'.$file);
            
            /* Archive */
            $new_file = $file.'_'.timestamp();
            
            rename(_APP_PATH.'/migrations/'.$file, _APP_PATH.'/migrations/archive/'.$new_file);
        }
        
        print_r($output);
	}
	
}