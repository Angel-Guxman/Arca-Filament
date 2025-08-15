const notification={
    success: function(message) {
        const notificationElement = document.createElement("div");
        notificationElement.className = "toast-notification-success";
        notificationElement.innerHTML=`
          <div class="flex items-center gap-2  ">
            <div class="   rounded-full bg-[#05D270] ">
             <svg xmlns="http://www.w3.org/2000/svg" class="size-7 text-gray-900" viewBox="0 0 1024 1024"><path fill="currentColor" d="M512 64a448 448 0 1 1 0 896a448 448 0 0 1 0-896m-55.808 536.384l-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.27 38.27 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336z"/></svg>

            </div>
            <div class="flex flex-col gap-[0.5]">
            <span class=" flex-1 text-sm  font-semibold text-white/90">Éxito</span>
            <span class=" flex-1 text-xs  text-white/90">${message}</span>
            </div>
        </div>
        `
        document.body.appendChild(notificationElement);
        setTimeout(() => {
    notificationElement.classList.add("toast-hide");
    notificationElement.addEventListener("animationend", () => {
        notificationElement.remove();
    });
}, 3000);
    },
    error: function(message) {
    const notificationElement = document.createElement("div");
    notificationElement.className = "toast-notification-error";
    notificationElement.innerHTML=`
      <div class="flex items-center gap-2  ">
        <div class="   rounded-full bg-red-500  ">
           <svg xmlns="http://www.w3.org/2000/svg"  class="size-7 text-gray-900" viewBox="0 0 512 512"><path fill="currentColor" fill-rule="evenodd" d="M256 42.667c117.803 0 213.334 95.53 213.334 213.333S373.803 469.334 256 469.334S42.667 373.803 42.667 256S138.197 42.667 256 42.667m48.918 134.25L256 225.836l-48.917-48.917l-30.165 30.165L225.835 256l-48.917 48.918l30.165 30.165L256 286.166l48.918 48.917l30.165-30.165L286.166 256l48.917-48.917z"/></svg>

        </div>
          <div class="flex flex-col gap-[0.5]">
            <span class=" flex-1 text-sm  font-semibold text-white/90">Error</span>
            <span class=" flex-1 text-xs  text-white/90">${message}</span>
            </div>
    </div>
    `
    document.body.appendChild(notificationElement);
   setTimeout(() => {
    notificationElement.classList.add("toast-hide");
    notificationElement.addEventListener("animationend", () => {
        notificationElement.remove();
    });
}, 3000);
    }
}
window.notification = notification;


