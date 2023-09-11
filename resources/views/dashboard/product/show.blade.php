<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Card untuk menampilkan data -->
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        Detail Produk
                        <div>
                            <a class="btn btn-warning text-white" href="{{ route('product.edit', $product->id) }}">Edit</a>
                            <form id="formDlt" action="{{ route('product.delete', $product->id) }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <a class="btn btn-danger" id="delete" >Delete</a>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" width="200" class="img-fluid mb-3" alt="{{ $product->name }}">
                        @else
                        <img src="http://source.unsplash.com/500x400?{{ $product->name }}" width="200" class="img-fluid mb-3" alt="{{ $product->name }}">
                        @endif
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="text-muted">{{ $product->description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('product') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan script JavaScript Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        const deleteBtn = document.querySelector('#delete')
            const formDlt = document.querySelector('#formDlt')
    
            deleteBtn.addEventListener('click', function(e) {
                e.preventDefault()
                const confirm = window.confirm('apakah anda yakin?')
    
                if (confirm) {
                    formDlt.submit()
                }
            })
    </script>
</body>
</html>
