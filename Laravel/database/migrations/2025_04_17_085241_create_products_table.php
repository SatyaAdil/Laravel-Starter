<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id: unsignedBigInteger + primary key + auto increment
            $table->string('name', 255); // name: required
            $table->string('slug', 255)->unique(); // slug: unique
            $table->text('description')->nullable(); // description: nullable
            $table->string('sku', 50)->unique(); // sku: unique
            $table->decimal('price', 10, 2)->default(0); // price: decimal
            $table->integer('stock')->default(0); // stock: default 0
            $table->foreignId('product_category_id')
                ->nullable()
                ->constrained('product_categories')
                ->onUpdate('cascade')
                ->onDelete('set null'); // foreign key
            $table->string('image_url', 255)->nullable(); // image_url: nullable
            $table->boolean('is_active')->default(true); // is_active: default true
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
