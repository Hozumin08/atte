<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action = "/workstart" method = "POST">
                    @csrf
                        <button type="submit">勤務開始</button>
                    </form>
                </div>
                <div class="p-6 text-gray-900">
                    <form action = "/workend" method = "POST">
                    @csrf
                        <button type="submit">勤務終了</button>
                    </form>
                </div>
                <div class="p-6 text-gray-900">
                    <form action = "/breakstart" method = "POST">
                    @csrf
                        <button type="submit">休憩開始</button>
                    </form>
                </div>
                <div class="p-6 text-gray-900">
                    <form action = "/breakend" method = "POST">
                    @csrf
                        <button type="submit">休憩終了</button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
