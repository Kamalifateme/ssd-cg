<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Updates extends MX_Controller {
    private static $buyer_lang = 'We are unable to verify your purchase';
    private static $username_lang = 'Please set your envato username correctly';
 
    function __construct()
    {
        parent::__construct();
        $this->load->library('tank_auth');
        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('logout');
        }
        $this -> load -> helper('curl');
        $this -> load -> helper('file');
        $this->clean_old_files();

    }

    function index(){ 
        $this->load->module('layouts');
        $this->load->library('template');

        $this->template->title(lang('updates').' - '.config_item('company_name'));

        $data['page'] = lang('settings');

        Applib::pData();

        $installed_version = config_item('version');
        $releases = json_decode(remote_get_contents(UPDATE_URL.'version.php'),true);

        Applib::switchon();

        $data['latest_version'] = $releases['version'];
        $data['release_date'] = $releases['release_date'];
        $data['update_tips'] = $releases['update_tips'];

        $data['backups'] = get_filenames('./resource/backup/');
        $data['updates'] = get_filenames('./resource/updates/');
        $this->template
            ->set_layout('users')
            ->build('update',isset($data) ? $data : NULL);
        }

        function get_update($update = NULL){

        if($update){

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,UPDATE_URL.'files/'.$update);

        $fp = fopen('./resource/updates/'.$update, 'w+');
        curl_setopt($ch, CURLOPT_FILE, $fp);

        curl_exec ($ch);

        curl_close ($ch);
        fclose($fp);
            
        }
        redirect('updates');
    }

    function backup(){
            $this->mysql_backup();
            if (!is_dir('./resource/backup/')) {
                Applib::make_flashdata(
                    array(
                        'response_status' => 'error',
                        'message' => 'Create a folder named backup in resource folder'
                        ));
                redirect($_SERVER['HTTP_REFERER']);
            }
            if(!is_writeable("./resource/backup/")){
                    Applib::make_flashdata(
                    array(
                        'response_status' => 'error',
                        'message' => 'We are unable to write to resource/backup folder'
                        ));
                    redirect($_SERVER['HTTP_REFERER']);
                }

            $this->load->library('zip');
            $path = './';
            $this->zip->read_dir($path);
            $this->zip->archive('./resource/backup/freelancer_office_full_backup_'.date('Y-m-d').'.zip');
            Applib::make_flashdata(
                    array(
                        'response_status' => 'success',
                        'message' => 'Backup created and saved in resource/backup folder'
                        ));
            redirect($_SERVER['HTTP_REFERER']);

}

    function install(){
        $releases = json_decode(remote_get_contents(UPDATE_URL.'version.php'),true);

        $latest_version = $releases['version'];
        $zip = new ZipArchive;
        if ($zip->open('./resource/updates/'.$latest_version.'.zip') === TRUE) {
        $zip->extractTo('./');
        $zip->close();
        // perform db changes
        $this->migrate_db($latest_version);
            $response = 'success'; $message = 'Software updated successfully.';
        } else {
            $response = 'error'; $message = 'Please click on Download Updates to continue.';
        }
            
            Applib::make_flashdata(
                    array(
                        'response_status' => $response,
                        'message' => $message
                        ));
            redirect($_SERVER['HTTP_REFERER']);

}

function migrate_db($version = NULL){
         $this->load->database();  
         $version = ($version == NULL) ? config_item('version') : $version;  

         $templine = '';
        // Read in entire file
            $lines = file('./resource/'.'upgrade_'.$version.'.sql');
                foreach ($lines as $line)
                    {
                     if (substr($line, 0, 2) == '--' || $line == '')
                        continue;
                        $templine .= $line;
                        if (substr(trim($line), -1, 1) == ';')
                            {
                             $this->db->query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                                        $templine = '';
                            }           
                            
                    }
                    return TRUE;
            
    }


    function mysql_backup(){
        $this->load->dbutil();
        $prefs = array('format' => 'zip', 'filename' => 'database-full-backup_'.date('Y-m-d'));

        $backup =& $this->dbutil->backup($prefs); 

        if ( ! write_file('./resource/backup/database-full-backup_'.date('Y-m-d').'.zip', $backup))
            {
                $this->session->set_flashdata('response_status', 'error');
                $this->session->set_flashdata('message', 'Database backup failed cannot write to /resource/database.backup folder.');
                redirect('updates');
            }
        
        return TRUE;
    }

    public function clean_old_files(){
        if(is_dir('./UPDATES/')){
            if(!rmdir('./UPDATES'))
            rename('./UPDATES','./delete_this');
        }
    }
        
}

/* End of file updater.php */