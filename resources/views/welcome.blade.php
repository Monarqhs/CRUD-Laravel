<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BUKUBAKU</title>
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
                <a class="nav-link active" aria-current="page" href="/bukubaku">View</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="/create-book">Add Books</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    @foreach ($books as $book)
    <div class=" m-5">
        <div class="card" style="width: 18rem;">
            <img src="{{asset('/storage/image/'.$book->Image)}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h2 class="card-title">{{$book->Name}}</h2>
              <h4 class="card-title">{{$book->PublicationDate}}</h4>
              <h5 class="card-title">Stock: {{$book->Stock}}</h5>
              <p class="card-text">by: {{$book->Author}}</p>

              <a href="{{route('editBook',$book->id)}}" class="btn btn-success">Edit</a>

            </div>
          </div>
    </div>
    @endforeach



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
