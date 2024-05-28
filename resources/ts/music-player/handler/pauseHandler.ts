import { hideClassName } from "../constants";
import { playBtn, pauseBtn } from "../elements";

export { pauseHandler };

function pauseHandler() {
    player.pause();
    pauseBtn!.classList.add(hideClassName);
    playBtn!.classList.remove(hideClassName);
}
