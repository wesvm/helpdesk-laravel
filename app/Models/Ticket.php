<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni', 'fullnames', 'priority', 'category_id', 'sector', 'subject', 'description', 'status', 'assigned_user_id',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function assignedAdmin()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }
}
