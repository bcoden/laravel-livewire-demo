<div>
    <div class="grid grid-cols-2 justify-items-stretch w-full">
        <div class="justify-self-start">
            <input type="search" autocomplete="off" name="search" wire:model.debounce.500ms="search" placeholder="Search" class="p-3 border rounded"/>
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
                    <x-sort-icon
                        field="name"
                        :sortField="$sortField"
                        :sortAsc="$sortAsc"
                    />
                </div>
            </th>
            <th>
                <div class="flex items-center">
                    <button wire:click="setSortColumn('email')">Email</button>
                    <x-sort-icon
                        field="email"
                        :sortField="$sortField"
                        :sortAsc="$sortAsc"
                    />
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
