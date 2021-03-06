<?php namespace Delphinium\Dev\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddRolesColumn extends Migration
{
    function up()
    {
        Schema::table('delphinium_dev_configuration', function($table)
        {//add the timezone table
            $table->string('Roles');
        });

    }

    function down()
    {

        Schema::table('delphinium_dev_configuration', function($table)
        {//drop the timezone table
            $table->dropColumn(array('Roles'));
        });
    }
}