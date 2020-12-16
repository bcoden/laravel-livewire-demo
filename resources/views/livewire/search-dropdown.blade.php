<div class="w-full p-4">
    <input wire:model.debounce.300ms="search"  id="search" type="search" autocomplete="off" class="w-full border-dark rounded border-2 p-2" name="search" placeholder="Which artists are you looking for?" />
    @if (strlen($search) > 2)
        @forelse($searchResults as $result)
            <div>{{ $result['trackName'] ?? 'Invalid Result' }}</div>
        @empty
            <div>No results found</div>
        @endforelse
    @endif
</div>
