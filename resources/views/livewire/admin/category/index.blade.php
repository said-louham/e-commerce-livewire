<div>

  <div>
  <div>
      <!-- Modal -->
       <!-- Modal -->
  <div  
  wire:ignore.self 
  class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Modal Title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this Category
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary"  wire:click='destroyCategory'>Delete</button>
        </div>
      </div>
    </div>
  </div>

          <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>{{__('words.Image')}}</th>
                  <th>{{__('words.Name')}}</th>
                  <th>{{__('words.Slug')}}</th>
                  <th>{{__('words.Description')}}</th>
                  <th>{{__('words.Status')}}</th>
                  <th>{{__('words.Action')}}</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categories as $category)
                  <tr>
                      <td><img src="{{ asset($category->image)}}" alt="{{ $category->name }}" width="100"></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->status==0?'visible':'hidden' }}</td>
                    <td>
                      <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary btn-sm">{{__('words.Edit')}}</a>
                        <button 
                         wire:click='deleteCategory({{$category->id}})'
                          type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal">{{__('words.Delete')}}</button>
                  
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{$categories->links()}}
    </div>
  </div>
@push('script')
    <script>

      // show mpdal 
      window.addEventListener('show-modal', event => {
  console.log('Received show-modal event');
  $("#deleteModal").modal("show");
});
// --------------------------------------------


 
//  delete modal 
$("#deleteModal").modal({
  backdrop: false,
  keyboard: false,
  show: false
});

window.addEventListener('close-modal', event => {
  $("#deleteModal").modal("hide");
  console.log('Modal delete category gone')
});

      // window.addEventListener('close-modal', event => {
      //   $("#deleteModal").modal("hide");
      //   console.log('Modal gone')
      // })
  //-------------------------------------------------------
    </script>
@endpush

</div>