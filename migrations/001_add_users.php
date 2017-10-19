<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_users extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
            ),
            'user_name' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '256',
            ),
            'user_email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '256',
                    // 'unique'     => TRUE,
            ),
            'user_pass' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '256',
            ),
            'emp_id' => array(
                    'type' => 'INT',
                    'null' => TRUE,
            ),

        ));
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->add_field('CONSTRAINT FOREIGN KEY (emp_id) REFERENCES test(test_id)');
        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}