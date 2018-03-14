<?php

use yii\db\Migration;

class m180314_020820_public_marker extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE {{public_marker}} ( 
            [[id]] INT NOT NULL AUTO_INCREMENT,
            [[map_id]] INT NOT NULL , 
            [[marker_id]] INT NOT NULL , 
            [[public_token]] BOOLEAN NOT NULL , 
            [[enable]] BOOLEAN NOT NULL , 
            PRIMARY KEY ([[id]])) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        $sql = "DROP TABLE {{public_marker}}";
        Yii::$app->db->createCommand($sql)->execute();
    }
}
