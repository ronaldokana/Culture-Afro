@extends('layouts.admin')
@section('mycontent')
 <div  class="card card-small mb-4 mt-4">
    <div class="row">
        <div class="col-sm-12 col-md-12 pl-5 pr-5">
            <strong class="text-muted d-block mb-2">
               
            </strong>
            
            <form method="post" action="{{route('setting.store')}}">
                
                @csrf
                
                <div class="form-group">
                    <label for="provider">Fournisseur</label>
                    <input type="text" class="form-control @error('tel1') is-invalid @enderror"
                         id="provider" placeholder="Last name and First name" name="provider"> 
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror   
                </div>
                
                <div class="row">
                    <div class="col-lg-4">
                      <input type="text" class="form-control" placeholder="Name" name="Name">
                    </div>
                    <div class="col-lg-4">
                      <input type="text" class="form-control" placeholder="Slug" name="Slug">
                    </div>
                    <div class="col-lg-4">
                      <input type="text" class="form-control" placeholder="Key word" name="Key word">
                    </div>
                  </div>
                  <br>
                <div class="row">
                  <div class="col-lg-4">
                    <input type="text" class="form-control" placeholder="price" name="price">
                  </div>
                  <div class="col-lg-4">
                    <label for="old price">Old Price</label>
                    <input type="text" class="form-control" placeholder="old price"name="old price">
                  </div>
                  <div class="col-lg-4">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" placeholder="quantity" name="quantity">
                  </div>
                </div>
                <div class="form-group col-md-12">
                    <label for="color">Color</label>
                    <select name="" id="" class="form-control">
                        <option value="">
                          test 1
                        </option>
                        
                        <option value="">
                          test 2
                        </option>
                    </select>
                
                </div>
                  
                <div class="form-group">
                  <div class="custom-file">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*" onchange="preview_image(event);"> 
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror 
                  </div>   
                </div>
                <div class="form-group">
                  <div class="custom-file">
                      <label for="info1">Images</label>
                      <input id="images" type="file" name="images[]" class="custom-file-input @error('images') is-invalid @enderror" accept="image/*" onchange="preview_images();" multiple> 
                      @error('phone')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror 
                  </div>   
                </div>
                <div class="form-group">
                    <label for="info1">Description</label>
                    <textarea name="description" id="description" class="form-control"> </textarea>
                    <div class="row">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror    
                </div>
                   

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" style="float:center;">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
 </div>
@endsection
@section('table-js')

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


        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview-image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function preview_images() {
            $('#preview-images').empty();
            var total_file = document.getElementById("images").files.length;
            for(var i=0;i<total_file;i++) {
                var div     = '<div class="image">';
                    // div     +=      '<span class="close"><i class="fas fa-times"></i></span>';
                    div     +=      '<img src="'+ URL.createObjectURL(event.target.files[i]) +'">';
                    div     += '</div>';
                
                // var img = new Image();
                // img.src = URL.createObjectURL(event.target.files[i]);

                // div.appendChild(img);

                $('#preview-images').append(div);
            }
        }


</script>

@endsection