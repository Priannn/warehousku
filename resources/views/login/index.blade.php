@include('templates.part.hlogin')
<div class="container py-5">
    <div class="row">
        <div class="col">
            <img src="login.jpg" alt="" class="img-fluid">
        </div>
        <div class="col mt-5">
            <h3 class="text-center">Login</h3>
               @if($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif 
            <form action="/" method="POST" class="mt-5">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email"  name="email" class="form-control">
                    {{-- value="{{old('email')}}" --}}
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3 d-flex justify-content-center">
                    <button name="submit" type="submit" class="btn btn-warning w-50">Login</button>
                </div>
                <div class="d-flex justify-content-center mt-3 link">
                    <p>Already have an account? <a href="/register" class="text-warning">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div> 
</div>
  @include('templates.part.footer')






