@extends('layouts.admin')
@section('mycontent')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
               
            </strong>
            
            <form method="post" action="{{route('setting.store')}}">
                
                @csrf
                
                <div class="row">
                  <div class="col-lg-6 form-group">
                    <select name="" id="" class="form-control">
                        <option value="">User1</option>
                    </select>
                  </div>
                  
                  <div class="col-lg-6">
                    <input type="date" class="form-control" placeholder="date" name="date">
                  </div>
                  </div>
                  <br>
                <div class="row">
                <div class=" col-lg-4">
                  <label for="product_id">Choose product</label>
                  <select class="custom-select @error('product_id') is-invalid @enderror" id="product_id" name="product_id" > 
                     <option value="">
                       Choose product
                     </option>
                     @foreach($products as $item)
                     <option value="{{$item->id}}" >
                        {{$item->name}}
                     </option>
                     @endforeach
                  </select>
                  @error('product_id')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror   
               </div>
                  <div class="col-lg-4">
                    <label for="product_id">Quantity in stock</label>
                    <input type="text" class="form-control" placeholder="En Stock" id="stock" name="stock" readonly>
                  </div>
                  <div class="col-lg-4">
                    <label for="product_id">Price</label>
                    <input type="text" class="form-control" placeholder="Prix"  id="prix" name="prix" readonly>
                  </div>
                  </div>
                  <br>
                  <div class="row">
                  <div class="col-lg-4">
                    <label for="product_id">Quantité Commandée</label>
                    <input type="text" class="form-control" placeholder="Qty Cde" id='qtycde' name="qtitec">
                  </div>
                  <div class="col-lg-4">
                    <label for="product_id">Subtotal</label>
                    <input type="text" class="form-control" placeholder="En Stock" id='stotal'name="Soustotal" readonly>
                  </div>
                  <div class="col-lg-4">
                    <label for="product_id" style="visibility:hidden">Subtotal</label><br>
                    <button type="submit" class="btn btn-success" style="float:center;">Ajouter</button>
                  </div>
                  </div>
                  
                  <div class="form-group mb-4">
                    <label for="info1">Description</label>
                    <textarea id="description" name="description" class="form-control"> </textarea>
                  </div>
                  <table class="table table-bordered table-striped">
                    <thead>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Actions</th>
                    </thead>
                    <tbody id="detail_commande">
                    
                    </tbody>
                  </table>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="float:center;">Enregistrer</button>
                </div>
            </form>

            
        </div>
    </div>
 </div>
@endsection
@section("table-js")
<script src="{{asset('dist/js/order.js')}}"></script>
<script>
    tinymce.init({
            selector: 'textarea#description',
            // menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'image | removeformat | help'
        });

</script>
@endsection