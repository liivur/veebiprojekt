<?php

use yii\db\Migration;

class m160306_102121_create_base_fks extends Migration
{
    public function up()
    {
        $this->addForeignKey('fk-users-party_id', 'users', 'party_id', 'parties', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk-users-voting_area', 'users', 'voting_area', 'areas', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk-users-candidacy_area', 'users', 'candidacy_area', 'areas', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('fk-users-vote_id', 'users', 'vote_id', 'users', 'id', 'SET NULL', 'CASCADE');

        $this->addForeignKey('fk-creadentials-user_id', 'credentials', 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('fk-creadentials-user_id', 'credentials');

        $this->dropForeignKey('fk-users-vote_id', 'users');
        $this->dropForeignKey('fk-users-candidacy_area', 'users');
        $this->dropForeignKey('fk-users-voting_area', 'users');
        $this->dropForeignKey('fk-users-party_id', 'users');
    }
}
