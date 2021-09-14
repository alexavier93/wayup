<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolutionItem extends Model
{
    use HasFactory;


    protected $table = 'solution_items';

    protected $fillable = [
        'solution_id',
        'title',
        'description',
    ];

    public $timestamps = false;
}
