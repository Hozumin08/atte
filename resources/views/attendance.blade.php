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
                                <td>
                                    @if(isset($user->break_time))
                                        {{ $user->break_time }}
                                    @else
                                        00:00:00
                                    @endif
                                </td>
                                <td>
                                    @if(isset($user->work_time))
                                        {{ $user->work_time }}
                                    @else
                                        <?php
                                        // work_startとwork_endが存在する場合のみ、勤務時間を計算
                                        if(isset($user->work_start) && isset($user->work_end)) {
                                            $start = new DateTime($user->work_start);
                                            $end = new DateTime($user->work_end);
                                            $interval = $start->diff($end);
                                            echo $interval->format('%H:%I:%S');
                                        } else {
                                            echo '00:00:00';
                                        }
                                        ?>
                                    @endif
                                </td>
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
