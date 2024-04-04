<div>
    <form wire:submit.prevent="sendMessage">
        <div class="overflow-y-auto h-64">
        @foreach ($conversation as $message)
            <div class="flex items-center mb-2">
                <div class="flex-shrink-0 mr-3">
                    <img class="w-6 h-6 rounded-full" src="https://i.pravatar.cc/150?u={{ $message['username'] }}" alt="{{ $message['username'] }}">
                </div>
                <div>
                    <div class="text-sm font-semibold text-gray-900">{{ $message['username'] }}</div>
                    <div class="text-sm text-gray-700">{{ $message['message'] }}</div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="flex items-center justify-between">
            <input type="text" wire:model="message" class="w-full px-4 py-2 mr-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" placeholder="Enter your message here...">
            <button type="submit" class="px-4 py-2 text-gray-700 bg-blue-500 rounded shadow hover:bg-blue-400 focus:shadow-outline focus:outline-none">Send</button>
        </div>
    </form>
</div>
