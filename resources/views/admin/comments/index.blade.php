@extends('admin.layouts.main')

@section('title')
    Comment
@endsection
@section('main')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Comment
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th><i class="icon-id"></i> id</th>
                                <th class=""><i class=""></i> name user</th>
                                <th class=""><i class=""></i> email user</th>
                                <th class=""><i class=""></i> status</th>
                                <th class=""><i class=""></i>
                                    post id
                                </th>
                                <th>setting</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td><a href="#">{{ $comment->id  }}</a></td>
                                    <td>{{ $comment->user->name  }}</td>
                                    <td>{{ $comment->user->email  }}</td>
                                    <td>{{ $comment->status }}</td>
                                    <td>
                                        @if($comment->commentable)
                                            <a href="{{ $comment->commentable->path()  }}">show</a>
                                        @elseif(! $comment->commentable)
                                            no link
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-xs">
                                            <i class=""><a
                                                    href="{{ route('panel.comment-approved' , $comment->id)  }}">
                                                    approved comment
                                                </a></i>
                                        </button>
                                        <button class="btn btn-primary btn-xs">
                                            <i class=""><a
                                                    href="{{ route('panel.comment-reject' , $comment->id)  }}">
                                                    reject
                                                </a></i>
                                        </button>
                                        <button class="btn btn-danger btn-xs">
                                            <i class="icon-trash "><a onclick="destroyUser(event, {{ $comment->id }})">delete</a></i>
                                        </button>

                                    </td>
                                </tr>

                                <form action="{{ route('panel.comments.destroy', $comment->id) }}" method="post"
                                      id="destroy-user-{{ $comment->id }}">
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
