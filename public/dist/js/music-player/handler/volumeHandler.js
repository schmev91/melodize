import { volumeBar } from "../elements";
export function volumeUp() {
    var currentVolume = globalThis.player.volume();
    var targetVolume = currentVolume + 0.1;
    if (targetVolume > 1)
        targetVolume = 1;
    updateVolumeBar(targetVolume);
}
export function volumeDown() {
    var currentVolume = globalThis.player.volume();
    var targetVolume = currentVolume - 0.1;
    if (targetVolume <= 0)
        targetVolume = 0;
    updateVolumeBar(targetVolume);
}
export function volumeBarWatcher(event) {
    // Calculate the seek position based on where the user clicked
    var clickPosition = event.offsetX;
    var width = volumeBar.clientWidth;
    var targetVolume = clickPosition / width;
    updateVolumeBar(targetVolume);
}
function updateVolumeBar(targetVolume) {
    globalThis.player.volume(targetVolume);
    volumeBar.value = targetVolume;
}
