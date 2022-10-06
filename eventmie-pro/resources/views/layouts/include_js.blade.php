<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

{{-- Load third party plugins in seperate file (node modules) --}}
<script type="text/javascript" src="{{ eventmie_asset('js/manifest.js') }}"></script>
<!-- owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ eventmie_asset('js/custom.js') }}"></script>

{{-- localization --}}
<script type="text/javascript" src="{{ route('eventmie.eventmie_lang') }}"></script>

{{-- VueJs Global Constants --}}
<script type="text/javascript">
    const my_lang = {!! json_encode(session('my_lang', \Config::get('app.locale'))) !!};


    const date_format = {
        vue_date_format: '{!! format_js_date() !!}',
        vue_time_format: '{!! format_js_time() !!}'
    };

    $(document).ready(function() {
        $("#news-slider").owlCarousel({
            items : 3,
            itemsDesktop:[1199,3],
            itemsDesktopSmall:[980,2],
            itemsMobile : [600,1],
            navigation:true,
            navigationText:["",""],
            pagination:true,
            autoPlay:true
        });
    });
</script>

{{-- Javascript Global Listener --}}
<script type="text/javascript">
/**
 * Header menu onscroll
 */
var lastScrollTop = 0;
function handleScroll() {
    let el = document.getElementById('navbar_vue');
    let st = window.pageYOffset || document.documentElement.scrollTop;

    lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
    if(window.scrollY > 1) {
        el.classList.add('menu-onscroll');
    } else {
        el.classList.remove('menu-onscroll');

        if(el.classList.contains('is-active')) {
            el.classList.add('is-mobile');
        }
    }
};

function scrollListener( obj, type, fn ) {
    if ( obj.attachEvent ) {
        obj['e'+type+fn] = fn;
        obj[type+fn] = function(){obj['e'+type+fn]( window.event );};
        obj.attachEvent( 'on'+type, obj[type+fn] );
    } else {
        obj.addEventListener( type, fn, false );
    }
}

scrollListener(window, 'scroll', function(e) {
    handleScroll();
});


// Copy to clipboard
function copyToClipboard() {
    var dummy = document.createElement('input'),
    text = window.location.href;

    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);

    alert('Event URL Copied!')
}


// set local timezone
var local_timezone = {!! json_encode(route('eventmie.local_timezone')) !!};

function setLocalTimezone() {

    $.ajax({
        url: local_timezone,
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            local_timezone : Intl.DateTimeFormat().resolvedOptions().timeZone,

        },
        dataType: "json",
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            console.log(`Error ${error}`);
        }
    });
}

setLocalTimezone();

</script>
