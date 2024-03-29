@extends('admin::dashboard.metronic')
@section('content')


<div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1> المراجع
            </h1>
        </div>
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{route('admin.dashboard')}}">الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <span class="active">المراجع </span>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
<div class="col-md-12 ">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="portlet light bordered">
            <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-social-dribbble font-green hide"></i>
                        <span class="caption-subject font-dark bold uppercase">اضافة مرجع جديد</span>
                    </div>
                 </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="POST" action="{{route('cv.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <input type="hidden" name="select" value="ref">
                <br><h4 class="text-left m-3">المرجع</h4><br>

                           <div class="form-group">
                            <label class="col-md-2 control-label">الاسم بالعربيه</label>
                            <div class="col-md-4">
                            <input type ="text" id="inputState" class="form-control" name="ar_name">
                           </div>


                           <label class="col-md-1 control-label">الاسم بالانجليزيه</label>
                             <div class="col-md-4">
                              <input type ="text" id="inputState" class="form-control" name="name">
                             </div>
                            </div>

                          <div class ="form-group">
                          <label class="col-md-2 control-label">التلفون </label>
                             <div class="col-md-4">
                            <input type ="text" id="inputState" class="form-control" name="phone" >
                            </div>


                            <label class="col-md-1 control-label">البريد</label>
                            <div class="col-md-4">
                            <input type = "email" name="email" id="inputState" class="form-control"  autocomplete="off">
                            </div>

                             </div>



                                <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-4 col-md-9">
                            <button type="submit" class="btn green">حفظ</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>



@endsection
