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

    <table>
        <tr>
            <th>
                <div class="flex items-center">
                    <button wire:click="setSortColumn('name')">Name</button>
                </div>
            </th>
            <th>
                <div>
                    <button wire:click="setSortColumn('email')">Email</button>
                </div>
            </th>
            <th>Active</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['active'] ? 'Active' : 'Inactive' }}</td>
            </tr>
        @endforeach
    </table>

    {{ $users->links() }}
</div>
