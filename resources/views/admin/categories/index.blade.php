@extends('admin.layouts.main')

@section('title')
    Category
@endsection
@section('main')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CATEGORY
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="icon-id"></i> id</th>
                                <th class=""><i class=""></i> name user</th>
                                <th class=""><i class=""></i> name email</th>

                                <th><i class="icon-email"></i> parent</th>
                                <th>setting</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($categories as $category)
                               <tr>
                                   <td><a href="#">{{ $category->id  }}</a></td>
                                   <td class="hidden-phone">{{ $category->name  }}</td>
                                   <td>{{ $category->user->name  }}</td>
                                   <td>{{ $category->getParentName()  }}</td>
                                   <td>
                                       <button class="btn btn-primary btn-xs">
                                           <i class="icon-pencil"><a href="{{ route('panel.category.edit' , $category->id)  }}">edit</a></i></button>
                                       <button class="btn btn-danger btn-xs">
                                           <i class="icon-trash "><a onclick="destroyUser(event, {{ $category->id }})">delete</a></i></button>
                                   </td>
                               </tr>

                               <form action="{{ route('panel.category.destroy', $category->id) }}" method="post"
                                     id="destroy-user-{{ $category->id }}">
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
