@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

          <a class="btn btn-primary" href="{{ route('register') }}">{{ __('Register') }}</a>

            <div class="card mt-3">

                <div class="card-header">Vendors</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Emal</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          @foreach ($users as $user)

                          <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td> {{$user->name}} </td>
                            <td>{{$user->email}}</td>
                            <td>
                                <form action="{{route('users.destroy', $user->id)}}" method="post">

                                  <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Edit</a>

                                  @csrf
                                  @method('DELETE')

                                  <button type="submit" class="btn btn-danger">Delete</button>
                                  
                                </form>

                            </td>
                          </tr>
                              
                          @endforeach
                          
                          
                          
                        </tbody>
                      </table>  

                      {{ $users->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
