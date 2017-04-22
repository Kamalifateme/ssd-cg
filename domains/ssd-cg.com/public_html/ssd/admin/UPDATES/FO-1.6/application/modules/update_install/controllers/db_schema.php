<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Db_schema extends MX_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->library('tank_auth');
        $this->load->dbforge();
        if ($this->tank_auth->user_role($this->tank_auth->get_role_id()) != 'admin') {
            $this->session->set_flashdata('response_status', 'error');
            $this->session->set_flashdata('message', lang('access_denied'));
            redirect('');
        }

    }
    function index(){ 
    	$this -> migrate_database();

		$this->session->set_flashdata('response_status', 'success');
        $this->session->set_flashdata('message', lang('database_schema_updated'));
		redirect('update_install');

        }

        function migrate_database(){

        $templine = '';
        // Read in entire file
            $lines = file('./resource/database-structure-v1-6.sql');
                foreach ($lines as $line)
                    {
                     if (substr($line, 0, 2) == '--' || $line == '')
                        continue;
                        $templine .= $line;
                        if (substr(trim($line), -1, 1) == ';')
                            {
                             mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
                                        $templine = '';
                            }           

                    }  
    
        }





        function _set_config(){
        	$sql = "INSERT INTO fx_config (config_key, value) VALUES ('company_vat', '')";
        	if ($this->db->query($sql)) {
        		return TRUE;
        	}
        	
        }

        function _bug_table(){
        	$assign_field = array(
                        'assigned_to' => array(
                                        'name' => 'assigned_to',
                                        'type' => 'VARCHAR',
                                        'constraint' => '64',
                                       ),
                        );
			$this->dbforge->modify_column('bugs', $assign_field);
        }
        function _companies_additional_fields(){
        	$additional_fields = array(
							    'account_username' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 100,
							    ),
							    'account_password' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 64,
							    ),
							    'port' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 32,
							    ),
							    'hostname' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 100,
							    ),
							    'hosting_company' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 100,
							    ),
							);		
		$this->dbforge->add_column('companies', $additional_fields);
        }
        function _create_companies_table(){
        	$companies_fields = array(
							    'co_id' => array(
							        'type' => 'INT',
							        'constraint' => 11,
							        'unsigned' => TRUE,
							        'auto_increment' => TRUE
							    ),
							    'company_ref' => array(
							        'type' => 'INT',
							        'constraint' => 32,
							    ),
							    'company_name' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 255,
							    ),
							    'primary_contact' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 32,
							    ),
							    'company_email' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 64,
							    ),
							    'company_website' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 255,
							    ),
							    'company_phone' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 64,
							    ),
							    'company_address' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 255,
							    ),
							    'city' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 100,
							    ),
							    'country' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 255,
							    ),
							    'VAT' => array(
							        'type' => 'VARCHAR',
							        'constraint' => 64,
							    ),
							);
		$this->dbforge->add_key('co_id', TRUE);		
		$this->dbforge->add_field($companies_fields);
		$this->dbforge->add_field("date_added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table('companies', TRUE);
        }
        function _create_assign_projects_table(){
        	$assign_projects_fields = array(
							    'a_id' => array(
							        'type' => 'INT',
							        'constraint' => 11,
							        'unsigned' => TRUE,
							        'auto_increment' => TRUE
							    ),
							    'assigned_user' => array(
							        'type' => 'INT',
							        'constraint' => 11,
							    ),
							    'project_assigned' => array(
							        'type' => 'INT',
							        'constraint' => 11,
							)
							    );
		$this->dbforge->add_key('a_id', TRUE);		
		$this->dbforge->add_field($assign_projects_fields);
		$this->dbforge->add_field("assign_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table('assign_projects', TRUE);
        }
        function _create_assign_tasks_table(){
        	$assign_task_fields = array(
							    'a_id' => array(
							        'type' => 'INT',
							        'constraint' => 11,
							        'unsigned' => TRUE,
							        'auto_increment' => TRUE
							    ),
							    'assigned_user' => array(
							        'type' => 'INT',
							        'constraint' => 11,
							    ),
							    'project_assigned' => array(
							        'type' => 'INT',
							        'constraint' => 11,
							),
							    'task_assigned' => array(
							        'type' => 'INT',
							        'constraint' => 11,
							)
							    );
		$this->dbforge->add_key('a_id', TRUE);		
		$this->dbforge->add_field($assign_task_fields);
		$this->dbforge->add_field("assign_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table('assign_tasks', TRUE);
        }
}

/* End of file updater.php */