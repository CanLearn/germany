@extends('admin.layouts.main')

@section('title')
    User
@endsection
@section('main')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            USER
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="icon-id"></i> id</th>
                                <th class=""><i class=""></i> name</th>
                                <th><i class="icon-email"></i> email</th>
                                <th><i class="icon-email"></i> phone</th>
                                <th><i class=" icon-setting"></i> Status</th>
                                <th>setting</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($users as $user)
                               <tr>
                                   <td><a href="#">{{ $user->id  }}</a></td>
                                   <td class="hidden-phone">{{ $user->name  }}</td>
                                   <td>{{ $user->email  }}</td>
                                   <td>{{ $user->phone  }}</td>

                                   <td><span class="label label-info label-mini">{{ $user->status  }}</span></td>
                                   <td>
                                       <button class="btn btn-primary btn-xs">
                                           <i class="icon-pencil"><a href="{{ route('panel.users.edit' , $user->id)  }}">edit</a></i></button>
                                       <button class="btn btn-danger btn-xs">
                                           <i class="icon-trash "><a onclick="destroyUser(event, {{ $user->id }})">delete</a></i></button>
                                   </td>
                               </tr>

                               <form action="{{ route('panel.users.destroy', $user->id) }}" method="post"
                                     id="destroy-user-{{ $user->id }}">
                                   @csrf
                                   @method('delete')
                               </form>
                           @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </section>
    </section>
    <script>
        function destroyUser(event, id) {
            event.preventDefault();
            document.getElementById(`destroy-user-${id}`).submit()
        }
    </script>
@endsection
