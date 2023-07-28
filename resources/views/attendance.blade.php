<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class ="date">
                    <form action = "/attendance" method = "POST" >
                        @csrf
                        <button class ="date-button" type="submit" name="date" value="{{ $viewDate->copy()->subDay()->format('Y-m-d') }}">＜</button>
                        {{ $viewDate->format('Y-m-d')}}
                        <button class ="date-button" type="submit" name="date" value="{{ $viewDate->copy()->addDay()->format('Y-m-d') }}">＞</button>
                    </form>
                </div>
                    <table class = "attendance">
                        <tr>
                            <th>名前</th>
                            <th>勤務開始</th>
                            <th>勤務終了</th>
                            <th>休憩時間</th>
                            <th>勤務時間</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->work_start}}</td>
                                <td>{{$user->work_end}}</td>
                                <td>{{$user->break_time}}</td>
                                <td>{{$user->work_time}}</td>
                            </tr>
                        @endforeach
                    </table>
                <div class = "pagination">
                    {{ $users->appends(['date' => $viewDate->format('Y-m-d')])->links('vendor\pagination\custom') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
