import { nextBtn, pauseBtn, playBtn, previousBtn } from "./elements";
import { pauseHandler, playHandler, shortcutHandler } from "./handler/index";
import { nextHandler } from "./handler/nextHandler";
import { previousHandler } from "./handler/previousHandler";

export function initController(): void {
    document.addEventListener("keydown", shortcutHandler);

    playBtn.addEventListener("click", playHandler);
    pauseBtn.addEventListener("click", pauseHandler);
    nextBtn.addEventListener("click", nextHandler);
    previousBtn.addEventListener("click", previousHandler);
}
