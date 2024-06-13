const toastType = {
    normal: "normal",
    persist: "persist",
};

const toastStack = document.getElementById("toast-stack");
Livewire.on("new-toast", ({ message, type = toastType.normal, name }) => {
    const toast = toastRender(message, type, name);

    toastStack.appendChild(toast);

    switch (type) {
        case toastType.normal:
            setTimeout(() => {
                toast.remove();
            }, 5000);

            break;

        default:
            break;
    }
});

Livewire.on("dismiss-toast", ({ name }) => {
    const dismissingToasts = toastStack.querySelectorAll(`[toast-${name}]`);
    for (let toast of dismissingToasts) {
        toast.remove();
    }
});

function toastRender(message, type, name) {
    const toast = document.createElement("div");
    toast.className = `toast-${type} flex items-center gap-3`;
    toast.setAttribute(`toast-${name}`, "");
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
    return toast;
}
