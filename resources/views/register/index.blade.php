@include('templates.part.hlogin')
<div class="container py-5">
        <div class="row">
            <div class="col">
                <h3 class="text-center">Register</h3>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 
                <form action="/register" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{old('email')}}" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3 d-flex justify-content-center">
                        <button name="submit" type="submit" class="btn btn-warning w-50">Register</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3 link">
                        <p>Already have an account? <a href="/" class="text-warning">Sign In</a></p>
                    </div>
                </form>
            </div>
            <div class="col">
                <img src="register.jpg" alt="" class="img-fluid">
            </div>
        </div> 
</div>
  @include('templates.part.footer')






