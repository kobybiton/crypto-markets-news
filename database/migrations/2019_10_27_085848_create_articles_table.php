<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('old_id');
            $table->integer('category_id');
            $table->string('category_name');
            $table->string('category_url');
            $table->string('url');
            $table->string('image');
            $table->string('title');
            $table->string('sub_title');
            $table->timestamp('date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('author');
            $table->longText('editordata');
            $table->integer('views')->default(0);
            $table->softDeletes();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
