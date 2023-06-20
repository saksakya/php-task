
<x-layouts.student-manager>
    <x-slot:title>
        生徒登録
    </x-slot:title>

    <h1>生徒登録</h1>
    @if ($errors->any())

        <x-error-messages :$errors />
    @endif
    <form action="{{route('student.store')}}" method="POST">
        @csrf
        <div>
            <label>生徒番号</label>
            <input type="text" name="sNumber"
                value="{{ old('sNumber') }}">
        </div>
        <div>
            <label>名前</label>
            <input type="text" name="name"
                value="{{ old('name') }}">
        </div>
        <input type="submit" value="送信">
    </form>

</x-layouts.student-manager>
