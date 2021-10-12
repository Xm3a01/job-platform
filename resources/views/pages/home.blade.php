@extends('layouts.defult')
@section('content')


<div style="height: 30px;"></div>


  <div class="site-blocks-cover overlay" style="background-image: url('{{asset('asset/images/hero_1.jpg')}}');" data-aos="fade"
  data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12" data-aos="fade">
        <div class="pb-5">
          <h1 class="h3 text-center"> {{__('YOUR DREAMS JOB HERE')}} </h1>
          <h3 class=" text-center"> {{__('Start your career .. Find jobs, employees, and jobs Opportunities')}} </h3>
        </div>
        <form action="{{route('search.job')}}" id="app" method = "get" autocomplete="off">
          <div class="row mb-3">
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-6 mb-1">
                  <div class="input-wrap">
                    <span class="icon icon-keyboard"></span>
                    <input v-model="special" name ="special" list="special" type="text" class="form-control border-0 px-3" placeholder=" {{__('Job Title')}} " autocomplete = "off">
                    <datalist id="special">
                      @foreach ($sub_specials as $sub)
                         <option  value="{{ (app()->getLocale() == 'en') ? $sub->name : $sub->ar_name}}">
                        @endforeach
                     </datalist>
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0">
                  <div class="input-wrap">
                    <span class="icon icon-room"></span>
                    <input  v-model = "country" name = "country" list="country" type="text" class="form-control border-0 px-3"  placeholder="{{__('City or Country')}}" autocomplete = "off">
                      <datalist id="country">
                        @foreach ($countries as $county)
                           <option value="{{ (app()->getLocale() == 'ar') ? $county->ar_name : $county->name}}">
                        @endforeach
                        @foreach ($cities as $city)
                           <option value="{{(app()->getLocale() == 'ar') ? $city->ar_name : $city->name}}">
                        @endforeach
                  </datalist>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <input type="submit" class="btn btn-search btn-primary btn-block" value="{{__('Search Job')}} " href="jobsearch.html">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="search-category">
                {{-- <p><b> {{__('Top Categories')}} </b> <a href="javascript:void(0);">#تصميم داخلي</a> <a href="javascript:void(0);">#تقانة المعلومات</a> <a href="javascript:void(0);">#رعاية صحية</a> --}}
                </p>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="scroll-to align-content-center">
    <a href="#scroll-here" title=""><img src=" {{asset('asset/images/down-arrow (1).png')}} " alt=""></a>
  </div>
</div>

   {{-- categories --}}
  <div class="site-section">
        <div class="container p-0">
          <div class="row m-0" style="width: 100%">
            <div class="col-md-12 text-left mb-5 px-3 section-heading">
              <h3 class="my-4">{{__('Popular Categories')}}  </h3>
              <div class="row">

                @foreach ($roles as $role)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                  <a href="{{ route('search.role', $role->id) }}" class="h-100 feature-item">
                    <span class="d-block icon flaticon-calculator mb-1 text-primary"></span>
                    <h2>{{app()->getLocale() == 'ar' ? $role->ar_name : $role->name}}</h2>
                    <span class="counting"> <p> {{App\Job::where('role_id' , $role->id)->where('selected',0)->count()}}</p></span>
                  </a>
                </div>
                @endforeach

              </div>
              <div class="text-center pt-3" data-aos="fade-up" data-aos-delay="50"><a class="btn"
                  href="{{route('category.index')}}">   {{__('More Categories')}}    </a>
              </div>
            </div>
          </div>
        </div>
      </div>



  {{-- new jops --}}
  <div class="site-section bg-light" id="scroll-here">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
          <h3 class="mb-4 new-job"> {{__('New Jobs')}}  </h3>
          <div class="rounded jobs-wrap">
           @foreach ($jobs as $job)
              @if($job->selected == 0)
              <a href="{{route('single.job' ,[app()->getLocale() , $job->id])}}" class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                     <div class="company-logo blank-logo text-center text-md-left pl-3">
                       <img src="{{ asset(Storage::url($job->owner->logo))}}" alt="Image" class="img-fluid mx-auto p-1">
                     </div>
                     <div class="job-details h-100">
                       <div class="p-3 align-self-center">
                        <h3>{{(app()->getLocale() == 'ar') ? $job->special->ar_name : $job->special->name}} - {{(app()->getLocale() == 'ar') ? $job->sub_special->ar_name ?? '' : $job->sub_special->name ?? ''}} </h3>
                        <div class="d-block d-lg-flex">
                         <p class="m-1">{{$job->yearsOfExper}}</p>
                          <span class="mr-2"> {{date('F d, Y', strtotime($job->created_at))}} </span>
                            </div>
                         <div class="d-block d-lg-flex">
                           <div ><span class="icon-suitcase"></span> <span class="mr-2"> {{(app()->getLocale() == 'ar') ? $job->owner->company_name : $job->owner->company_name_en}} </span></div>
                           <div class="mr-3" ><span class="icon-money mr-1"> {{$job->selary}} </span></div>
                         </div>
                         </div>
                     </div>
                     <div class="job-category align-self-center">
                       <div class="p-3">
                         <span class="text-info p-2 rounded border border-info">{{(app()->getLocale() == 'ar') ? $job->ar_status : $job->status}}</span>
                       </div>
                     </div>
                   </a>
                   @endif
                @endforeach

         </div>
         @if($jobs != null)
         <div class="col-md-12 text-center p-4" data-aos="fade-up" data-aos-delay="50">
            <a href="{{route('all.job')}}" class="btn rounded p-2 mb-1">  {{__('More Jobs')}}  </a>
          </div>
          @endif
        </div>


      <div class="col-lg-4 col-md-12 col-sm-12 block-16" data-aos="fade-up" data-aos-delay="200">
    <div class="ad d-flex">
      <h2 class="h3"> {{__('Ad space')}} </h2>
      </div>
     <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner pb-5">
       @foreach($advs as $key => $adv)
          <div class="carousel-item  {{$key == 0 ? 'active' : ''}}">
            <div class="p-0 section-heading overflow-auto">
               <div class=" m-3">
                  <div class="card p-3 text-center scrolling adspace">
                      <div class="card-head h4  py-3">
                        {{app()->getLocale() == 'ar' ? $adv->ar_title : $adv->title}}
                            </div>
                            <div class="card-content is-stretched t-inverse">
                                <h6 class="t-inverse m20y">{{app()->getLocale() == 'ar' ? $adv->ar_adv : $adv->adv}}</h6>
                              <form name="process_cart5117" id="checkout-form5117"   class="py-3" autocomplete="off">
                                <a class="btn btn-primary text-white" href="{{route('web.contact' , app()->getLocale())}}">   {{__('Contact with Us')}}</a>
                            </form>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
               @endforeach
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>




  <!-- advertise -->
  <section class="py-5">
      <div class="container">
        <div class="row justify-content-center">
        <div id="carouselExampleControls" class="carousel slide col-md-7 col-lg-7 col-sm-12 " data-ride="carousel">
         <div class="mb-5 text-center wow fadeInDown" data-wow-delay="1s">
          <h3 class="h4"> {{__('The latest offers and news')}}  </h3>
         </div>
        <ol class="carousel-indicators">
          @foreach($news as $key => $new)
             <li data-target="#carouselExampleControls" data-slide-to="{{$key}}" class="{{$key == 0 ? 'active' : ''}}"></li>
          @endforeach
        </ol>

        <div class="carousel-inner">
        @foreach($news as $key => $new)
          <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
            <img class="d-block" width="100%" height="400px" src="{{Storage::url($new->photo)}}" alt="First slide">
            <div class="carousel-caption  d-md-block">
                  <h5 class="h6">{{app()->getLocale() == 'ar' ? $new->ar_contant : $new->contant}}</h5>
              </div>
          </div>
         @endforeach
        </div>
      </div>
    </div>
    </div>
    </section>





{{-- why choose us --}}
<div class="site-section site-block-feature bg-light pb-5">
    <div class="container">

      <div class="text-center mb-4 section-heading">
        <h2> {{__('Why choose Us?')}} </h2>
      </div>

      <div class="d-block d-md-flex">
        <div class="text-center px-4 item " data-aos="fade">
          <span class="flaticon-worker display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">{{__('More Jobs Every Day')}}</h2>
          <p> {{__('Jobs from multiple countries in one place, now offers thousands of jobs in all fields in many countries with ease')}} </p>
           </div>
        <div class="text-center px-4 item" data-aos="fade">
          <span class="flaticon-wrench display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">{{__('Creative Jobs')}}</h2>
          <p> {{__('Find and apply today for the latest Creative jobs like Graphic Designer, Product Designer, Artworker and more')}} </p>
           </div>
      </div>
      <div class="d-block d-md-flex">
        <div class="text-center px-4 item" data-aos="fade">
          <span class="flaticon-stethoscope display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">{{__('Healthcare')}}</h2>
         <p> {{__('A strong representative in the fields of medicine and healthcare where an interactive environment is provided in Sudan and throughout the Middle East')}} </p>
           </div>
        <div class="text-center px-4 item" data-aos="fade">
          <span class="flaticon-calculator display-3 mb-3 d-block text-primary"></span>
          <h2 class="h5">{{__('Finance & Accounting')}}</h2>
          <p> {{__('Job opportunities in the field of accounting and finance with the best companies that are characterized by providing services and high quality accounting')}} </p>
            </div>
      </div>
    </div>
  </div>


  {{-- dream job --}}
<div class="site-blocks-cover overlay inner-page" style="background-image: url('{{asset('asset/images/hero_1.jpg')}}');"
  data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-7 text-center" data-aos="fade">
        <h2 class="h3 mb-0 text-white"> {{__('THE BEST WAY TO GET YOUR NEW JOB')}}</h2>
        <p class="h3 text-white mb-5">{{__('Dont miss the chance')}}</p>
        <p><a href="{{route('all.job' , app()->getLocale())}}" class="btn btn-info p-3">{{__('Find Job')}}</a></p>

      </div>
    </div>
  </div>
</div>




  <!-- our clients -->
  <div class="site-slide pb-5" style="direction:ltr; html:ltr;">
    <div class="container">
      <div class="text-center">
        <h3 class="pt-5 pb-1">{{__('Our Partners in Success')}}</h3>
        <p class="pb-3">{{__('Clients are happy to serve them')}}</p>
      </div>
      <div class="carousel-wrap">
        <div class="owl-carousel">
          @foreach($partner as $p)
          <div class="item"><img src="{{asset(Storage::url($p->partner_logo))}}" style = " height:110px ; width: 75%; "></div>
           @endforeach
        </div>
      </div>
    </div>
  </div>






@endsection

@section('scripts')
<script src ="{{asset('js/app.js')}}"></script>
<script>
  const app = new Vue({
    el: '#app',

    data: {

        country: '',
        special: ''
    }
  });
</script>
@endsection
