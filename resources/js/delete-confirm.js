const deleteForms = document.querySelectorAll("form.delete-form");

deleteForms.forEach((deleteEl) => {
    deleteEl.addEventListener("submit", function (event) {
        event.preventDefault();

        if (window.confirm("DELETE?") === true) {
            this.submit();
        }
    });
})
