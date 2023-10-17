<script src="//cdn.ckeditor.com/4.20.2/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('body', {
        filebrowserUploadMethod: 'form',
        uiColor: '#272822'

    })

</script>
<script src="{{ asset('admin/js/jquery.js')  }}"></script>
<script src="{{ asset('admin/js/jquery-1.8.3.min.js')  }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js')  }}"></script>
<script src="{{ asset('admin/js/jquery.scrollTo.min.js')  }}"></script>
<script src="{{ asset('admin/js/jquery.nicescroll.js')  }}" type="text/javascript"></script>
<script src="{{ asset('admin/js/jquery.sparkline.js')  }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')  }}"></script>
<script src="{{ asset('admin/js/owl.carousel.js')  }}" ></script>
<script src="{{ asset('admin/js/jquery.customSelect.min.js')  }}" ></script>
<script src="{{ asset('admin/js/common-scripts.js')  }}"></script>
<script src="{{ asset('admin/js/sparkline-chart.js')  }}"></script>
<script src="{{ asset('admin/js/easy-pie-chart.js')  }}"></script>
<script src="{{ asset('admin/js/jquery.tagsinput.js')  }}"></script>
<script src="{{ asset('admin/js/form-components.js')  }}"></script>

@livewireScripts

<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true
        });
    });
    $(function(){
        $('select.styled').customSelect();
    });
@yield('js')
</script>
