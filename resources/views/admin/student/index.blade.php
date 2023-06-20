
<x-layouts.student-manager>
        <x-slot:title>
            生徒一覧
        </x-slot:title>
        <h1>生徒一覧</h1>
        @if (session('message'))
            <div style="color:blue">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('student.create') }}">追加</a>
        <table border="1" cellspacing="0" >
            <tr>
                <th>生徒番号</th>
                <th>名前</th>
                <th>E-mail</th>
                <th>TwitterID</th>
                <th>更新</th>
            </tr>
            @foreach ($students as $student)
                <tr>
                    <td><a href="{{route('student.show',$student)}}">{{ $student->sNumber }}</a></td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->twitter }}</td>
                    <td>
                        <a href="{{route('student.edit',$student)}}">
                            <button>更新</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
</x-layouts.student-manager>
