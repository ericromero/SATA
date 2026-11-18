<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $table = 'students';
    protected $primaryKey = 'user_id';
    public $incrementing = false; 
    
    protected $fillable = [
        'user_id', 'account_number', 'sancion_activa', 'evaluaciones_pendientes',
        'has_require_credits', 'has_social_service', 'has_language_clearance', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'User_id');
    }
}