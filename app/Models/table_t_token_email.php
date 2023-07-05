<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class table_t_token_email extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'uuid','tgl_expired', 'id_user', 'id_request', 'status_klik'
    ];
}
