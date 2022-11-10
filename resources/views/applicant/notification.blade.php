<x-layout title="Notification">
    <section>
        <x-container class="d-flex justify-content-center">
            <div class="card shadow-sm w-75 mt-4" >
                <div class="card-body border-top border-bottom border-bottom-4 border-top-4 border-primary">
                    @php
                        auth()->user()->unreadNotifications->where('id', $notification->id)->markAsRead();
                    @endphp
                    <div class="container text-center">
                        <h4 class=" text-uppercase">Announcement</h4>
                        <hr>
                    </div>
                    <div class="container mt-5">
                        <p style="font-size: 16px;">{{ date("F j, Y", strtotime($notification->created_at));  }}</p >
                    </div>
                    <div class="container mt-5">
                        <p style="font-size: 16px;">{{ json_decode($notification->data)->title; }},</p >
                    </div>
                    <div class="container mt-3">
                        <p style="font-size: 16px;">{!! json_decode($notification->data)->message; !!}</p>
                    </div>
                    <div class="container mt-5">
                        <div class="clearfix">
                            <p class="mb-0 float-end" style="font-size: 16px;">{!! json_decode($notification->data)->coordinator; !!}</p >
                        </div>
                        <p class="mt-0 float-end">Scholarship Coordinator</p >
                    </div>
                </div>
            </div>
        </x-container>
    </section>
</x-layout>
