<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
<header class="container sticky top-0 bg-zinc-700">
    <div class="header flex items-center">
        <a href="" class="header-logo bg-wall bg-opacity-50 px-2">
            <img
                class="h-12 py-2"
                src="{{ asset("img/utils/melodize-hypergreen.png") }}"
                alt=""
            />
        </a>
        <nav class="flex h-12 items-center">
            @foreach ($route_names as $name)
                @php
                    $display = $name;
                    $name = "client." . $name;
                @endphp

                <x-nav-item
                    :$name
                    :active="$active_name == $name"
                    wire:click="refresh_header()"
                >
                    {{ ucfirst($display) }}
                </x-nav-item>
            @endforeach
        </nav>
    </div>
</header>
