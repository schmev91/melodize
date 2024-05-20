{{-- If your happiness depends on money, you will never be happy with yourself. --}}
@persist("music-player")
    <div class="fixed bottom-0 flex justify-center">
        <audio
            autoplay
            src="{{ asset("audio/Gymnopdie_No1.mp3") }}"
            controls
        ></audio>
    </div>
@endpersist('music-player')
