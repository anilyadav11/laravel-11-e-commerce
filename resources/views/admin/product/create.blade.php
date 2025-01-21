@extends('admin.layouts.app')
@section('content')
<div class="col-md-12">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Quick Example</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <div class="container-fluid">
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}

            </div>
            @endif
        </div>
        <form method="post" id="yourFormId" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{old('name') ?? ''}}" />
                    <div class="text-danger">
                        @error('name')
                        {{$message}}
                        @enderror
                    </div>

                </div>
                <div class="mb-3">
                    <label for="Price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" aria-describedby="emailHelp" />
                    <div class="text-danger">
                        @error('price')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="stock" name="stock" aria-describedby="emailHelp" />
                    <div class="text-danger">
                        @error('stock')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="image" name="image" />
                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group">
                    <span class="input-group-text">With textarea</span>
                    <textarea class="form-control" aria-label="With textarea" name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
    </div>

</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#yourFormId').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    alert('product added successfully');
                    console.log(response);
                },
                error: function(xhr) {
                    alert('somthing went wrong');
                    console.log(xhr.responseText);
                }

            });

        });
    });
</script>