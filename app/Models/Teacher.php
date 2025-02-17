<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    protected $table = 'teachers';
    protected $guarded = [];

        public function specializations()
        {
            return $this->belongsTo(Specialization::class, 'specialization_id');
        }
    
        public function genders()
        {
            return $this->belongsTo(Gender::class, 'gender_id');
        }
    
        public function sections()
        {
            return $this->belongsToMany(Section::class,'teacher_section');
        }
}
