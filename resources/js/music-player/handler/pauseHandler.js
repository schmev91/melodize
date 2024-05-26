import { sound } from "../player";
import { hideClassName } from "../constants";
import { playBtn, pauseBtn } from "../elements";

export { pauseHandler };

function pauseHandler() {
    sound.pause();
    pauseBtn.classList.add(hideClassName);
    playBtn.classList.remove(hideClassName);
}
