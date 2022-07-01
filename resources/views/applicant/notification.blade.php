<x-navbar>
    <x-layout>
        <div class="card">
            <div class="card-body">
                @php
                    auth()->user()->unreadNotifications->where('id', $notification->id)->markAsRead();
                @endphp
                <div class="container text-center">
                    <h4 class=" text-uppercase text-decoration-underline">Announcement</h4>
                </div>
                <div class="container mt-5">
                    <h5>{{ json_decode($notification->data)->title; }}</h5>
                </div>
                <div class="container mt-5">
                    <h5>{!! json_decode($notification->data)->message; !!}</h5>
                </div>

            </div>
          </div>
    </x-layout>
</x-navbar>
