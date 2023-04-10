@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
      <div>
        @if (session()->has('success'))
        <h4 class="alert alert-success">
          {{  session()->get('success')}}
        @endif
      </div>
        <div class="card-header">
            <h3>
                Colors
                <a href={{url('admin/color/create')}} class="btn btn-primary btn float-end">Add Colors</a>
            </h3>
        </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>code</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($colors as $color)
                        <tr>
                          <td>{{ $color->id }}      </td>
                          <td>{{ $color->name }}</td>
                          <td>{{ $color->code }}   </td>
                          <td>{{ $color->status?'hidden':'visible' }}</td>
                          <td>
                            <a href="{{ route('color.edit', $color->id) }}" class="btn btn-primary btn-sm">Edit</a>
      
                            <form action={{route('color.destroy',$color->id)}} method='POST'>
                            @csrf
                            @method('DELETE')
                              <button class="btn btn-danger btn-sm" type="submit"> Delete </button>                            
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>   
            </div>
            
        </div>
    </div>
</div>
  
@endsection