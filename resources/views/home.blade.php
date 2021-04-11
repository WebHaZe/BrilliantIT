<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users Info</title>

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-light">

      <div class="container">
        <main>
          <div class="py-5 text-center">
            <h2>Users Info</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
          </div>

          <div class="row">
            <h4 class="mb-3">User data</h4>
            <form class="needs-validation" action="{{ route('addNewUser') }}" method="post">

              @csrf

              <div class="row">
                <div class="col-sm-6">
                  <label for="firstName" class="form-label">First name</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Your first name">
                  <div class="text-danger">
                    @error('firstName')
                        <span>{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="lastName" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Your last name">
                  <div class="text-danger">
                    @error('lastName')
                        <span>{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <label for="phoneInput" class="form-label">Phone</label>
                  <input type="text" class="form-control" id="phoneInput" name="phone" placeholder="Format is +380123456789">
                  <div class="text-danger">
                    @error('phone')
                        <span>{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <hr class="my-4">

              <button class="w-100 btn btn-primary btn-lg" type="submit">Add user</button>

              @if (session('success') !== null)
                <div class="alert alert-success" role="alert" style="margin-top: 15px;">
                  {{ session('success') }}
                </div>
              @endif
            </form>
          </div>

          <hr class="my-4">

          <div>
            <h4 class="mb-3">Users List</h4>

            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">First name</th>
                  <th scope="col">Last name</th>
                  <th scope="col">Phones</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $user->getFirstName() }}</td>
                    <td>{{ $user->getLastName() }}</td>
                    <td>
                      <pre>{{ $user->getPhonesInColumn() }}</pre>
                    </td>
                    <td>
                      <a href="{{ route('removeUser', $user->getId()) }}" class="btn btn-danger">Remove</a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </main>
      </div>

      <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
