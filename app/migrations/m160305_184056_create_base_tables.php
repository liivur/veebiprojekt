<?php

use yii\db\Migration;

class m160305_184056_create_base_tables extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'email' => $this->string(),
            'code' => $this->string(),
            'party_id' => $this->integer(),
            'voting_area' => $this->integer(),
            'candidacy_area' => $this->integer(),
            'vote_id' => $this->integer(),
            'is_admin' => $this->boolean()->defaultValue(0),
        ]);

        $this->createTable('credentials', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'token' => $this->string(),
        ]);

        $this->createTable('parties', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);

        $this->createTable('areas', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
        $this->dropTable('credentials');
        $this->dropTable('parties');
        $this->dropTable('areas');
    }
}
