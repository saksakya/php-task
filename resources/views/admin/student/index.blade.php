
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
        <p><a href="{{ route('api.student.index') }}">API</a></p>
        <p><a href="{{ route('student.create') }}">追加</a></p>
        <table border="1" cellspacing="0" >
            <tr>
                <th>生徒番号</th>
                <th>名前</th>
                <th>E-mail</th>
                <th>TwitterID</th>
                <th>更新</th>
                <th>削除</th>
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
                    <td>
                        <form action="{{route('student.destroy',$student)}}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="削除">
                        </form>
                    </td>
                </tr>

            @endforeach
        </table>
        {{ $students->links() }}
</x-layouts.student-manager>
