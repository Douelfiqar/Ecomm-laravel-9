<?php

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeLignesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_lignes', function (Blueprint $table) {
            $table->primary(['order_id','product_id']);         
            $table->foreignIdFor(Order::class);
            $table->foreignIdFor(Product::class);
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
        Schema::dropIfExists('commande_lignes');
    }
}
