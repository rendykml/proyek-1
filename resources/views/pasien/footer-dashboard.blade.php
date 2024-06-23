<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('assets/vendor/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.cookie.js')}}" type="text/javascript"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('assets/js/off-canvas.js')}}"></script>
<script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('assets/js/misc.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{asset('assets/js/dashboard.js')}}"></script>
<script src="{{asset('assets/js/todolist.js')}}"></script>
<!-- End custom js for this page -->
 <!-- Include this before closing </body> tag (usually in the master layout or footer) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<!-- Modal form Rating -->
<script>
  document.addEventListener('DOMContentLoaded', (event) => {
    document.querySelectorAll('.review-button').forEach(button => {
      button.addEventListener('click', function() {
        let consultationId = this.getAttribute('data-consultation-id');
        document.getElementById('consultationId').value = consultationId;
        let myModal = new bootstrap.Modal(document.getElementById('reviewModal'));
        myModal.show();
      });
    });
  });
</script>
<!-- end Modal form Rating -->
</body>

</html>