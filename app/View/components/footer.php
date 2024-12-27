<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let loading = document.getElementById("loading");

    setTimeout(() => {
        loading.classList.add("opacity-0");    
        loading.classList.remove("opacity-100");
        setTimeout(() => {
            document.body.classList.remove("overflow-hidden");
            loading.style.display = "none";
        }, 500);
    }, 300);

    let successMessage = <?= json_encode(flash("success")); ?>;
    if (successMessage) {
        Swal.fire("Success", successMessage, "success");
    }

    let errorMessage = <?= json_encode(flash("error")); ?>;
    if (errorMessage) {
        Swal.fire("Error", errorMessage, "error");
    }

    let warningMessage = <?= json_encode(flash("warning")); ?>;
    if (warningMessage) {
        Swal.fire("Warning", warningMessage, "warning");
    }
</script>
</body>
</html>