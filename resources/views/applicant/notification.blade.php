<x-navbar>
    <section>
        <x-layout class="d-flex justify-content-center">
            <div class="card shadow-sm w-75 mt-4" >
                <div class="card-body border-top border-bottom border-bottom-4 border-top-4 border-primary">
                    @php
                        auth()->user()->unreadNotifications->where('id', $notification->id)->markAsRead();
                    @endphp
                    <div class="container text-center">
                        <h4 class=" text-uppercase text-decoration-underline">Announcement</h4>
                        <hr>
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
    </section>
</x-navbar>
