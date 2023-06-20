<?php

namespace App\Http\Controllers\Adimin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentPostRequest;
use App\Http\Requests\StudentPutRequest;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index():Response
    {
        //生徒一覧を取得
        $students = Student::all();

        //生徒一覧をレスポンスとして返す
        return response()
            -> view('admin/student/index',compact('students'))
            -> header('Content-Type','text/html')
            -> header('Content-Encoding','UTF-8');
    }

    public function show(Student $student):View
    {
        //取得した生徒をレスポンスとして返す
        return view('admin/student/show',compact('student'));
    }

    public function create():View
    {
        $departments = Department::all();

        return view('admin/student/create',compact('departments'));
    }

    public function store(StudentPostRequest $request):RedirectResponse
    {
        //生徒登録用のオブジェクトを生成する
        $student = new Student();

        //リクエストオブジェクトからパラメータを取得
        $student->sNumber = $request->sNumber;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->twitter = $request->twitter;
        $student->other = $request->other;

        DB::transaction(function() use($student,$request){
            $student->save();
            $student->departments()->attach($request->department_id);
        });

        //保存
        //$student->save();

        //登録完了後student.indexにリダイレクトする。
        return redirect(route('student.index'))
            ->with('message',$student->sNumber.'を追加しました。');
    }

    public function edit(Student $student):View
    {
        $departments = Department::all();

        $departmentId = $student->departments()->pluck('id')->all();

        return view('admin/student/edit',compact('student','departments','departmentId'));
    }

    public function update(StudentPutRequest $request,Student $student):RedirectResponse{
        //リクエストオブジェクトからパラメータを取得
        $student->sNumber = $request->sNumber;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->twitter = $request->twitter;
        $student->other = $request->other;

        DB::transaction(function() use($student,$request){
            $student->update();
            $student->departments()->sync($request->department_id);
        });
        $student->update();
        return redirect(route('student.index'))
            ->with('message',$student->sNumber.'を更新しました。');
    }

}
