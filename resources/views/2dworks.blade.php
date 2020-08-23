<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="css/body.css">
        <link href="/css/app.css" rel="stylesheet">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.16/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js"></script>
        <script src="https://npmcdn.com/vue-sortable@latest"></script>
    </head>
    <body>

        <div id="app">
            <div id="container">
                <div id = "overlay">
                    <!-- Navbar -->
            <header>
                @include('includes.header')
            </header>


                    <h5 class="blockquote text-center text-light">
                        I believe that all artistic mediums benefits from a strong understanding of 2D fundamentals. I strive to learn and practice shape language, defining silhouettes, clumping, and color to tell a story with each piece that I work on. Throughout the entire creative process, I push myself to heavily use reference so that I can draw from a larger pool of inspiration and to ensure that I'm learning from people with more mileage than me.
                    </h5>

                          <!-- Dialogue Box -->
                          <div id = "dialogueBox" >
                            <span class= "user-no-touch" style= "color: white" id="dialogueBox-text">
                                Cat mew mew mew meow
                            </span>
                        </div>
                    <!-- Gallery -->
                    <div id="imageContainer">
                        <div id="photos" >
                            <?php
                            include('php/imageLoader.php');
                            ?>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div id="submit-container">
                        <input type='button' class="btn-submit" value='Submit' id='submit' />
                    </div>
                </div>

            </div>


        </div>
             <!-- Scripts -->
             <script   type="module" src="{{ asset('js/app.js') }}"></script>
             <script>document.body
                .className += ' fade-out';</script>
            <script  type="text/javascript" src="{{ URL::asset("https://unpkg.com/typewriter-effect@latest/dist/core.js") }}"></script>
            <script   type="module" src="{{ asset('js/threeDbackground.js') }}"></script>
            <script   type="module" src="{{ asset('js/dialogueBox.js') }}"></script>

        <script type="text/javascript">

            'use strict';

            ;( function ( document, window, index )
            {
                // feature detection for drag&drop upload
                var isAdvancedUpload = function()
                    {
                        var div = document.createElement( 'div' );
                        return ( ( 'draggable' in div ) || ( 'ondragstart' in div && 'ondrop' in div ) ) && 'FormData' in window && 'FileReader' in window;
                    }();


                // applying the effect for every form
                var forms = document.querySelectorAll( '.box' );
                Array.prototype.forEach.call( forms, function( form )
                {
                    var input		 = form.querySelector( 'input[type="file"]' ),
                        label		 = form.querySelector( 'label' ),
                        errorMsg	 = form.querySelector( '.box__error span' ),
                        restart		 = form.querySelectorAll( '.box__restart' ),
                        droppedFiles = false,
                        showFiles	 = function( files )
                        {
                            label.textContent = files.length > 1 ? ( input.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', files.length ) : files[ 0 ].name;
                        },
                        triggerFormSubmit = function()
                        {
                            var event = document.createEvent( 'HTMLEvents' );
                            event.initEvent( 'submit', true, false );
                            form.dispatchEvent( event );
                        };

                    // letting the server side to know we are going to make an Ajax request
                    var ajaxFlag = document.createElement( 'input' );
                    ajaxFlag.setAttribute( 'type', 'hidden' );
                    ajaxFlag.setAttribute( 'name', 'ajax' );
                    ajaxFlag.setAttribute( 'value', 1 );
                    form.appendChild( ajaxFlag );

                    // automatically submit the form on file select
                    input.addEventListener( 'change', function( e )
                    {
                        showFiles( e.target.files );


                        triggerFormSubmit();


                    });

                    // drag&drop files if the feature is available
                    if( isAdvancedUpload )
                    {
                        form.classList.add( 'has-advanced-upload' ); // letting the CSS part to know drag&drop is supported by the browser

                        [ 'drag', 'dragstart', 'dragend', 'dragover', 'dragenter', 'dragleave', 'drop' ].forEach( function( event )
                        {
                            form.addEventListener( event, function( e )
                            {
                                // preventing the unwanted behaviours
                                e.preventDefault();
                                e.stopPropagation();
                            });
                        });
                        [ 'dragover', 'dragenter' ].forEach( function( event )
                        {
                            form.addEventListener( event, function()
                            {
                                form.classList.add( 'is-dragover' );
                            });
                        });
                        [ 'dragleave', 'dragend', 'drop' ].forEach( function( event )
                        {
                            form.addEventListener( event, function()
                            {
                                form.classList.remove( 'is-dragover' );
                            });
                        });
                        form.addEventListener( 'drop', function( e )
                        {
                            droppedFiles = e.dataTransfer.files; // the files that were dropped
                            showFiles( droppedFiles );


                            triggerFormSubmit();

                                            });
                    }


                    // if the form was submitted
                    form.addEventListener( 'submit', function( e )
                    {
                        // preventing the duplicate submissions if the current one is in progress
                        if( form.classList.contains( 'is-uploading' ) ) return false;

                        form.classList.add( 'is-uploading' );
                        form.classList.remove( 'is-error' );

                        if( isAdvancedUpload ) // ajax file upload for modern browsers
                        {
                            e.preventDefault();

                            // gathering the form data
                            var ajaxData = new FormData( form );
                            if( droppedFiles )
                            {
                                Array.prototype.forEach.call( droppedFiles, function( file )
                                {
                                    ajaxData.append( input.getAttribute( 'name' ), file );
                                });
                            }

                            // ajax request
                            var ajax = new XMLHttpRequest();
                            ajax.open( form.getAttribute( 'method' ), form.getAttribute( 'action' ), true );

                            ajax.onload = function()
                            {
                                form.classList.remove( 'is-uploading' );
                                if( ajax.status >= 200 && ajax.status < 400 )
                                {
                                    var data = JSON.parse( ajax.responseText );
                                    form.classList.add( data.success == true ? 'is-success' : 'is-error' );
                                    if( !data.success ) errorMsg.textContent = data.error;
                                }
                                else alert( 'Error. Please, contact the webmaster!' );
                            };

                            ajax.onerror = function()
                            {
                                form.classList.remove( 'is-uploading' );
                                alert( 'Error. Please, try again!' );
                            };

                            ajax.send( ajaxData );
                        }
                        else // fallback Ajax solution upload for older browsers
                        {
                            var iframeName	= 'uploadiframe' + new Date().getTime(),
                                iframe		= document.createElement( 'iframe' );

                                $iframe		= $( '<iframe name="' + iframeName + '" style="display: none;"></iframe>' );

                            iframe.setAttribute( 'name', iframeName );
                            iframe.style.display = 'none';

                            document.body.appendChild( iframe );
                            form.setAttribute( 'target', iframeName );

                            iframe.addEventListener( 'load', function()
                            {
                                var data = JSON.parse( iframe.contentDocument.body.innerHTML );
                                form.classList.remove( 'is-uploading' )
                                form.classList.add( data.success == true ? 'is-success' : 'is-error' )
                                form.removeAttribute( 'target' );
                                if( !data.success ) errorMsg.textContent = data.error;
                                iframe.parentNode.removeChild( iframe );
                            });
                        }
                    });


                    // restart the form if has a state of error/success
                    Array.prototype.forEach.call( restart, function( entry )
                    {
                        entry.addEventListener( 'click', function( e )
                        {
                            e.preventDefault();
                            form.classList.remove( 'is-error', 'is-success' );
                            input.click();
                        });
                    });

                    // Firefox focus bug fix for file input
                    input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
                    input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });

                });
            }( document, window, 0 ));

        </script>

        <script   type="module" src="{{ asset('js/galleryLayout.js') }}"></script>

    </body>
</html>
