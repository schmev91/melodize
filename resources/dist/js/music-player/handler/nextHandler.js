import { refresh } from "../core";
export { nextHandler };
function nextHandler() {
    globalThis.trackIndex++;
    if (globalThis.trackIndex >= globalThis.tracksList.length)
        globalThis.trackIndex = 0;
    refresh();
    globalThis.player.play();
}
