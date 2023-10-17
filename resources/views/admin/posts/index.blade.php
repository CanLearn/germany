@extends('admin.layouts.main')

@section('title')
    Post
@endsection
@section('main')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            POST
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="icon-id"></i> id</th>
                                <th class=""><i class=""></i> title</th>
                                <th><i class="icon-email"></i> sender</th>
                                <th><i class="icon-email"></i> location image</th>

                                {{--                                <th><i class="icon-email"></i>category post </th>--}}
                                <th><i class=" icon-setting"></i> Status</th>
                                <th>setting</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($posts as $post)
                               <tr>
                                   <td><a href="#">{{ $post->id  }}</a></td>
                                   <td class="hidden-phone">{{ $post->title  }}</td>
                                   <td>{{ $post->user->name  }}</td>
                                   <td>{{ $post->confirmation_post  }}</td>

{{--                                @foreach($post->categories as $category)--}}
{{--                                       <td>{{ $category->name  }}</td>--}}
{{--                                @endforeach--}}

                                   <td><a href=""><span class="label label-info label-mini">{{ $post->status  }}</span></a></td>
                                   <td>
                                       <button class="btn btn-primary btn-xs">
                                           <i class="icon-pencil"><a href="{{ route('panel.posts.edit' , $post->id)  }}">edit</a></i></button>
                                       <button class="btn btn-success btn-xs">
                                           <i class=" icon-thumbs-up"><a onclick="confirmPost(event, {{ $post->id }})">confirm</a></i></button>
                                       <button class="btn btn-danger btn-xs">
                                           <i class=" icon-thumbs-down "><a onclick="rejectPost(event, {{ $post->id }})">reject</a></i></button>
                                       <button class="btn btn-info btn-xs">
                                           <i class=" icon-eye-open"><a onclick="goodPost(event, {{ $post->id }})">good</a></i></button>
                                       <button class="btn btn-danger btn-xs">
                                           <i class="icon-trash "><a onclick="destroyUser(event, {{ $post->id }})">delete</a></i></button>
                                   </td>
                               </tr>

                               <form action="{{ route('panel.posts.destroy', $post->id) }}" method="post"
                                     id="destroy-post-{{ $post->id }}">
                                   @csrf
                                   @method('delete')
                               </form>

                               <form action="{{ route('panel.posts.reject', $post->id) }}" method="post"
                                     id="reject-post-{{ $post->id }}">
                                   @csrf
                                   @method('put')
                               </form>

                               <form action="{{ route('panel.posts.confirm', $post->id) }}" method="post"
                                     id="confirm-post-{{ $post->id }}">
                                   @csrf
                                   @method('put')
                               </form>

                               <form action="{{ route('panel.posts.good', $post->id) }}" method="post"
                                     id="good-post-{{ $post->id }}">
                                   @csrf
                                   @method('put')
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
            document.getElementById(`destroy-post-${id}`).submit()
        }
        function confirmPost(event, id) {
            event.preventDefault();
            document.getElementById(`confirm-post-${id}`).submit()
        }
        function rejectPost(event, id) {
            event.preventDefault();
            document.getElementById(`reject-post-${id}`).submit()
        }
        function goodPost(event, id) {
            event.preventDefault();
            document.getElementById(`good-post-${id}`).submit()
        }
    </script>
@endsection
