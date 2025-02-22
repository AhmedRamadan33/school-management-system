<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function classses()
    {
        return $this->belongsTo(Classroom::class,'class_id');
    }

    public function teachers()
      {
          return $this->belongsToMany( Teacher::class ,TeacherSection::class);
      }

      
    public function grades()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }


}
