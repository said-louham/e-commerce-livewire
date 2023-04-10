<div>
      <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>
            @if($TotalProductsAmount!="0")
            
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Item Total Amount :
                                <span class="float-end">${{$TotalProductsAmount}}</span>
                            </h4>
                            <hr>
                            <small>* Items will be delivered in 3 - 5 days.</small>
                            <br/>
                            <small>* Tax and other charges are included ?</small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow bg-white p-3">
                            <h4 class="text-primary">
                                Basic Information
                            </h4>
                            <hr>

                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>Full Name</label>
                                        <input type="text" id="fullname" wire:model.defer="fullname" class="form-control" placeholder="Enter Full Name" />
                                        @error('fullname') <small class="text-danger">{{$message}}</small> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Phone Number</label>
                                        <input type="number"  id="phone" wire:model.defer="phone" class="form-control" placeholder="Enter Phone Number" />
                                        @error('phone') <small class="text-danger">{{$message}}</small> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Email Address</label>
                                        <input type="email"  id="email"  wire:model.defer="email" class="form-control" placeholder="Enter Email Address" />
                                        @error('email') <small class="text-danger">{{$message}}</small> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Pin-code (Zip-code)</label>
                                        <input type="number"  id="pincode" wire:model.defer="pincode" class="form-control" placeholder="Enter Pin-code" />
                                        @error('pincode') <small class="text-danger">{{$message}}</small> @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Full Address</label>
                                        <textarea  id="address" wire:model.defer="address" class="form-control" rows="2"></textarea>
                                        @error('address') <small class="text-danger">{{$message}}</small> @enderror
                                    </div>
                                    <div class="col-md-12 mb-3" wire:ignore >
                                        <label>Select Payment Mode: </label>
                                        <div class="d-md-flex align-items-start">
                                            <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <button class="nav-link fw-bold " id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                                <button class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                            </div>
                                            <div class="tab-content col-md-9" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                    <h6>Cash on Delivery Mode</h6>
                                                    <hr/>
                                                    <button wire:click='makeOrder'   type="button" class="btn btn-primary" >
                                                        <span wire:loading.remove wire:target='makeOrder' >Place Order (Cash on Delivery)</span>
                                                        <span wire:loading>Placing Order... </span>
                                                    </button>

                                                </div>
                                                <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                    <h6>Online Payment Mode</h6>
                                                    <hr/>
                                                        <div class="">
                                                            <div id="paypal-button-container" ></div>
                                                        </div>
                                                    {{-- <button  type="button" class="btn btn-warning">Pay Now (Online Payment)</button> --}}
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            @else
            <div class="card card-body shadow text-center p-md-5">
                <h4>No items in Cart to checkout</h4>
                <a href="{{url('collections')}}" class="btn btn-warning">Shop Now</a>
            </div>
            @endif


        </div>
    </div> 

</div>

@push('scripts')
{{-- <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script> --}}
<script src="https://www.paypal.com/sdk/js?client-id=AQ0P6Bo8x-N5ExbTRJZBmZLv0YT5jKqiTRIHCtYGFSdy2YiJZBLUwqcyS8SIknhx8UufgMLzrY0GJoH8&currency=USD"></script>





<script>
    // Render the PayPal button
    paypal.Buttons({
        onClick:function(){
            if(
               !document.getElementById('fullname').value 
                || !document.getElementById('phone').value 
                || !document.getElementById('email').value 
                || !document.getElementById('pincode').value 
                || !document.getElementById('address').value 
            ){
                Livewire.emit('validationData');
                console.log('validation');
                return false;
            }else{
                @this.set('fullname' ,  document.getElementById('fullname').value);
                @this.set('phone' ,  document.getElementById('phone').value);
                @this.set('email' ,  document.getElementById('email').value);
                @this.set('pincode' ,  document.getElementById('pincode').value);
                @this.set('address' ,  document.getElementById('address').value);
                console.log('data')

            }
        },


        createOrder: function(data, actions) {
            // Set up the transaction
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '1.00' // Change this to the desired amount   $totalprice
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // Capture the payment
            return actions.order.capture().then(function(orderData) {
                // Call your server to save the payment
 console.log("Capture result",orderData,JSON.stringify(orderData,null,2));
 const transaction=orderData.purchase_units[0].payments.captures[0];
 if(transaction.status=="COMPLETED"){
    Livewire.emit('transctionEmit',transaction.id);
 }
//  
}
            )
        }
    }).render('#paypal-button-container');
</script>
@endpush
