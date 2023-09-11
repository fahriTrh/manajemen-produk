<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/crud.css">
    <title>Edit</title>
</head>
<body>
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Gambar produk</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        @if($product->image)
                        <img class="img-account-profile rounded-circle mb-2 img-preview" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        @else
                        <img class="img-account-profile rounded-circle mb-2" src="http://source.unsplash.com/500x400?{{ $product->name }}" alt="">
                        @endif
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                        {{-- old image --}}
                        <input type="hidden" name="oldImage" value="{{ $product->image }}">
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    @if(session()->has('failed_u'))
                    <div class="alert alert-success mt-4" role="alert">
                        {{ session('failed_u') }}
                    </div>
                    @endif
                    <div class="card-header">Detail produk</div>
                    <div class="card-body">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="name">Name</label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Product Name" value="{{ $product->name }}">
                                </div>
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <label class="small mb-1" for="description">Description</label>
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description">{{ $product->description }}</textarea>
                                  </div>
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
        
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector('.img-preview')

        // imgPreview.style.display = 'block'

        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }

    }
    </script>
</body>
</html>
