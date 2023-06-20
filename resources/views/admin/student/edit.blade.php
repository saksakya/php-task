<x-layouts.student-manager>
    <x-slot:title>
        生徒更新
    </x-slot:title>

    <h1>生徒更新</h1>
    @if ($errors->any())
        <x-error-messages :$errors />
    @endif
    <form action="{{route('student.update',$student)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>生徒番号:</label>
            <input type="text" name="sNumber"
                value="{{ old('sNumber', $student->sNumber) }}">
        </div>
        <div>
            <label>名前:</label>
            <input type="text" name="name"
                value="{{ old('name', $student->name) }}">
        </div>
        <div>
            <label>E-mail:</label>
            <input type="text" name="email"
                value="{{ old('email', $student->email) }}">
        </div>
        <div>
            <label>twitter:</label>
            <input type="text" name="twitter"
                value="{{ old('twitter', $student->twitter) }}">
        </div>
        <div>
            <label>others:</label>
            <input type="text" name="other"
                value="{{ old('other', $student->other) }}">
        </div>

        <div>
            <label>所属:</label>
            <select name="department_id">
                @foreach($departments as $department)
                    <option value = "{{$department->id}}"
                        @selected($department->id == old(
                            'department_id',
                            $student->department_id))>
                        {{$department->name}}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="送信">
    </form>
</x-layouts.student-manager>
