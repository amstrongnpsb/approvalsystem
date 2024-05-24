<?php

namespace App\Models;

use Meilisearch\Client;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data extends Model
{
    use HasFactory, HasUuids, Searchable;
    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public function getScoutKey(): mixed
    {
        return $this->id;
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
    public function hasSubData()
    {
        return $this->hasMany(SubData::class, 'data_id', 'id');
    }
    public function scopeCustomFilter($query, array $filters)
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
                return $query->where('status', $status);
            });
        });
    }

    public function toSearchableArray()
    {
        return [
            'data_number' => $this->data_number,
            'description' => $this->description,
            'creator' => $this->creator,
            'status' => $this->status,
        ];
    }

}
