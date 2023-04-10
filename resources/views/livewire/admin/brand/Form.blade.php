<div  
  wire:ignore.self 
  class="modal fade" id="AddBrandModal" tabindex="-1" role="dialog" aria-labelledby="AddBrandModalLabel" aria-hidden="true">
  
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="AddBrandModalLabel">Add Brand</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit.prevent='storeBrand' method="POST">
            <div class="mb-3">
                <label>Brand Name</label>
                <input type="text"  wire:model.defer='name' name='name' class="form-control">
                @error('name') <small class="text-danger">{{$message}}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="">Brand slug</label>
                <input type="text"  wire:model.defer='slug' name='slug' class="form-control">
                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
            </div>
            <div class="mb-3">
                <label class="">Select Category</label>
                <select wire:model.defer="category_id"class="form-control">
                  @foreach ($categories as $category)
                  <option value={{$category->id}}>{{$category->name}}</option>
                  @endforeach
                </select>
                @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
            </div>
             <div class="mb-3">
                <label>Brand staus</label>
                <input type="checkbox"  wire:model.defer='status' name="status">
                @error('status') <small class="text-danger">{{$message}}</small> @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='ResetInputs'>Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

{{-- -----------------------update---------------------------------------------------- --}}
<div wire:loading 
{{-- style="display: flex ;justify-content:center; align-items:center;" --}}
>
  <div class="spinner-border text-primary" role='status'>
    <span class="visually-hidden">hhh...</span>
  </div>
  ...loding
</div>
<div  
wire:loading.remove
wire:ignore.self 
class="modal fade" id="updateBrandModal" tabindex="-1" role="dialog" aria-labelledby="updateBrandModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateBrandModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form wire:submit.prevent='UpdateBrand' method="POST">
          <div class="mb-3">
              <label>Brand Name</label>
              <input type="text"  wire:model.defer='name' name='name' class="form-control">
              @error('name') <small class="text-danger">{{$message}}</small> @enderror
          </div>

          <div class="mb-3">
              <label class="">Brand slug</label>
              <input type="text"  wire:model.defer='slug' name='slug' class="form-control">
              @error('slug') <small class="text-danger">{{$message}}</small> @enderror
          </div>

          <div class="mb-3">
            <label >Select Category</label> <br>
            <select wire:model.defer="category_id" class="form-control">
              @foreach ($categories as $category)
              <option value={{$category->id}} >{{$category->name}}</option>
              @endforeach
            </select>
            @error('category_id') <small class="text-danger">{{$message}}</small> @enderror
        </div>

           <div class="mb-3">
              <label>Brand staus</label>
              <input type="checkbox"  wire:model.defer='status' name="status">
              @error('status') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click='ResetInputs'>Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
{{-- --------------------------delete brand------------------------------ --}}

<div  
wire:ignore.self 
class="modal fade" id="deleteBrandModal" tabindex="-1" role="dialog" aria-labelledby="deleteBrandModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteBrandModalLabel">delete brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this brand
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button type="button" class="btn btn-primary"  wire:click='destroyBrand'>Yes! Delete</button>
      </div>
    </div>
  </div>
</div>