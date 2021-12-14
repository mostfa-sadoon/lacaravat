</div>
    <!-- jQuery -->

    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/jquery.nicescroll.min.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script src="node_modules\sweetalert2\dist\sweetalert2.all.min.js"></script>
    <!-- <script type="text/javascript" src='../files/bower_components/sweetalert/js/sweetalert2.all.min.js'> </script> -->
    <?php
        if(isset($_SESSION['success']) &&  $_SESSION['success']=="product add to cart successfuly")
        {?>
        <script>
                Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'product add to cart successfuly',
                    showConfirmButton: false,
                    timer: 1500
                    });
            </script>
        <?php
        }
        ?>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script> -->
</body>

</html>