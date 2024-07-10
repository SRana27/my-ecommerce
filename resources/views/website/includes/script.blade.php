<script src="{{asset('/')}}website/assets/js/main.js"></script>
<script src="{{asset('/')}}website/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}website/assets/js/tiny-slider.js"></script>
<script src="{{asset('/')}}website/assets/js/glightbox.min.js"></script>
<script src="{{asset('/')}}website/assets/js/jquery.js"></script>
<script src="{{asset('/')}}website/assets/js/setup.js"></script>
<script src="{{asset('/')}}website/assets/js/xzoom.min.js"></script>
<script src="{{asset('/')}}website/assets/js/jquery-ui.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



 <script type="text/javascript">
    //========= Hero Slider
    tns({
        container: '.hero-slider',
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: false,
        controls: true,
        controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
    });

    //======== Brand Slider
    tns({
        container: '.brands-logo-carousel',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
            0: {
                items: 1,
            },
            540: {
                items: 3,
            },
            768: {
                items: 5,
            },
            992: {
                items: 6,
            }
        }
    });
</script>

 <script>
    const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

    const timer = () => {
        const now = new Date().getTime();
        let diff = finaleDate - now;
        if (diff < 0) {
            document.querySelector('.alert').style.display = 'block';
            document.querySelector('.container').style.display = 'none';
        }

        let days = Math.floor(diff / (1000 * 60 * 60 * 24));
        let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
        let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
        let seconds = Math.floor(diff % (1000 * 60) / 1000);

        days <= 99 ? days = `0${days}` : days;
        days <= 9 ? days = `00${days}` : days;
        hours <= 9 ? hours = `0${hours}` : hours;
        minutes <= 9 ? minutes = `0${minutes}` : minutes;
        seconds <= 9 ? seconds = `0${seconds}` : seconds;

        document.querySelector('#days').textContent = days;
        document.querySelector('#hours').textContent = hours;
        document.querySelector('#minutes').textContent = minutes;
        document.querySelector('#seconds').textContent = seconds;

    }
    timer();
    setInterval(timer, 1000);
</script>

<script>
    var availableTags = [];
    $.ajax({
        method:"GET",
        url: "{{url('/product-list')}}",

        success: function (response){
            //console.log(response);
            StartAutoComplete(response);

        }

    });

    function StartAutoComplete(availableTags)
    {
        $( "#search_product" ).autocomplete({
      source: availableTags
    },{
        minLength: 2
    });
    }
</script>

<script>
    $(function () {

        var sid =($('#select1').val());
        $.ajax({
            type:"GET",
            url:" {{url('/subcategory-wise-product-list')}}",
            data: {id:sid},
            success:function (response) {
                // console.log(response);
                startAutoComplete1(response);
            }
        });
        function startAutoComplete1(availableTags)
        {
            $( "#s_product" ).autocomplete({
                source: availableTags
            },
            {
                minLength: 2
            });

        }
        
        $(document).on('change','#select1',function () {
            var subcategoryId = $(this).val();
            // alert(subcategoryId);
            $.ajax({
                type:"get",
                url:" {{url('/subcategory-wise-product-list')}}",
                data: {id:subcategoryId},
                // dataType:"JSON",
                success:function (response) {
                    // console.log(response);
                    startAutoComplete(response);
                }
            });
            function startAutoComplete(availableTags)
            {
                $( "#s_product" ).autocomplete({
                    source: availableTags
                },
                {
                minLength: 2
            });


            }
        });

    })
</script>
<script>
    $(document).ready(function () {


        $('#addToCart').click(function (e) {
            e.preventDefault()
            var product_id = $(this).closest('#detail_info').find('#pId').val();
            var product_qty = $(this).closest('#detail_info').find('#inputQty').val();

            // alert(product_id);
            // alert(product_qty);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "post",
                url: "{{route('add-to-cart')}}",
                data: {
                    'product_id': product_id,
                    'qty': product_qty,
                },
                success: function (response) {
                
                    window.location.href="{{route('show-cart')}}"

                }
            });
        });

        $('#addTo').click(function () {
      
            swal("sorry this product not available now!");
          
        });
      
        $('#update').click(function () {
          swal('quantity update successfully');
                     
   
        } );

        $('#addFirst').click(function () {
          swal('please add products first');
                     
   
        }); 
           
    });

    // function confirmDelete(){
    //     swal('are you sure remove this product');
    // }

        function confirmDelete(){
        swal({
            // title: "Are you sure?",
            text: "Are you sure ?to remove this product!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                // Perform your delete operation here, if needed
                swal("product removed!", {
                    icon: "success",
                });
            } 
        });
    }
</script>
