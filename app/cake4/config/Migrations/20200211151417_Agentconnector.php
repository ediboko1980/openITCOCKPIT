<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class Agentconnector extends AbstractMigration {

    public function up() {
        if (!$this->hasTable('agentconnector')) {
            $this->table('agentconnector')
                ->addColumn('hostuuid', 'string', [
                    'default' => null,
                    'limit'   => 255,
                    'null'    => false,
                ])
                ->addColumn('checksum', 'blob', [
                    'default' => null,
                    'null'    => true,
                ])
                ->addColumn('ca_checksum', 'blob', [
                    'default' => null,
                    'null'    => true,
                ])
                ->addColumn('generation_date', 'biginteger', [
                    'default' => null,
                    'null'    => true,
                ])
                ->addColumn('remote_addr', 'string', [
                    'default' => null,
                    'limit'   => 255,
                    'null'    => true,
                ])
                ->addColumn('http_x_forwarded_for', 'string', [
                    'default' => null,
                    'limit'   => 255,
                    'null'    => true,
                ])
                ->addColumn('trusted', 'boolean', [
                    'default' => false,
                    'null'    => false,
                ])
                ->create();
        }
    }

    public function down() {
        if ($this->hasTable('agentconnector')) {
            $this->table('agentconnector')->drop()->save();
        }
    }
}
