<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    public function scopeFilterMember($query, $type)
    {
        if ($type == 1) {
            $data = $query->orderBy('position_id', 'asc');
        } else if ($type == 2) {
            $data = $query->orderBy('name', 'asc');
        } else {
            $data = $query;
        }
        return $data;
    }
    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCity()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function getBranch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function getPosition()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function getDivision()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}
