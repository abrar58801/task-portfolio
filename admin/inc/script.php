<!-- sweet alert -->
<script src="./assets/js/onlinejs/jquery.min.js"></script>

<!-- sweet alert -->
<script src="./assets/js/onlinejs/sweetalert.js"></script>

<!-- jQuery -->
<script src="./assets/js/jquery-3.7.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="./assets/js/bootstrap.bundle.min.js"></script>

<!-- Feather Icon JS -->
<script src="./assets/js/feather.min.js"></script>

<!-- Slimscroll JS -->
<script src="./assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- select 2  -->
<script src="./assets/js/onlinejs/select2.js"></script>

<!-- Custom JS -->
<script src="./assets/js/script.js"></script>
<script src="./assets/js/helper.js"></script>
<script src="./assets/js/main.js"></script>

<!-- Datatables js -->
<script src="./assets/js/onlinejs/datatable.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

        // for reset form
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        // for reset form
        if ($('.select').length > 0) {
            $('.select').select2({
                minimumResultsForSearch: -1,
                width: '100%'
            });
        }
    });

    

</script>
</body>

</html>