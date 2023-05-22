<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=["first_name", "last_name", "email", "phone", "adress","company_id"];

    public function company()
    {
        return $this->belongsTo(Company::class, "company_id", "id");
    }
}
