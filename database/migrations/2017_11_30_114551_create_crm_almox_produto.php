<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmAlmoxProduto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crm_almox_produto', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('tipo')->nullable(); //->unsigned();
            //$table->foreign('tipo')->references('id')->on('crm_almox_produto_familia');
            $table->text('descricao')->nullable();
            $table->string('unidade', 5)->nullable();
            $table->smallInteger('proporcao')->nullable();
            $table->double('valor', 10.2)->nullable();
            $table->string('tmd')->nullable();
            $table->text('barcode')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('crm_almox_produto');
    }
}
