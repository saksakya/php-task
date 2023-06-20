<?php

namespace App\Http\Controllers\Adimin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentPostRequest;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function index():Response
    {
        //生徒一覧を取得
        $students = Student::all();

        //生徒一覧をレスポンスとして返す
        return response()
            -> view('admin/student/index',['students' => $students])
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
        return view('admin/student/create',);
    }

    public function store(StudentPostRequest $request):RedirectResponse
    {
        //生徒登録用のオブジェクトを生成する
        $student = new Student();

        //リクエストオブジェクトからパラメータを取得
        $student->sNumber = $request->sNumber;
        $student->name = $request->name;

        //保存
        $student->save();

        //登録完了後student.indexにリダイレクトする。
        return redirect(route('student.index'))
            ->with('message',$student->sNumber.'を追加しました。');
    }
}
