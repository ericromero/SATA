<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'user_id';
    public $incrementing = false; // Importante porque la PK no es auto-incremental aquí
    
    protected $fillable = [
        'user_id', 'account_number', 'sancion_activa', 'evaluaciones_pendientes',
        'has_require_credits', 'has_social_service', 'has_language_clearance', 'is_active'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'User_id');
    }
}