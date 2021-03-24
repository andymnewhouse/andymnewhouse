<div>
    <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">
            @foreach($activities as $activity)
            <div class="p-6 {{ $activity['id'] == $active ? 'bg-green-500' : '' }}">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="{{ $activity['color'] }}" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                    </svg>
                    <div>
                        <div class="ml-4 text-lg font-semibold leading-7 text-gray-900 dark:text-white">{{ $activity['name'] }}</div>
                        @if($activity['id'] === $active)
                        <div class="ml-4 text-sm text-gray-900 dark:text-white">Started {{ $started }}</div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
