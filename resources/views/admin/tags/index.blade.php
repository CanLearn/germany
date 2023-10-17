@extends('admin.layouts.main')

@section('title')
    Tag
@endsection
@section('main')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tag manager admin
                        </header>
                        <table class="table table-striped table-advance table-hover">
                            <thead>
                            <tr>
                                <th> id tag</th>
                                <th class="hidden-phone"> title tag</th>
                                <th> time create tag</th>
                                <th>setting</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                                <tr>
                                    <td><a href="#">{{ $tag->id  }}</a></td>
                                    <td class="hidden-phone">{{ $tag->title  }}</td>
                                    <td>{{ $tag->created_at  }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-xs">
                                            <a onclick="destroyTag(event , {{ $tag->id  }})">
                                                <i class="icon-trash"></i>
                                            </a></button>
                                    </td>
                                </tr>

                                <form action="{{ route('panel.tags.destroy' , $tag->id)  }}" method="post"
                                      id="destroy-tags-{{ $tag->id }}">
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
        function destroyTag(event, id) {
            event.preventDefault();
            document.getElementById(`destroy-tags-${id}`).submit()
        }
    </script>
@endsection
