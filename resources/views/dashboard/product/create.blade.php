<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/crud.css">
    <title>Document</title>
</head>
<body>
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                 @csrf
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2 img-preview" src="" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 1 MB</div>
                        <!-- Profile picture upload button-->
                        {{-- <button class="btn btn-primary" type="button">Upload image</button> --}}
                        <div class="mb-3">
                            <label for="image" class="form-label">Select an image</label>
                            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        @if(session()->has('failed'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('failed_c') }}
                        </div>
                        @endif
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="name">Name</label>
                                    <input class="form-control" id="name" name="name" type="text" placeholder="Product Name" value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <label class="small mb-1" for="description">Description</label>
                                <div class="form-floating">
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                @error('description')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="submit">Add data</button>
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
