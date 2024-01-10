  @extends('templates.main')
  @php
  $pretitle = 'Halaman';
  $title = 'Data Contact';
  @endphp

  @section('content')
  <div class="card">
      <div class="table-responsive">
        <table class="table table-vcenter card-table">
          <thead>
            <tr>
              <th class="border text-center">Name</th>
              <th class="border">Username Instagram</th>
              <th class="border">Messeage</th>
              <th class="border text-center">Action</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($contacts as $cnt)          
                  <tr>
                      <td class="border text-center">{{$cnt->name}}</td>
                      <td class="border text-center">{{$cnt->userig}}</td>
                      <td class="border">{{$cnt->massage}}</td>
                      <td>
                          <div class="d-flex justify-content-center">
                            <form action="{{ route('dashboard.destroy', $cnt->id) }}" method="post">
                              @csrf
                              @method('DELETE')
                              <input type="submit" value="hapus" class="btn btn-danger">
                          </form>                        
                        </div>
                        </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      </div>
  </div>

  @endsection
  @include('templates.part.footer')