<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateForumTable extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id' => [
        'type'           => 'INT',
        'constraint'     => 11,
        'unsigned'       => true,
        'auto_increment' => true,
      ],
      'judul' => [
        'type'       => 'VARCHAR',
        'constraint' => '255',
      ],
      'kategori' => [
        'type'       => 'VARCHAR',
        'constraint' => '50',
      ],
      'isi' => [
        'type' => 'TEXT',
      ],
      'user_id' => [
        'type'       => 'INT',
        'constraint' => 11,
        'unsigned'   => true,
        'null'       => true,
      ],
      'created_at' => [
        'type'    => 'DATETIME',
        'default' => 'CURRENT_TIMESTAMP',
      ],
      'updated_at' => [
        'type'    => 'DATETIME',
        'null'    => true,
      ],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('forum');
  }

  public function down()
  {
    $this->forge->dropTable('forum');
  }
}
