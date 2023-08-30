<?php

namespace Erjon\Cone\App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $connection;

    protected $fillable = [
        'key',
        'user_email',
        'used',
        'last_active'
    ];

    public function __construct(array $attributes = [])
    {
        $this->connection = config('cone.connection');

        parent::__construct($attributes);
    }

    /*==============*
     *    Scopes    *
     *==============*/

    public function scopeActivated(Builder $query)
    {
        $query->where('used', true);
    }

    public function scopeNotActivated(Builder $query)
    {
        $query->where('used', false);
    }

    public function scopeDeactivated(Builder $query)
    {
        $query->where('deactivated', true);
    }

    public function scopeNotDeactivated(Builder $query)
    {
        $query->where('deactivated', false)->orWhereNull('deactivated');
    }
}
