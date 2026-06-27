console.log("Toast script loaded");
const toast = document.getElementById("toast");

setTimeout(() => {
  if (toast) {
    toast.remove();
  }
}, 3000);
