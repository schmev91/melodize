import { sound } from "../player";
import { hideClassName } from "../constants";
import { playBtn, pauseBtn } from "../elements";

export { playHandler };

function playHandler() {
    sound.play();
    playBtn!.classList.add(hideClassName);
    pauseBtn!.classList.remove(hideClassName);
}
