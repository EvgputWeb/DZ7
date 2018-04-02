<?php
require_once "config.php";

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->dropIfExists('categories');

Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('parent_id')->nullable();
    $table->string('name',100);
});


echo 'Таблицы созданы';


/*
categories
    id [int(10)] - уникальный идентификатор категории
    parent_id [int(10)] - идентификатор категории родителя   foreign key (categories.id)
    name [varchar(100)] - название категории

products
    id [int(10)] - уникальный идентификатор товара
    quantity [int(10)] - количество на складе
    price [decimal(15,2)] - Розничная цена
    unity [varchar(255)] - единица измерения (шт., упаковка, короб и т.п.)
    width [float] - ширина
    height [float] - высота
    depth [float] - глубина
    weight [float] - вес


// Таблица отношений между товарами и категориями.
// Один товар может быть в нескольких категориях.

product_category:
    product_id foreign key (products.id)
    category_id foreign key (categories.id)
    primary key (category_id,product_id)
    position [int(10)] - позиция товара среди других в рамках одной категории

*/