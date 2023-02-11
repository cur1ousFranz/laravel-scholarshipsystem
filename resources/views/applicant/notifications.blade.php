<x-layout title="Edukar | Notifications">
    <x-container>
        <h5 class="px-2">Notifications</h5>
        <ul class="list-group">
            @if (auth()->user()->notifications->count() != 0)
                @foreach (auth()->user()->unreadNotifications as $notification)
                    <li class="list-group-item border mb-1 border-top-0 border-end-0 border-bottom-0 border-primary">
                        <a class="text-decoration-none text-dark dropdown-item"
                        href="{{ route('notification', $notification->id) }}">
                            {{ $notification->data['title'] }}
                            <p class="p-0 m-0 text-end" style="font-size: 11px">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </a>
                    </li>
                @endforeach
                @foreach ( auth()->user()->readNotifications as $notification )
                    <li class="list-group-item border-0 @if($loop->last) mb-2 @endif">
                        <a  href="{{ route('notification', $notification->id) }}" class="dropdown-item text-secondary">
                            {{ $notification->data['title'] }}
                            <p class="p-0 m-0 text-end" style="font-size: 11px">
                                {{ $notification->created_at->diffForHumans() }}
                            </p>
                        </a>
                    </li>
                @endforeach
            @else
                <hr class="mt-1 mb-1">
                <li class="list-group-item border-0 text-muted text-center">Nothing to show</li>
            @endif

        </ul>
    </x-container>
</x-layout>