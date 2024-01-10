@include('templates.part.header')


<div class="container mt-5">
  <h4>Silahkan dipilih cuy</h4>
    <div class="d-flex">
      <span class="badge rounded-pill text-bg-warning" onclick="pindahHalaman('{{route('landing.detail')}}')">Gainer</span>
    </div>

    <div class="container-input my-3">
      <form action="{{route('landing.gainer')}}" method="GET">
          <input type="text" placeholder="Search" class="input" name="search" value="{{request()->input('search')}}">
          <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
            <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
          </svg>
      </form>
    </div> 
<div class="container">
  <div class="row">
    @foreach($gainers as $ag)
      <div class="col-md-3 mb-3">
        <div class="card" style="max-width: 18rem;">
          <div style="overflow: hidden;">
            <img src="{{ asset('storage/' . $ag->photo) }}" class="w-100" style="object-fit: cover; max-height: 150px; background-size: cover" alt="">
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $ag->name }}</h5>
            <p class="card-text badge text-bg-warning">{{ $ag->merk }}</p>
            <div class="d-flex">
            <p class="card-text"><span style="font-size: 15px; color:red" class="fw-bold">Rp.</span>{{ $ag->harga }}</p>
            <p class="ms-auto badge text-bg-success"><a href="" style="text-decoration: none; color:white">Book Now</a></p>
          </div>
          </div>
        </div>
      </div>
    @endforeach 
</div>

</div>
</div>
<script>
  function pindahHalaman(url) {
      window.location.href = url;
  }
</script>


@include('templates.part.footer')