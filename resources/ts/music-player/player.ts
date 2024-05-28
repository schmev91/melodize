// @ts-ignore
import { Howl as HowlType } from "howler";

interface Howl extends HowlType {
    [key: string]: any;
}

function createPlayer(source: string): HowlType {
    return new HowlType({
        src: [source],
        preload: true,
    });
}

export { Howl, createPlayer };
