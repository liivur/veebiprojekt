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
            'username' => $this->string()->notNull(),
            'password' => $this->string(),
        ]);

        $this->createIndex('users-username-unique', 'users', 'username', true);

        $this->execute("INSERT INTO users (id, name, email, is_admin, username, password) 
            VALUES (1, 'admin', 'admin@example.com', 1, 'admin', SHA1('admin')), (2, 'user', 'user@example.com', 0, 'user', SHA1('user'))");

        $this->createTable('credentials', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'type' => $this->smallInteger()->unsigned(),
            'token' => $this->string(),
        ]);

        $this->execute("INSERT INTO credentials (user_id, type, token) VALUES (1, 1, SHA1('admin')), (2, 1, SHA1('user'))");

        $this->createIndex('credentials-user_id-type-unique', 'credentials', ['user_id', 'type'], true);

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
