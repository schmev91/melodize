document.addEventListener("livewire:init", () => {
    console.log("livewire init successfully");
    Livewire.on("dialogCollapse", ({ id }) => {
        setTimeout(() => {
            window[id].show();
        }, 100);
    });
});
