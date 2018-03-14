<?php

use yii\db\Migration;

class m180312_115323_marker extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE {{marker}} ( "
                . "[[id]] INT NOT NULL AUTO_INCREMENT , "
                . "[[map_id]] INT NOT NULL , "
                . "[[lat]] DOUBLE NOT NULL , "
                . "[[lng]] DOUBLE NOT NULL , "
                . "[[created_at]] TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , "
                . "[[type]] TINYINT NOT NULL DEFAULT '0' , "
                . "[[info]] TEXT NOT NULL , "
                . "[[enable]] BOOLEAN NOT NULL DEFAULT TRUE, "
                . "PRIMARY KEY ([[id]]), INDEX [[map_id_index]]([[map_id]])) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        $sql = "DROP TABLE {{marker}}";
        Yii::$app->db->createCommand($sql)->execute();
    }

}
