<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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