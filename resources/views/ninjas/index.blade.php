<x-layout>
    <h2 class="!mb-[30px]">Currently Available Ninjas</h2>
    <div class="h-[calc(100vh_-_200px)] overflow-auto w-">
        <ul>
            @foreach($ninjas as $ninja)
            <li>
                <x-card :highlight="$ninja['skill'] > 70" href="{{ route('ninjas.show', $ninja->id) }}">
                    <h3>{{ $ninja->name }}</h3>
                </x-card>
            </li>
            @endforeach
        </ul>
        <div class="pagination">
            {{ $ninjas->links( ) }}
        </div>
    </div>
</x-layout>
