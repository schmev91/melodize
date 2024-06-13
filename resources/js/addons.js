document.addEventListener("livewire:init", () => {
    Livewire.hook("request", ({ fail }) => {
        fail(({ status, preventDefault }) => {
            if (status === 419) {
                preventDefault();
            }
        });
    });

    Livewire.on("dialogCollapse", ({ id }) => {
        setTimeout(() => {
            window[id].show();
        }, 100);
    });

    // SANDBOX
    // profile_modal.show();
    // trackUpload_modal.show();
});
