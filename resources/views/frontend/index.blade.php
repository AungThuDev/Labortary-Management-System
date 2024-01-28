@extends('layouts.home')
@section('home','active')
@section('white','text-white')
@section('content')
<!--Start Advisor Section-->
<section class="about">
  <div class="container">
    <h2 class="about-heading">Beyond the Boundary</h2>
    <div class="container">
      <div class="para">
        <p>The Innovative Biophysics Lab at the University of Yangon, under the guidance of Dr. Saw Lin Oo, is dedicated to advancing scientific research with a primary focus on Cancer Cell Destruction Projects. These projects encompass various methodologies, including drug delivery, photothermal and photodynamic therapy, and magnetic nanoparticles induced combination therapy. The overarching objective of this initiative is to unravel the intricate mechanisms governing cancer cell behavior, developing innovative strategies to selectively target cancer markers, and ultimately destroy these malignant cells.</p>

 

<p>Dr. Saw Lin Oo, leveraging his expertise in biophysics, spearheads this pioneering effort with the aim of bridging the gap between physics and biology, uncovering novel insights into cancer biology. At the core of the Cancer Cell Destruction Project are biophysical techniques employed to comprehend the physical and chemical changes in cancer cells, as well as their cell death behaviors, crucial for detecting cancer markers. The lab utilizes advanced microscopy, spectroscopy, and computational modeling to unravel the biophysical intricacies of cancer progression. By meticulously unraveling the intricate physical principles governing the survival and proliferation of cancer cells, the lab is fervently dedicated to fostering groundbreaking advancements in targeted therapies. Through this tireless pursuit, the ultimate goal is to search the way for the early detection of cancer markers and give effective treatment techniques for patients.</p>

 

<p>The Biophysics Lab at the University of Yangon, under Dr. Saw Lin Oo's leadership, stands at the forefront of scientific innovation, committed to unraveling the complexities of cancer biology and translating these findings into tangible solutions for therapeutic outcomes.</p>

<p>In addition, the lab is exploring other promising research areas, such as the synthesis of energy materials, bone implantation, microbial desalination cells for water purification and electricity generation, hydrogen fuel cells, and the fabrication of thermoelectric devices.</p>

        
      </div>
    </div>
</section>
<!--End Advisor Section-->

<!--Start Advisor Section-->
<section class="advisor">
  <div class="container">
    <h2 class="advisor-heading">Advisors</h2>
    <div class="container">
      <div class="owl-carousel owl-theme">
        @forelse($advisors as $advisor)
          <div class="item">
          <div class="card img-card">
            <img src="{{asset('storage/advisorimages/'.$advisor->image)}}" class="card-img-top img-top" style="width:65%!important;" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="{{$advisor->link}}">{{$advisor->name}}</a></h5>
              <p class="card-text">{{$advisor->role}}</p>
              <p>Department of Physics</p>
              <p>University of Yangon</p>
              <a href="{{$advisor->link}}" class="btn btn-primary">Detail Link&nbsp;&nbsp;<i class="fas fa-arrow-right"></i></a>
            </div>
          </div>
          </div>
      
        @empty
        <div class="row">
          <div class="col-12">
            <h5 class="text-center">No Advisors data was found...</h5>
          </div>
        </div>
        @endforelse
      </div>
    </div>
</section>
<!--End Advisor Section-->

<!--Start Principle Section-->

<section class="principle">
  <h2>Principle</h2>
  @forelse($principles as $principle)
  <div class="container" style="background-color: #c2cad1;">
    <div class="row mt-5 p-3">
      <div class="col-sm-12 col-md-12 col-lg-4">
        <div class="d-flex justify-content-center">
          <img src="{{asset('storage/principleimages/'.$principle->image)}}" width="420" height="450" alt="">

        </div>

        <h3 class="text-center mt-4 mb-2">{{$principle->name}}</h3>
        <p class="text-center">{{$principle->position}}</p>

        <div class="border border-rounded border-info mt-5">
          <div class="p-4 text-center"><i class="fa-solid fa-phone me-2"></i>{{$principle->phone}}</div>
        </div>
        <div class="border border-rounded border-info mt-5">
          <div class="p-4 text-center">
            <a href="" style="text-decoration: none; color: black;"><i class="fa-solid fa-envelope me-2"></i>{{$principle->email}}</a>
          </div>
        </div>

      </div>
      <div class="col-sm-12 col-md-12 col-lg-8">
        <div class="row mb-4">
          <h4>About me</h4>

          <p class="mt-3" style="line-height: 1.8; word-spacing: 5px; text-align: justify;">{!!nl2br($principle->about)!!}</p>
        </div>
        <h4>Personal Information</h4>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h3 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Education
              </button>
            </h3>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                @foreach($principle->qualifications as $edu)
                <strong><i class="fas fa-user-graduate" style="color: #25aca3;font-size:18px;"></i>&nbsp;&nbsp;&nbsp;{{$edu->description}}</strong><br><hr>
                @endforeach
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                Research
              </button>
            </h3>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                @foreach($principle->experimentations as $ex)
                <strong><i class="fab fa-researchgate" style="color: #25aca3;font-size:18px;"></i>&nbsp;&nbsp;&nbsp;{{$ex->description}}</strong><br><hr>
                @endforeach
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                Adwards & Fellowships
              </button>
            </h3>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                @foreach($principle->awards as $awd)
                <strong><i class="fas fa-award" style="color: #25aca3;font-size:18px;"></i>&nbsp;&nbsp;&nbsp;{{$awd->description}}</strong><br><hr>
                @endforeach
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                Professional Association
              </button>
            </h3>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                @foreach($principle->associations as $asso)
                <strong>{{$asso->description}}</strong><br>
                @endforeach
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                Services
              </button>
            </h3>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                @foreach($principle->services as $ser)
                <strong>{{$ser->description}}</strong><br>
                @endforeach
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h3 class="accordion-header" id="headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                Invited Talks
              </button>
            </h3>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                @foreach($principle->talks as $talk)
                <strong>{{$talk->description}}</strong><br>
                @endforeach
              </div>
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>
  @empty
  <div class="row">
    <div class="col-12">
      <h5 class="text-center">No Advisors data was found...</h5>
    </div>
  </div>
  @endforelse
  <div class="mt-3" style="height: 30px;"></div>
</section>

<!--Start End Section-->
@endsection