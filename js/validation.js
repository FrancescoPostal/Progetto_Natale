document.addEventListener("DOMContentLoaded", () => {
    const forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.addEventListener("submit", e => {
            let valid = true;
            form.querySelectorAll("input").forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                }
            });
            if (!valid) {
                e.preventDefault();
                alert("Compila tutti i campi!");
            }
        });
    });
});