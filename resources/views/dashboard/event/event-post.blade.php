@extends('layouts.app')

@section('breadcrumb')
<li class="breadcrumb-item">HOME</li>
<li class="breadcrumb-item">EVENT</li>
<li class="breadcrumb-item active">DETAIL</li>

@endsection

@section('content')

            <h2 class="text-dark m-0 mb-3"> POST EVENT</h2>
            @include('layouts.header-event')
            <div class="card border-0 bg-white shadow-sm">
                <div class="card-body p-5">
                    <h3 class="mb-5">Tell The World About Your Event</h3>
                    <div class="form">
                        <div class="form-group">
                            <label for="">What is your event name? <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Describe your event? <span class="text-danger">*</span></label>
                            <div id="detail" name="detail" style="min-height:200px"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="mb-1">Select a category for your event <span class="text-danger">*</span></label>
                                    <small class="form-text text-muted mt-0 mb-3">
                                        This will help others find your event 
                                    </small>
                                    <select name="event_category_id" id="event_category_id" class="form-control">
                                        <option value="">Uncategorized</option>
                                        @forelse ($event_category as $item)
                                            <option value="{{  $item->id  }}" >{{  $item->name  }}</option>
                                        @empty
                                        <option value="">-</option>
                                        @endforelse

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="mb-1">Select who can see your event <span class="text-danger">*</span></label>
                                    <small class="form-text text-muted mt-0 mb-3">
                                        Anyone can see and search for public events.
                                    </small>
                                    <div class="btn-group btn-group-toggle d-flex" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary" id="public">
                                          <input type="radio" name="privacy" id="privacy_0" value="0"> Public
                                        </label>
                                        <label class="btn btn-outline-secondary" id="unlisted">
                                          <input type="radio" name="privacy" id="privacy_1" value="1" > Unlisted
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center text-md-right mt-5">
                <a href="{{ route('event.event_post_when_where') }}" onclick="return theFunction();" class="btn bg-accent text-white py-3 px-4 shadow-lg">Continue to When & Where <i class="fa fa-angle-right ml-3"></i></a>
            </div>
                   
            <!-- </form>{{ route('event.event_post_when_where') }} -->
@endsection
@section('customjs')
    <script>
     $('#menuEvent').addClass('active');
     $('#basic').addClass('active');
    
     $('#count_user_badges').removeClass('badge-secondary').addClass('badge-primary');
    </script>
    
    <!-- QUILL EDITOR -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['image'],
            ['clean']         
        ];

        var quill = new Quill('#detail', {
            theme: 'snow',
            modules: {
                toolbar: toolbarOptions
            }
        });
        var name=getCookie("name");
        var detail=getCookie("detail");
        var event_category_id=getCookie("event_category_id");
        var privacy=getCookie("privacy");

        

        // console.log(privacy);
        if(name != ""){
            $('#name').val(name)
        }
        if(detail != ""){
            // $('#detail').val(detail)
            quill.root.innerHTML = detail
        }
        if(event_category_id != ""){
            $('#event_category_id').val(event_category_id)
            
        }
        if(privacy != ""){
            if(privacy == 1){
                $('#unlisted').addClass('active');
                document.getElementById("privacy_1").checked = true;

            } 
            if (privacy == 0){
                $('#public').addClass('active');
                document.getElementById("privacy_0").checked = true;

            }
            
        }
       
        // console.log('sd', detail)

        
        function theFunction () {

            var quill = new Quill('#detail', {
                    theme: 'snow'
                });
                // return true or false, depending on whether you want to allow the `href` property to follow through or not
            // console.log($('#name_event').val());

            var editor_content = quill.root.innerHTML
            console.log($('input[name="privacy"]:checked').val());

            var name_val = $('#name').val()
            var detail_val = editor_content
            var event_category_id_val = $('#event_category_id').val()
            var privacy_val = $('input[name="privacy"]:checked').val()
     

            setCookie("name", name_val, 3);
            setCookie("detail", detail_val, 3);
            setCookie("event_category_id", event_category_id_val, 3);
            setCookie("privacy", privacy_val, 3);


            // $('#payment_method').val()
            }

        function setCookie(cname,cvalue,exdays) {
                var d = new Date();
                d.setTime(d.getTime() + (exdays*24*60*60*1000));
                var expires = "expires=" + d.toGMTString();
                document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
                }
        function getCookie(cname) {
                var name = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for(var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                    }
                }
                return "";
                }
        
    </script>
@endsection