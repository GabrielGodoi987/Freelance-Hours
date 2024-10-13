<div>
    <h1>Meu component livewire</h1>
    {{-- The Master doesn't talk, he acts. --}}
    <input wire:model.live="search" />


    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
