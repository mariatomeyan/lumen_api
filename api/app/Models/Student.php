<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'Country','IdentificationNo','DateOfBirth','RegisteredOn','UserId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

}
