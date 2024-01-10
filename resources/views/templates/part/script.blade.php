<script>
  function confirmDelete() {
      var confirmation = confirm("Apakah Anda yakin ingin menghapus data?");
      if (confirmation) {
          // Jika pengguna menekan OK pada alert, formulir akan dikirimkan
          return true;
      } else {
          // Jika pengguna menekan Cancel pada alert, formulir tidak dikirimkan
          return false;
      }
  }
</script>
@if(Session::get('success'))
<script>
    Swal.fire({
  position: "center",
  icon: "success",
  title: "Kamu berhasil Login",
  showConfirmButton: false,
  timer: 1500
});
</script>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- Libs JS -->
  <script src="./dist/libs/apexcharts/dist/apexcharts.min.js?1684106062" defer></script>
  <script src="./dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1684106062" defer></script>
  <script src="./dist/libs/jsvectormap/dist/maps/world.js?1684106062" defer></script>
  <script src="./dist/libs/jsvectormap/dist/maps/world-merc.js?1684106062" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Tabler Core -->
  <script src="./dist/js/tabler.min.js?1684106062" defer></script>
  <script src="./dist/js/demo.min.js?1684106062" defer></script>
 