<?php

use yii\db\Migration;

class m180312_124858_pic extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE {{pic}} ( 
            [[id]] INT NOT NULL AUTO_INCREMENT COMMENT 'uses for preview naming also' , 
            [[marker_id]] INT NOT NULL , 
            [[pic_link]] TEXT NOT NULL , 
            [[preview_enable]] BOOLEAN NOT NULL , 
            [[enable]] BOOLEAN NOT NULL , 
            PRIMARY KEY ([[id]]), INDEX [[marker_id_index]] ([[marker_id]])) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        $sql = "DROP TABLE {{pic}}";
        Yii::$app->db->createCommand($sql)->execute();
    }

}
