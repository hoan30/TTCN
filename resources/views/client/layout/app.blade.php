<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="XF" dir="LTR" data-app="public"
    data-template="EWRporta_articles_index" data-container-key data-content-key data-logged-in="false"
    data-cookie-prefix="xf_" data-csrf="1684425738,70f1effd4bb3e0428a0081f2ed21d8ce" data-style-id="9"
    class="has-no-js template-EWRporta_articles_index">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('title')

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet" />
    <link rel="preload" href="client/styles/fonts/fa/fa-regular-400.woff2?_v=5.15.3" as="font" type="font/woff2"
        crossorigin="anonymous" />
    <link rel="preload" href="{{ env('APP_URL') }}/client/styles/fonts/fa/fa-solid-900.woff2?_v=5.15.3" as="font"
        type="font/woff2" crossorigin="anonymous" />
    <link rel="preload" href="{{ env('APP_URL') }}/client/styles/fonts/fa/fa-brands-400.woff2?_v=5.15.3" as="font"
        type="font/woff2" crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ env('APP_URL') }}/client/css/style.css">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/client/css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body data-template="EWRporta_articles_index">
    <div class="focus-width">
        <div class="p-pageWrapper" id="top">

            @include('client.layout.header')

            <div class="focus-content">
                <div class="focus-ad">
                    <div class="p-body">
                        <div class="p-body-inner p-0">
                            @yield('body')
                        </div>
                    </div>
                </div>
            </div>


            @include('client.layout.footer')
        </div>
    </div>

    <x-modal-login />
    <x-modal-register />

    <script defer type="text/javascript">
        function checkClassExistence(className) {
            if (document.querySelectorAll('.error-form-auth').length > 0) {
                setTimeout(() => {
                    try {
                        $('#exampleModal').modal('show');
                    } catch (e) {
                        setTimeout(() => {
                            $('#exampleModal').modal('show');
                        }, 1000);
                    }
                }, 1000);
            } else {
                console.log(className + ' không tồn tại.');
            }
        }

        checkClassExistence('error-form-auth');
    </script>
    <script defer>
        $('#summernote').summernote({
            tabsize: 2,
            height: 600
        });
        $('#tags').select2();
    </script>

</body>

</html>
