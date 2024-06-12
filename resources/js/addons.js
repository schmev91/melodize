document.addEventListener("livewire:init", () => {
    Livewire.on("dialogCollapse", ({ id }) => {
        setTimeout(() => {
            window[id].show();
        }, 100);
    });

    Livewire.on("new-toast", ({ message }) => {
        const toastStack = document.getElementById("toast-stack");
        const toast = document.createElement("div");
        toast.className = "toast-notification flex items-center gap-3";
        toast.innerHTML = `
    <div class="prose">
        <h1 class="toast-message text-lg font-bold text-wall">
            ${message}
        </h1>
    </div>
    <img
        src="https://i.imgur.com/bHuG4rf.gif"
        class="h-12 w-12 rounded-md"
    />
    `;
        toastStack.appendChild(toast);
        setTimeout(() => {
            toast.remove();
        }, 5000);
    });

    // SANDBOX
    // profile_modal.show();
    // trackUpload_modal.show();
});
