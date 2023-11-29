<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    protected $table = "rooms";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'hotel_id',
        'title',
        'type',
        'capacity',
        'facility',
        'price',
        'availability',
        'image_url'
    ];

    protected $casts = [
        'facility' => 'array',
        'image_url' => 'array'
    ];
    
    public function hotel() {
        return $this->belongsTo(Hotels::class);
    }
}
