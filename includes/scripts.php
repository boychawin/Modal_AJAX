<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<!-- Toastr -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

<!--Read more here -> https://boychawin.com/blog-detail/556 -->

<?php
if (isset($_SESSION['error'])) {
	echo "<script type='text/javascript'>toastr.error('" . $_SESSION['error'] . "', { timeOut: 3000 })</script>";
	unset($_SESSION['error']);
}
if (isset($_SESSION['success'])) {
	echo "<script type='text/javascript'>toastr.success('" . $_SESSION['success'] . "', { timeOut: 3000 })</script>";
	unset($_SESSION['success']);
}
?>