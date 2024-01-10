@include('templates.part.header')


<div class="container mt-5">
  <h4>Silahkan dipilih cuy</h4>
    <div class="d-flex">
      <span class="badge rounded-pill text-bg-warning" onclick="pindahHalaman('landing.whey')">Whey</span>
      <span class="badge rounded-pill text-bg-warning mx-3" onclick="pindahHalaman('landing.creatine')">Creatine</span>
      <span class="badge rounded-pill text-bg-warning" onclick="pindahHalaman('landing.gainer')">Gainer</span>
    </div>
    <div class="d-flex justify-content-center">
      <img src="details.jpg" alt="" class="img-fluid w-50">
    </div>
    <h4 class="text-center text-monospace">Silahkan piih diantara 3 badge diatas</h4>
</div>
<script>
  function pindahHalaman(url) {
      window.location.href = url;
  }
</script>


@include('templates.part.footer')