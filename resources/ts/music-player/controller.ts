import {
    body,
    musicPlayer,
    nextBtn,
    pauseBtn,
    playBtn,
    previousBtn,
    progress,
    visualizeCanvas,
    volumeBar,
} from "./elements";
import { pauseHandler, playHandler, shortcutHandler } from "./handler/index";
import { nextHandler } from "./handler/nextHandler";
import { previousHandler } from "./handler/previousHandler";
import { volumeBarWatcher } from "./handler/volumeHandler";
import progressWatcher from "./progress";

export function initController(): void {
    document.addEventListener("keydown", shortcutHandler);

    playBtn.addEventListener("click", playHandler);
    pauseBtn.addEventListener("click", pauseHandler);
    nextBtn.addEventListener("click", nextHandler);
    previousBtn.addEventListener("click", previousHandler);

    progress.addEventListener("click", progressWatcher);

    volumeBar.addEventListener("click", volumeBarWatcher);

    // Adjust canvas size to match screen width
    visualizeCanvas.width = window.innerWidth;
    visualizeCanvas.height = window.innerHeight - musicPlayer!.clientHeight;

    body.style.paddingBottom = musicPlayer.clientHeight + "px";

    document.addEventListener("livewire:navigated", function () {
        console.log("navigated");
    });
}
