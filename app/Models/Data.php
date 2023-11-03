<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public function getRouteKeyName()
    {
        return 'data_number';
    }
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $values = explode(',', $search);
                foreach ($values as $value) {
                    $query->orWhere('data_number', 'like', $value . '%')
                        ->orWhere('status', 'like', '%' . $value . '%')
                        ->orWhere('creator', 'like', '%' . $value . '%')
                        ->orWhere('description', 'like', '%' . $value . '%');
                }
            });
        });
        $query->when($filters['status'] ?? false, function ($query, $status) {
            return $query->where(function ($query) use ($status) {
                return $query->where('status', 'like', '%' . $status . '%');
            });
        });
    }
}
