<?php
/*
 * @ https://EasyToYou.eu - IonCube v10 Decoder Online
 * @ PHP 5.6
 * @ Decoder version: 1.0.4
 * @ Release: 02/06/2020
 *
 * @ ZendGuard Decoder PHP 5.6
 */

namespace WHMCS\ApplicationLink;

class Log extends \WHMCS\Model\AbstractModel
{
    protected $table = "tblapplinks_log";
    protected $primaryKey = "id";
    public function createTable($drop = false)
    {
        $schemaBuilder = \Illuminate\Database\Capsule\Manager::schema();
        if ($drop) {
            $schemaBuilder->dropIfExists($this->getTable());
        }
        if (!$schemaBuilder->hasTable($this->getTable())) {
            $schemaBuilder->create($this->getTable(), function ($table) {
                $table->increments("id");
                $table->integer("applink_id", false, true)->default(0);
                $table->string("message", 2000)->default("");
                $table->integer("level")->default(0);
                $table->timestamp("created_at")->default("0000-00-00 00:00:00");
                $table->timestamp("updated_at")->default("0000-00-00 00:00:00");
            });
        }
    }
    public function applicationLink()
    {
        return $this->belongsTo("\\WHMCS\\ApplicationLink\\ApplicationLink", "id", "applink_id");
    }
}

?>