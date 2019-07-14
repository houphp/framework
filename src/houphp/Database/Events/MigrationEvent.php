<?php

namespace Houphp\Database\Events;

use Houphp\Database\Migrations\Migration;
use Houphp\Contracts\Database\Events\MigrationEvent as MigrationEventContract;

abstract class MigrationEvent implements MigrationEventContract
{
    /**
     * An migration instance.
     *
     * @var \Houphp\Database\Migrations\Migration
     */
    public $migration;

    /**
     * The migration method that was called.
     *
     * @var string
     */
    public $method;

    /**
     * Create a new event instance.
     *
     * @param  \Houphp\Database\Migrations\Migration  $migration
     * @param  string  $method
     * @return void
     */
    public function __construct(Migration $migration, $method)
    {
        $this->method = $method;
        $this->migration = $migration;
    }
}
