<x-layouts.app>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    <x-layouts.backdoor>
        <div class="flex gap-4">
            <div class="flex flex-col gap-4">
                <div class="prose rounded-box bg-wall p-3">
                    <h3 class="text-white">
                        User contributed: {{ $tracks_count }}
                    </h3>
                </div>
                <div class="prose rounded-box bg-wall p-3">
                    <h3 class="text-white">
                        Playlists created: {{ $playlists_count }}
                    </h3>
                </div>
            </div>
            <iframe
                src="https://discord.com/widget?id=1231138588037615696&theme=dark"
                width="350"
                height="500"
                allowtransparency="true"
                frameborder="0"
                sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"
            ></iframe>
        </div>
    </x-layouts.backdoor>
</x-layouts.app>
