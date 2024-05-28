import { volumeBar } from "../elements";

export function volumeUp(): void {
    const currentVolume: number = globalThis.player.volume();
    let targetVolume: number = currentVolume + 0.1;
    if (targetVolume > 1) targetVolume = 1;
    updateVolumeBar(targetVolume);
}

export function volumeDown(): void {
    const currentVolume: number = globalThis.player.volume();
    let targetVolume: number = currentVolume - 0.1;

    if (targetVolume <= 0) targetVolume = 0;
    updateVolumeBar(targetVolume);
}

export function volumeBarWatcher(event: MouseEvent): void {
    // Calculate the seek position based on where the user clicked
    const clickPosition = event.offsetX;
    const width = volumeBar!.clientWidth;
    const targetVolume = clickPosition / width;

    updateVolumeBar(targetVolume);
}

function updateVolumeBar(targetVolume: number): void {
    globalThis.player.volume(targetVolume);
    volumeBar.value = targetVolume;
}
