@extends('layouts.page')
@section('contact','active')
@section('white','text-white')
@section('link','Contact')
@section('head','Contact')
@section('content')
<!--Contact Section-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Contact Us</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="content">
                            <h4>Address</h4>
                            <p>University of Yangon, Inya Road.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="content">
                            <h4>Phone</h4>
                            <p class="contact"><a href="tel:09-43053573">+95943052573</a></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="content">
                            <h4>Email</h4>
                            <p class="contact"><a href="mailto:kosawlinoo@gmail.com">kosawlinoo@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                <form action="{{route('contact.store')}}" method="POST" id="myForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" value="{{old('name')}}">
                                <span class="text-danger error-text name_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 second-input">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{old('email')}}">
                                <span class="text-danger error-text email_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{old('phone')}}">
                                <span class="text-danger error-text phone_error"></span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 second-input">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Area of Interest" value="{{old('subject')}}">
                                <span class="text-danger error-text subject_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="message"></label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror">{{old('message')}}</textarea>
                                <span class="text-danger error-text message_error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        {!!NoCaptcha::renderJs()!!}
                        {!!NoCaptcha::display()!!}
                        <span class="text-danger error-text g-recaptcha-response_error"></span>
                    </div>
                    
                    <!-- Add a hidden input field to store scroll position -->
                    <input type="hidden" name="scroll_position" id="scrollPosition" value="">
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-6">
                            <button class="btn btn-outline-success" id="submitButton" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--End Contact Section-->

<!--Start Google Map Section-->
<section class="map mt-3">
    <div class="container">
        <div class="row">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15275.285911334855!2d96.1314048697577!3d16.835210187838303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c195e3ea10b2b9%3A0xf89f825c219fd948!2sCRI%2C%20UY!5e0!3m2!1sen!2smm!4v1703409861959!5m2!1sen!2smm" width="800" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
  </section>
  <!--End Google Map Section-->

@endsection
@section('scripts')
    <script>
        $(function(){
            $("#myForm").on('submit',function(e){
                e.preventDefault();

                $.ajax({
                    url:$(this).attr('action'),
                    method:$(this).attr('method'),
                    data:new FormData(this),
                    processData:false,
                    dataType:'json',
                    contentType:false,
                    beforeSend:function()
                    {
                        $(document).find('span.error-text').text('');
                    },
                    success:function(data){
                        console.log(data);
                        if(data.status == 0)
                        {
                            $.each(data.error,function(prefix,val){
                                $('span.'+prefix+'_error').text(val[0]);
                            });
                        }else{
                            $("#myForm")[0].reset();
                            window.location.reload();
                            alert(data.msg);
                            
                        }
                    }
                });
            });
            
        });
    </script>
@endsection
