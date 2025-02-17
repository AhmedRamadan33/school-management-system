<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $table = 'promotions';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة القديمة في جدول الترقيات
    public function fromGrade()
    {
        return $this->belongsTo(Grade::class, 'from_grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف القديم في جدول الترقيات
    public function fromClassroom()
    {
        return $this->belongsTo(Classroom::class, 'from_classroom');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم القديم في جدول الترقيات
    public function fromSection()
    {
        return $this->belongsTo(Section::class, 'from_section');
    }

    // علاقة بين الترقيات والمراحل الدراسية لجلب اسم المرحلة الجديدة في جدول الترقيات
    public function toGrade()
    {
        return $this->belongsTo(Grade::class, 'to_grade');
    }


    // علاقة بين الترقيات الصفوف الدراسية لجلب اسم الصف الجديد في جدول الترقيات
    public function toClassroom()
    {
        return $this->belongsTo(Classroom::class , 'to_classroom');
    }

    // علاقة بين الترقيات الاقسام الدراسية لجلب اسم القسم الجديد في جدول الترقيات
    public function toSection()
    {
        return $this->belongsTo(Section::class, 'to_section');
    }
}
