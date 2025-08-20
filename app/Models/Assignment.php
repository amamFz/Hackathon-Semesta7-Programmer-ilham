<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'complain_id',
        'assigned_to',
        'assigned_by',
        'assigned_at',
        'completed_at',
        'note',
    ];

    public function complain()
    {
        return $this->belongsTo(Complain::class);
    }

    public function assignedTo()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
