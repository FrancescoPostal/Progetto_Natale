document.addEventListener("DOMContentLoaded", () => {
    const h1 = document.querySelector("h1");
    if (h1) {
        h1.addEventListener("mouseover", () => {
            h1.style.color = "gold";
            h1.style.transform = "scale(1.1)";
        });
        h1.addEventListener("mouseout", () => {
            h1.style.color = "red";
            h1.style.transform = "scale(1)";
        });
    }
});