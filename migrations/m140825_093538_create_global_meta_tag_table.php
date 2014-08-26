<?php

use yii\db\Migration;

class m140825_093538_create_global_meta_tag_table extends Migration
{
	public function safeUp()
	{
		$tableOptions = null;
		if ( $this->db->driverName === 'mysql' )
		{
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

$this->createTable('global_meta_tag', array (
  'id' => 'pk',
  'active' => 'tinyint(1) not null default 1',
  'name' => 'string not null',
  'content' => 'string not null',
  'created_at' => 'int not null',
  'updated_at' => 'int not null',
), $tableOptions);



	}

	public function safeDown()
	{
		$this->dropTable('global_meta_tag');

	}
}
