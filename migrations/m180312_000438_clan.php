<?php

use yii\db\Migration;

class m180312_000438_clan extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE {{clan}} ("
                . "[[id]] int(11) NOT NULL AUTO_INCREMENT,"
                . "[[login]] varchar(100) NOT NULL,"
                . "[[password_master_hash]] varchar(100) NOT NULL,"
                . "[[password_hash]] varchar(100) NOT NULL,"
                . "[[email]] varchar(100) NOT NULL,"
                . "[[created_at]] timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,"
                . "PRIMARY KEY ([[id]]), UNIQUE [[login_unique]] ([[login]](10))) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        $sql = "DROP TABLE {{clan}};";
        Yii::$app->db->createCommand($sql)->execute();
    }

}
