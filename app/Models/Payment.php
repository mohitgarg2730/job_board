<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'stripe_id',
        'amount',
        'currency',
        'description',
        'customer_email',
        'plan_id',
        'plan_start_date',
        'plan_end_date',
        'user_id',
        'type',
        'plans_details',
    ];

    public function plan()
    {
        return $this->hasOne(Plans::class, 'id', 'plan_id');
    }
}