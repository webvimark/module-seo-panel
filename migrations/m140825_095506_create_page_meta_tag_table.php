<?php

use yii\db\Migration;

class m140825_095506_create_page_meta_tag_table extends Migration
{
	public function safeUp()
	{
		$tableOptions = null;
		if ( $this->db->driverName === 'mysql' )
		{
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
		}

$this->createTable('page_meta_tag', array (
  'id' => 'pk',
  'url' => 'string not null unique',
  'title' => 'string',
  'keywords' => 'string',
  'description' => 'string',
  'created_at' => 'int not null',
  'updated_at' => 'int not null',
), $tableOptions);



	}

	public function safeDown()
	{
		$this->dropTable('page_meta_tag');

	}
}
