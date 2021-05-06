@extends("layouts.admin")
@section('title', $isEdit?'Update Product' : 'New Product ')
@section('table-css')
    <style>
        .images {
            /* overflow-x: scroll; */
        }
        .images img {
            margin: 0.25rem 0.5rem;
            height: 140px;
        }

        .image {
            position: relative;
        }
        .image .close {
            position: absolute;
            top: 2px;
            right: 2px;
            padding: 0.5rem;
            border-radius: 50%;
            text-align: center;
            font-size: 16px;
            background-color: #FFF;
            color: red;

        }
    </style>
@endsection

@section('mycontent')
<!-- Small Stats Blocks -->
<div class="container-md">

    <div class="card card-small mb-4">
      <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-start flex-wrap">
                <h6>
                    @if ($isEdit)
                        @awt('Update Product')
                    @else
                        @awt('Add new Product')
                    @endif
                </h6>
                <a href="{{ route('shop.product.index') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                    @awt('Back to products')
                </a>
            </div>
        </div> --}}

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data"
                @if ($isEdit)
                    action="{{ route('products.update', $product->id) }}"
                @else
                    action="{{ route('products.store') }}"
                @endif>

                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="form-group">
                    <label for="name">@awt('Product Name')</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="@awt('Product Name')" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-3 col-12">
                        <label for="collection">@awt('Collection')</label>
                        <select id="collection" class="custom-select" @if(!$isEdit) required @endif>
                            <option value="" selected>@awt('Select one')</option>
                            @foreach ($collections as $item)
                            <option value="{{ $item->id }}" @if(old('collection') == $item->id) selected @endif>
                                {{ awt($item->name) }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-3 col-12">
                        <label for="super_category">@awt('Super Category')</label>
                        <select id="super_category" class="custom-select" disabled @if(!$isEdit) required @endif>
                            <option value="" selected>@awt('Choose collection')...</option>
                        </select>
                    </div>
                    
                    <div class="form-group col-md-6 col-12">
                        <label for="category">@awt('Categories')</label>
                        <select id="category" class="custom-select select2 @error('category') is-invalid @enderror"
                            name="category[]" required multiple>
                            {{-- <option value="" selected>@awt('Choose super category')...</option> --}}
                            {{-- @if ($isEdit)
                                @foreach ($product->categories as $item)
                                    <option value="{{ $item->id }}" selected>
                                        {{ awt($item->name) }}
                                    </option>
                                @endforeach
                            @endif --}}
                            @foreach (old('category', $product->categories->pluck('id')) as $item)
                                <option value="{{ $item }}" selected>
                                    {{ awt(App\Models\Category::findOrFail($item)->name) }}
                                </option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="price">
                            @awt('Price')
                            <b>(@awt('In') EURO)</b>
                        </label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror"
                        name="price" id="price" placeholder="@awt('Price')" value="{{ old('price', $product->price) }}" required>
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="old_price">
                            @awt('Old Price')
                            <b>(@awt('In') EURO)</b>
                        </label>
                        <input type="number" class="form-control @error('old_price') is-invalid @enderror" name="old_price"
                        id="old_price" placeholder="@awt('Old Price')" value="{{ old('old_price', $product->old_price) }}">
                        @error('old_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="qty">@awt('Quantity')</label>
                        <input type="number" class="form-control @error('qty') is-invalid @enderror"
                        name="qty" id="qty" placeholder="@awt('Quantity')" value="{{ old('qty', $product->qty) }}" required>
                        @error('qty')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="keywords">@awt('keywords')</label>
                    <input type="text" class="form-control @error('keywords') is-invalid @enderror"
                        id="keywords" name="keywords" value="{{ old('keywords', $product->keywords) }}">
                    @error('keywords')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <caption>
                                <a href="#" class="add-line text-primary">
                                    <i class="fas fa-plus"></i>
                                    @awt('Add new line')
                                </a>
                            </caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@awt('Description') (EN)</th>
                                    <th scope="col">@awt('Value')</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            @foreach ($product->content as $line)
                            <tr>
                                <th role="row">
                                    {{ $loop->index + 1 }}
                                </th>
    
                                <td>
                                    <input type="text" name="keys[]" class="form-control" value="{{ $line['key'] }}">
                                </td>
        
                                <td>
                                    <input type="text" name="values[]" class="form-control" value="{{ $line['value'] }}">
                                </td>
                                
                                <td>
                                    <a class="remove-line text-danger" role="button">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
    
                        </table>
                    </div>
                </div> --}}
    
                <div class="form-group">
                    <label for="image">@awt('Product Image')</label>
                    <div class="custom-file">
                        <input id="image" name="image" class="custom-file-input @error('image') is-invalid @enderror"
                            type="file" accept="image/*" onchange="preview_image(event)" @if(!$isEdit) required @endif>
                        <label for="image" class="custom-file-label">@awt('Select Image')</label>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 py-2">
                        <img src="@if($isEdit) {{ asset('storage/'.$product->image) }} @endif"
                            id="preview-image" class="img" height="140px">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="images">@awt('Images')</label>
                    <div class="custom-file">
                        <input id="images" name="images[]" class="custom-file-input @error('images') is-invalid @enderror"
                        type="file" accept="image/*" onchange="preview_images();" multiple>
                        <label for="images" class="custom-file-label">@awt('Select multiples Images')</label>
                        @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-2 py-2">
                        @if ($isEdit)
                        <div class="d-flex flex-wrap images">
                            @foreach ($product->galleries as $item)
                                <div class="image">
                                    <a class="close" href="{{ route('shop.product.gallery',[$item->id, $item->product_id]) }}">
                                        <i class="fas fa-times"></i>
                                    </a>
                                    <img src="{{ asset('storage/'.$item->image) }}">
                                </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="d-flex flex-wrap images" id="preview-images"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">@awt('description')</label>
                    <textarea class="form-control @error('description') is-invalid @enderror"
                    id="description" name="description" rows="20">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group d-flex justify-content-between flex-wrap">
                    <button type="submit" class="btn btn-accent">
                        @if ($isEdit)
                            @awt('Update')
                        @else
                            @awt('Save')
                        @endif
                    </button>
    
                    <a href="{{ route('shop.product.index') }}" class="btn btn-outline-danger">
                        <i class="fas fa-arrow-left"></i>
                        @awt('Back to products')
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Small Stats Blocks -->
@endsection

@section('table-js')
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

    <script>
        $('.select2').select2();

        $('#collection').change(function () {
            $('#super_category').empty();
            $('#super_category').attr('disabled', true);

            var id = $(this).val();
            
            if(id > 0) {
                $.get('/my-shop/collections/'+id, function (result) {
                    var defaultValue = new Option('Select One...', '');
                    $('#super_category').append(defaultValue);

                    result.forEach(element => {
                        var option = new Option(element.name, element.id);
                        $('#super_category').append(option);
                    });

                    $('#super_category').attr('disabled', false);
                });
            }
        });
        
        $('#super_category').change(function () {
            $('#category').attr('disabled', true);
            
            var id = $(this).val();

            if (id > 0) {
                $.get('/my-shop/categories/'+id, function (result) {
                    result.forEach(element => {
                        var option = new Option(element.name, element.id);
                        if ($("#category").find('option[value="'+ element.id +'"]').length === 0) {
                            $('#category').append(option);
                        }
                    });

                    $('#category').attr('disabled', false);
                });
            }
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


        // CKEDITOR.replace('description');


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