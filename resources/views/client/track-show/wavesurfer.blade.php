<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
<div id="waveform-container" class="group/waveform relative">
    <div id="waveform" class="min-h-28"></div>
    <div
        id="waveform-loading"
        class="absolute left-1/2 top-1/2 flex justify-center"
    >
        <span class="loading loading-bars loading-lg bg-such"></span>
    </div>
    <span
        class="absolute -left-4 top-1/2 z-30 hidden -translate-y-1/2 bg-wall px-1 text-xs text-white"
        id="waveform-current"
    ></span>
    <span
        class="absolute -right-3 top-1/2 z-30 -translate-y-1/2 bg-wall px-1 text-xs text-white"
        id="waveform-duration"
    ></span>
    <div
        id="waveform-hover"
        class="pointer-events-none absolute left-0 top-0 z-10 h-full w-0 bg-hypergreen bg-opacity-10 opacity-0 mix-blend-overlay transition-opacity duration-200 ease-linear group-hover/waveform:opacity-100"
    ></div>
</div>
