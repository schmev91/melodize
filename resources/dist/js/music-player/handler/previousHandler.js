import { refresh } from "../core";
export { previousHandler };
function previousHandler() {
    globalThis.trackIndex--;
    if (globalThis.trackIndex < 0)
        globalThis.trackIndex = globalThis.tracksList.length - 1;
    refresh();
    globalThis.player.play();
}
