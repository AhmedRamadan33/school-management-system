<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherSection extends Model
{
    use HasFactory;
    protected $table = 'teacher_sections';
    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
