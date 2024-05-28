import {
    body,
    footer,
    nextBtn,
    pauseBtn,
    playBtn,
    previousBtn,
    progress,
} from "./elements";
import { pauseHandler, playHandler, shortcutHandler } from "./handler/index";
import { nextHandler } from "./handler/nextHandler";
import { previousHandler } from "./handler/previousHandler";
import progressWatcher from "./progress";

export function initController(): void {
    document.addEventListener("keydown", shortcutHandler);

    playBtn.addEventListener("click", playHandler);
    pauseBtn.addEventListener("click", pauseHandler);
    nextBtn.addEventListener("click", nextHandler);
    previousBtn.addEventListener("click", previousHandler);

    progress.addEventListener("click", progressWatcher);

    body.style.paddingBottom = footer.clientHeight + "px";
}
