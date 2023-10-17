@extends('admin.layouts.main')
@section('title')
    edit Post {{ $posts->title  }}
@endsection

@section('css')
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/bootstrap-reset.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/bootstrap-datepicker/css/datepicker.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/assets/bootstrap-colorpicker/css/colorpicker.css') }}"/>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('admin/assets/bootstrap-daterangepicker/daterangepicker.css') }}"/>
    <link href="{{ asset('index/"css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('index/css/style-responsive.css') }}" rel="stylesheet"/>
@endsection

@section('main')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Form Elements
                        </header>
                        <div class="panel-body">
                            <form action="{{ route('panel.posts.update' , $posts->id)  }}"  class="form-horizontal tasi-form"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">title post</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" value="{{ $posts->title  }}"
                                               class="form-control">
                                        @error('title')
                                        <span class="help-block">{{ $message  }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="inputSuccess">category</label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" name="category">
                                            <option value="">not</option>
                                            @foreach($posts->categories as $category)
                                                <option name="{{ $category->id  }} "
                                                        value="{{ $category->name  }}"> {{ $category->name  }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <span class="help-block">{{ $message  }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2" for="inputSuccess">
                                        Tags Input
                                    </label>
                                    <div class="col-lg-10">
                                        <input name="tags[]" id="tagsinput" class="tagsinput"
                                               value="gallery" multiple/>
                                    </div>
                                    @error('category')
                                    <span class="help-block">{{ $message  }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">upload image</label>
                                    <div class="col-sm-10">
{{--                                        <img src="{{ $posts->getImagethree()  }}" alt="">--}}
                                        <input type="file" name="image" class="form-control" accept="image/*"/>
                                        @error('image')
                                        <span class="help-block">{{ $message  }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">upload video</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="video" class="form-control" accept="video/*"/>
                                        @error('video')
                                        <span class="help-block">{{ $message  }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="radios">
                                        <label class="label_radio" for="radio-02">
                                            <input name="confirmation_post"
                                                   @if($posts->confirmation_post == 'body') checked
                                                   @endif  id="radio-02" value="body" type="radio"/> body
                                        </label>
                                        <label class="label_radio" for="radio-03">
                                            <input name="confirmation_post"
                                                   @if($posts->confirmation_post == 'head') checked @endif id="radio-03"
                                                   value="head" type="radio"/> head
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">content/caption</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="content">{{ old($posts->content ) }}{{ $posts->content   }}</textarea>
                                        @error('content')
                                        <span class="help-block">{{ $message  }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">body</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="body">{{ $posts->body  }}</textarea>
                                        @error('body')
                                        <span class="help-block">{{ $message  }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-info">send post</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
@endsection
@section('js')
    <script src="{{ asset('admin/js/jquery.js')  }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js')  }}"></script>
    <script src="{{ asset('admin/js/jquery.scrollTo.min.js')  }}"></script>
    <script src="{{ asset('admin/js/jquery.nicescroll.js')  }}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/jquery-ui-1.9.2.custom.min.js')  }}"></script>
    <script src="{{ asset('admin/js/bootstrap-switch.js')  }}"></script>
    <script src="{{ asset('admin/js/jquery.tagsinput.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/ga.js')  }}"></script>
    <script type="text/javascript"
            src="{{ asset('admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/bootstrap-daterangepicker/date.js')  }}"></script>
    <script type="text/javascript"
            src="{{ asset('admin/assets/bootstrap-daterangepicker/daterangepicker.js')  }}"></script>
    <script type="text/javascript"
            src="{{ asset('admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')  }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/ckeditor/ckeditor.js')  }}"></script>
    {{--    <script src="{{ asset('admin/js/common-scripts.js')  }}"></script>--}}
    <script src="{{ asset('admin/js/form-component.js')  }}"></script>

@endsection
