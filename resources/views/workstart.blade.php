<x-app-layout>
    <div class= "username">{{ Auth::user()->name }}さんお疲れ様です！</div>

    <div class=>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="button-positive">
                    <form action = "/workstart" method = "POST">
                    @csrf
                        <button type="submit">勤務開始</button>
                    </form>
                </div>
                <div class="button-negative">
                    勤務終了
                </div>
                <div class="button-negative">
                    休憩開始
                </div>
                <div class="button-negative">
                    休憩終了
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
