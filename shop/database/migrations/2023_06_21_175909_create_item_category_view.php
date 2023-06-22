<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCategoryView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE VIEW item_category_view AS
        SELECT p.id_shopItem, user_id, p.created_at, p.imagePath, p.about, p.price, p.name AS product_name, GROUP_CONCAT(c.name SEPARATOR \', \') AS category_names, GROUP_CONCAT(c.id_shopCategory SEPARATOR \', \') AS category_id
        FROM shop_item p
        JOIN shop_category_item pc ON p.id_shopItem = pc.item_id
        JOIN shop_category c ON pc.category_id = c.id_shopCategory
        GROUP BY p.id_shopItem, p.name
    ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS item_category_view');
    }
}
