// @ts-ignore
import { Howl as HowlType } from "howler";
function createPlayer(source) {
    return new HowlType({
        src: [source],
        preload: true,
    });
}
export { createPlayer };
