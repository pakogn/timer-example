<?php

namespace App\Handlers;

use App\Models\TimeServer;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Carbon;

class DatabaseHandler
{
    /**
     * Check if the database connection is fine.
     *
     * @return bool
     */
    public static function checkConnection()
    {
        try
        {
            Capsule::connection()->getPdo();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * Check if We have the application schema already installed.
     *
     * @return bool
     */
    public function isSchemaInstalled()
    {
        return Capsule::schema()->hasTable('time_servers');
    }

    /**
     * Install the application schema.
     *
     * @return bool
     */
    public static function installSchema()
    {
        if (self::isSchemaInstalled()) {
            return true;
        }

        Capsule::schema()->create('time_servers', function ($table) {
            $table->increments('id');

            $table->dateTime('date');

            $table->timestamps();
        });

        return true;
    }

    public static function initialize()
    {
        TimeServer::create(['date' => Carbon::now()]);
    }

    public static function flush()
    {
        TimeServer::truncate();
        TimeServer::create(['date' => Carbon::now()]);
    }
}
