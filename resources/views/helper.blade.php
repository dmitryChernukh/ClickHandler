<link href="{{ asset('/css/main.css') }}" rel="stylesheet">

<div id="wrapper">

    <div class="top-left">
        <!-- Not found text -->
        <div class="not-found-text">
            <h1 class="not-found-text">Hi!
                This page will help you to answer some questions!
                <span class="owner-c">Regards: Dmitry Chernykh. November 2016.</span>
            </h1>

        </div>
        <!-- Not found text -->
    </div>

    <div class="planet">
        <div class="dog-wrapper">
            <!-- dog running -->
            <div class="dog" style=""></div>
            <!-- dog running -->
            <div class="dog-bubble">
                    @if(isset($errors) && count($errors) > 0)
                        <div class="error-reporting"> Error! </div>
                        @foreach($errors as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @elseif(isset($success))
                        <div class="success-reporting"> Success! </div>
                        @foreach($success as $element)
                            <p>{{$element}}</p>
                        @endforeach
                    @else
                       <p style="font-weight: bold; padding: 20px;"> Hey. My name is Rex.
                           I'll try to help you ....!
                       </p>
                    @endif

            </div>
            <div class="bubble-options">

            </div>
        </div>
        <!-- planet image -->
        <img src="/images/planet.png" alt="planet" class="my-planet">
        <!-- planet image -->
    </div>
</div>
