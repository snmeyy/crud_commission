<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Kolom-kolom yang dapat diisi oleh pengguna
    protected $fillable = [
        'name',
        'email',
        'phone',
        'product_id',
        'payment_method',
        'order_description',
        'photos',
    ];

    // Meng-cast kolom 'photos' sebagai array karena disimpan dalam format JSON
    protected $casts = [
        'photos' => 'array',

    ];

    /**
     * Relasi dengan model Product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
