<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor', function (Blueprint $table) {
            $table->bigIncrements('id'); // Clave primaria auto-incrementable
            $table->float('temperature'); // Temperatura
            $table->float('humidity'); // Humedad
            $table->string('status_read_sensor_dht11'); // Estado del sensor DHT11
            $table->float('lux'); // Lux
            $table->string('status_read_sensor_lux'); // Estado del sensor de Lux
            $table->float('water'); // Agua
            $table->string('status_read_sensor_water'); // Estado del sensor de agua
            $table->float('ground'); // Suelo
            $table->string('status_read_sensor_ground'); // Estado del sensor de suelo
            $table->float('rain'); // Lluvia
            $table->string('status_read_sensor_rain'); // Estado del sensor de lluvia
            $table->time('time'); // Hora
            $table->date('date'); // Fecha
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rastreco');
    }
};
