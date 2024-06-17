import { getAudioContext } from "../utils";
import { footer, visualizeCanvas } from "./elements";

const context = visualizeCanvas!.getContext("2d");

let analyser: AnalyserNode;

export default function visualizer(): void {
    // Get the AudioContext instance from Howler.js _node
    // const audioCtx = globalThis.player._sounds[0]._node.context;
    const audioCtx = getAudioContext();

    // Create the analyser node
    analyser = audioCtx.createAnalyser();
    analyser.fftSize = 128;

    // Connect Howler.js sound to the analyser node
    const audioNode = globalThis.player._sounds[0]._node;
    audioNode.connect(analyser);
    analyser.connect(audioCtx.destination);

    visualize();
}

function visualize(): void {
    if (!analyser) {
        // If analyser is not initialized, return
        return;
    }

    const bufferLength = analyser.frequencyBinCount;
    const dataArray = new Uint8Array(bufferLength);
    const barWidth = (visualizeCanvas.width / bufferLength) * 1.5;

    function animate() {
        context!.clearRect(0, 0, visualizeCanvas.width, visualizeCanvas.height);
        analyser.getByteFrequencyData(dataArray);

        let x = 0;
        for (let i = 0; i < bufferLength; i++) {
            const barHeight = dataArray[i];

            // // Calculate color based on the bar index or height
            // const hue = (i * 360) / bufferLength; // Varying hue from 0 to 360 degrees
            // context!.fillStyle = `hsl(${hue}, 100%, 50%)`;

            // context!.fillStyle = "#d4d7f8";
            context!.fillStyle = "#9eb3e6";

            context!.fillRect(
                x,
                visualizeCanvas.height - barHeight,
                barWidth,
                barHeight,
            );
            x += barWidth;
        }

        requestAnimationFrame(animate);
    }

    animate();
}
