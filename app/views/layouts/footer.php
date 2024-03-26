</div>
<div class="col-md-2 d-none d-md-block">
    <img src="../../../public/img/4.png" alt="" class="img-fluid mt-5 pt-2">
    <img src="../../../public/img/5.png" alt="" class="img-fluid">
    <img src="../../../public/img/6.png" alt="" class="img-fluid">
</div>

<script src="../../public/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../../public/js/app.js"></script> -->

<script src="../../public/dataTables/jquery-3.7.1.min.js"></script>
<script src="../../public/dataTables/jquery.dataTables.min.js"></script>
<script src="../../public/dataTables/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "/public/dataTables/Spanish.json"
            },
            "lengthMenu": [3, 5],
            "pageLength": 3
        });
    });
</script>

</body>

</html>