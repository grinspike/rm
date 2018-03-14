<?php

use yii\db\Migration;

class m180312_012008_map extends Migration
{
    public function up()
    {
        $sql = "CREATE TABLE {{map}} ("
                . "[[id]] INT NOT NULL AUTO_INCREMENT ,"
                . "[[clan_id]] INT NOT NULL ,"
                . "[[map_image_link]] TEXT NOT NULL ,"
                . "[[map_upload_time]] TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , "
                . "PRIMARY KEY ([[id]]), INDEX [[clan_id_index]] ([[clan_id]])) ENGINE = InnoDB DEFAULT CHARSET=utf8;";
        Yii::$app->db->createCommand($sql)->execute();
    }

    public function down()
    {
        $sql = "DROP TABLE {{map}}";
        Yii::$app->db->createCommand($sql)->execute();
    }
}
