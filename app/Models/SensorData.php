<?php
// app/Models/SensorData.php
// app/Models/SensorData.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class SensorData extends Model
{
    use HasFactory;

    protected $table = 'laravel'; 

    
    protected $fillable = [
        'id',
        //'board',
        'temperature',
        'humidity',
        'status_read_sensor_dht11',
        'lux',
        'status_read_sensor_lux',
        'water',
        'status_read_sensor_water',
        'ground',
        'status_read_sensor_ground',
        'rain',
        'status_read_sensor_rain',
        'time',
        'date',
    ];

    //Deshabilitar los timestamps automáticos de Laravel
    public $timestamps = false;

    //Mutators para manejar automáticamente date y time
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $currentTime = Carbon::now()->setTimezone('America/Santiago');
            $model->date = $currentTime->format('Y-m-d');
            $model->time = $currentTime->format('H:i:s');
        });

        static::updating(function ($model) {
            $currentTime = Carbon::now()->setTimezone('America/Santiago');
            $model->date = $currentTime->format('Y-m-d');
            $model->time = $currentTime->format('H:i:s');
        });
    }
}


