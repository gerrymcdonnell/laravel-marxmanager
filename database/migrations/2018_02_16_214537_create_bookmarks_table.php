<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('url');
            $table->string('description');

            $table->integer('user_id');

            $table->timestamps();
        });


        //setup default data
        $rows = [
            [
                'name' => 'rte',
                'url'=>'http://www.rte.ie',
                'description'=>'desc goes here',
                'user_id'=>1,
                'created_at'=>date('Y-m-d G:i:s'),
                'updated_at'=>date('Y-m-d G:i:s')
            ],
            [
                'name' => 'rte2',
                'url'=>'http://www.rte2.ie',
                'description'=>'desc goes here',
                'user_id'=>1,
                'created_at'=>date('Y-m-d G:i:s'),
                'updated_at'=>date('Y-m-d G:i:s')
            ]
        ];

        // insert records
        DB::table('bookmarks')->insert($rows);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookmarks');
    }
}
