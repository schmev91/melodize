import { Howl } from "./player";
import { footer, visualizeCanvas } from "./elements";

const context = visualizeCanvas!.getContext("2d");

// Adjust canvas size to match screen width
visualizeCanvas.width = window.innerWidth;
visualizeCanvas.height = window.innerHeight - footer!.clientHeight;

let analyser: AnalyserNode;

export default function visualizer(player: Howl): void {
    if (!analyser) {
        // Get the AudioContext instance from Howler.js _node
        const audioCtx = player._sounds[0]._node.context;

        // Create the analyser node
        analyser = audioCtx.createAnalyser();
        analyser.fftSize = 128;

        // Connect Howler.js sound to the analyser node
        const audioNode = player._sounds[0]._node;
        audioNode.connect(analyser);
        analyser.connect(audioCtx.destination);
    }

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
            context!.fillStyle = "#d4d7f8";
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
