<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class table_t_request extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'nama_request'
    ];
}
