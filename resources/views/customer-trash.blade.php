<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>view trash data</title>
  </head>
  <body>
    <h1>view trash data
      @if(session()->has('user_name'))
      {{session()->get('user_name')}}
      @else
      ,guest
      @endif
    </h1>

    {{-- <pre>
        {{ print_r($customer)}}
    </pre> --}}
    
    <div class="card" >
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">name</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($customer as $c)
                    
              <tr>
                <th scope="row">{{$c->id}}</th>
                <td>{{$c->name}}</td>
                <td>
                <a href="{{route('customer.restore', ['id' => $c->id])}}" class="btn btn-primary"> restore</a></td>
                <td>
                <a href="{{route('customer.permanentdelete', ['id' => $c->id])}}" class="btn btn-danger">permanent delete</a></td>
 
              </tr>
              @endforeach

            </tbody>
          </table>
          <a href="{{route('customer.view')}}" class="btn btn-primary"> view all customers </a></td>

        </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>