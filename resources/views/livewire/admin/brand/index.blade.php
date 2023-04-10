
<div>
  <div>
    @include('livewire.admin.brand.Form')

  </div>
<div class="row">
    <div class="col-md-12">
        <div class="card-header">
          <h4>
            @if (session()->has('success'))
            <div class="alert alert-success">
              {{  session()->get('success')}}
            @endif
          </h4>
            <h4 class="d-flex justify-content-between">
              {{__('words.brands')}} 
                <a href={{url('admin/brands')}} 
                class="btn btn-primary btn float-end"
                data-bs-toggle='modal'
                data-bs-target='#AddBrandModal'
                >{{__('words.add brand')}}</a>             
            </h4>
           
            <div class="card-body">



                <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>{{__('words.Name')}}</th>
                        <th>{{__('words.Slug')}}</th>
                        <th>{{__('words.category')}}</th>
                        <th>{{__('words.Status')}}</th>
                        <th>{{__('words.Action')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($brands as $brand)
                        <tr>
                          <td>{{ $brand->name }}</td>
                          <td>{{ $brand->slug }}</td>
                          <td>
                                @if($brand->category)

                                  {{ $brand->category->name }}
                                @else                          
                                  no category
                                @endif
                          </td>
                          <td>{{ $brand->status==1?'hidden':'visible' }}</td>
                          <td>
                            <a 
                            {{-- href="{{ route('brand.edit', $brand->id) }}" --}}
                             class="btn btn-primary btn-sm" wire:click='editeBrand({{$brand->id}})'
                              data-toggle="modal" data-target="#updateBrandModal">{{__('words.Edit')}}</a> 

                              <button  wire:click='deleteBrand({{$brand->id}})'
                                 type="submit" class="btn btn-danger btn-sm" 
                                 data-toggle="modal" data-target="#deleteBrandModal">{{__('words.Delete')}}</button>
                          </td>
                        </tr>
                        @empty
                            <td colspan="5" style='text-align:center'>No brand to show</td>
                        @endforelse
                    </tbody>
                  </table>
                  {{$brands->links()}}
                
            </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('script')
<script>
// close add 
window.addEventListener('close-modal-brand', event => {
  $("#AddBrandModal").modal("hide");
});
//close update
window.addEventListener('close-modal-update', event => {
  $("#updateBrandModal").modal("hide");
  console.log('updated seccessfuly ')
});
// show update
window.addEventListener('show-modal', event => {
  $("#updateBrandModal").modal("show");
  console.log('updated seccessfuly ')
});

// close darck bg
$("#updateBrandModal").modal({
  backdrop: false,
  keyboard: false,
  show: false
});
// ---------------------------------------------------------
// delete brand modal
window.addEventListener('close-modal', event => {
  $("#deleteBrandModal").modal("hide");
});
window.addEventListener('show-modal-delete-brand', event => {
  $("#deleteBrandModal").modal("show");
});
$("#deleteBrandModal").modal({
  backdrop: false,
  keyboard: false,
  show: false
});
</script>
@endpush
