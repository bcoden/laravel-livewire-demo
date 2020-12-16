<div>
    <div class="grid grid-cols-2 justify-items-stretch w-full">
        <div class="justify-self-start">
            <input type="search" name="search" wire:model.debounce.500ms="search" placeholder="Search" class="p-3 border rounded"/>
        </div>
        <div class="justify-self-end">
            <input type="checkbox" name="active" id="active" wire:model="active" />
            <label for="active">Active</label>
        </div>
    </div>

    <ul>
    @foreach($users as $user)
        <li>{{ $user['name'] }} | {{ $user['email'] }}</li>
    @endforeach
    </ul>
    {{ $users->links() }}
</div>
