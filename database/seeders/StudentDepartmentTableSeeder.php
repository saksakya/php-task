<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentDepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $departments = Department::all();

        foreach($students as $student){
            $departmentIds = $departments
                ->random(2)     //1件所属をランダムに抽出
                ->pluck('id')   //所属モデルからIDのみを抽出
                ->all();

            $student->departments()->attach($departmentIds);
        }

        // foreach($departments as $department){
        //     $studentIds = $students
        //         ->random(1)     //1件所属をランダムに抽出
        //         ->pluck('id')   //所属モデルからIDのみを抽出
        //         ->all();

        //     $department->students()->attach($studentIds);
        // }
    }
}
