<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToBlogCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->bigInteger('parent_id')->unsigned()->index()->nullable();
            $table->foreign('parent_id')->references('id')->on('blog_comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_comments', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
}
