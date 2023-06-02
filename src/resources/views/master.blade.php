<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('vendor/pagesmanager/main.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<section id="nav">
    <section clas="nav">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="{{ asset('/vendor/pagesmanager/main.js') }}" type="text/javascript"></script>
<script type="text/javascript" >
    jQuery(document).ready(function () {
        //console.log('aaa');
        jQuery('.delete').click(function (e) {
            e.preventDefault();
            if(confirm('Are you sure?')){
                var _id = jQuery(this).attr('data-id');
                jQuery('#delete-'+_id).submit();
            }
        });
    });
</script>
</body>
</html>
