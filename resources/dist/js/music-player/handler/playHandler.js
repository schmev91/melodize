import { hideClassName } from "../constants";
import { playBtn, pauseBtn } from "../elements";
export { playHandler };
function playHandler() {
    globalThis.player.play();
    playBtn.classList.add(hideClassName);
    pauseBtn.classList.remove(hideClassName);
}
