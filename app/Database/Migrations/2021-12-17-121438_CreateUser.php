<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'emil'       => [
				'type'       => 'VARCHAR',
				'constraint' => '50',
            ],
         'namaPengguna'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
            ],
         'userType'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
            ],
         'userAlias'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
            ],
         'Password'       => [
				'type'       => 'VARCHAR',
				'constraint' => '30',
            ],
         'Status'       => [
				'type'       => 'VARCHAR',
				'constraint' => '1',
            ]
        ]);

        $this->forge->addKey('emil', true);
		$this->forge->createTable('users_uts');
    }

    public function down()
    {
        $this->forge->dropTable('users_uts');
    }
}
