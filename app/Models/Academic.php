<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $table = 'academics';
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    
    protected $fillable = [
        'user_id',
        'employe_number',
        'min_required_hours',
        'contract_id',
        'reprogramaciones_semestre',
        'cancelaciones_semestre',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'User_id');
    }
}