<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_type_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('organization_name')->nullable();
            $table->string('member_id')->nullable();
            $table->string('register_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('pan_vat_no')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('website')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('po_box')->nullable();
            $table->string('key_person')->nullable();
            $table->string('establish_date')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->longText('about_company')->nullable();
            // FIles
            $table->string('company_profile')->nullable();
            $table->string('company_cover_image')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_pan')->nullable();
            $table->string('company_register')->nullable();
            $table->string('company_tax_clearance')->nullable();
            //Foreign key
            $table->foreign('member_type_id')->references('id')->on('member_types')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            //Soft delete
            $table->softDeletes();
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
        Schema::dropIfExists('members');
    }
}
