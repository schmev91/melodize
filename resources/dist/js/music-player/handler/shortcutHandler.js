import { pauseHandler } from "./pauseHandler";
import { playHandler } from "./playHandler";
import { updateProgressTime } from "../progress";
import { volumeDown, volumeUp } from "./volumeHandler";
import { headerSearchInput } from "../elements";
function shortcutHandler(event) {
    try {
        switch (event.code) {
            case "Space":
                // DONT PREVENT DEFAULT IF IS FOCUSING ON INPUT
                if (isFocusInput(event))
                    return;
                event.preventDefault();
                if (globalThis.player.playing())
                    pauseHandler();
                else
                    playHandler();
                break;
            case "Slash":
                if (isFocusInput(event))
                    return;
                event.preventDefault();
                headerSearchInput.focus();
                break;
            case "ArrowLeft":
                globalThis.player.seek(Math.floor(globalThis.player.seek() - 3));
                updateProgressTime();
                break;
            case "ArrowRight":
                globalThis.player.seek(Math.floor(globalThis.player.seek() + 3));
                updateProgressTime();
                break;
            case "ArrowUp":
                event.preventDefault();
                volumeUp();
                break;
            case "ArrowDown":
                event.preventDefault();
                volumeDown();
                break;
        }
    }
    catch (error) { }
}
export { shortcutHandler };
function isFocusInput(event) {
    return (document.activeElement instanceof HTMLInputElement ||
        document.activeElement instanceof HTMLTextAreaElement);
}
