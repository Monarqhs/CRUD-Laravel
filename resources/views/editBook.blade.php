<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Bool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold fst-italic" href="#">BUKUBAKU</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/bukubaku">View</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/create-book">Add Books</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="m-5">
        <h1 class="text-center">Edit Book</h1>
        <form action="{{route('updateBook', $book->id )}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="mb-3">
              <label for="exampleInputName" class="form-label">Name</label>
              <input type="text" class="form-control @error('Name') is-invalid @enderror" id="exampleInputName" name="Name" value="{{$book->Name}}">
            </div>

            @error('Name')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
              <label for="exampleInputDate" class="form-label">Publication Date</label>
              <input type="date" class="form-control @error('PublicationDate') is-invalid @enderror" id="exampleInputDate" name="PublicationDate" value="{{$book->PublicationDate}}"">
            </div>

            @error('PublicationDate')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleInputStock" class="form-label">Stock</label>
                <input type="number" class="form-control @error('Stock') is-invalid @enderror" id="exampleInputStock" name="Stock" value="{{$book->Stock}}">
            </div>

            @error('Stock')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="exampleInputAuthor" class="form-label">Author</label>
                <input type="text" class="form-control @error('Author') is-invalid @enderror" id="exampleInputAuthor" name="Author" value="{{$book->Author}}">
            </div>

            @error('Author')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <br>
                <img src="{{asset('/storage/image/'.$book->Image)}}" style="width: 10rem" class="card-img-top" alt="...">
                <br><br>
                <input class="form-control @error('Image') is-invalid @enderror" type="file" id="formFile" name="Image" value="{{$book->Image}}">
            </div>

            @error('Image')
                <div class="alert alert-danger" role="alert">{{$message}}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
