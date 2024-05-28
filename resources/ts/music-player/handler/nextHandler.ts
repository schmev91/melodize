import { refresh } from "../index";

export { nextHandler };

function nextHandler(): void {
    globalThis.trackIndex++;
    if (globalThis.trackIndex >= globalThis.tracksList.length)
        globalThis.trackIndex = 0;
    refresh();
    globalThis.player.play();
}
