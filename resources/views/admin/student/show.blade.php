<x-layouts.student-manager>
    <x-slot:title>
        生徒詳細
    </x-slot:title>

    <h1>生徒詳細</h1>

    <ul>
        <li>ID:{{$student->id}}</li>
        <li>生徒番号:{{$student->sNumber}}</li>
        <li>名前:{{$student->name}}</li>
        <li>E-mail:{{$student->email}}</li>
        <li>TwitterID:{{$student->twitter}}</li>
        <li>その他:{{$student->other}}</li>
        <li>所属:
                @foreach ($student->departments as $department)
                    {{$department->name}}
                @endforeach
        </li>
    </ul>
    <a href="{{route('student.index')}}">戻る</a>
</x-layouts.student-manager>
