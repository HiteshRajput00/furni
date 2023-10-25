<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('/admin/images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{url('/admin/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{url('/admin/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{url('/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{url('/admin/css/style.css')}}" rel="stylesheet">

</head>

<body>

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-10">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                
                                    <a class="text-center" href="/home"> <h4>edit product</h4></a>
        
                                <form class="mt-5 mb-5 login-input" id="mainform" method="post" action="{{ route('savevar', ['id' => $data->id]) }}" enctype="multipart/form-data" >
                                    @csrf

                                    <br>
                                    <div id="loop">
                                        <div class="form-group">
                                            <img src="{{url('/upload/'.$data->image)}}" class="img-fluid product-thumbnail" height="500px" width="500px"> 
                                            <input type="file" class="form-control" placeholder="add" name="image"  required>
                                        </div>
                                        <br> <div class="form-group">

                                            <input type="text" class="form-control" placeholder="price" name="price" value="{{$data->price}}"  required>
                                        </div>
                                    
                                    <label for="col">colour:</label>
                                    <select class="form-select" aria-label="Default select example" id="col" name="colour">

                                        <option value="{{$data->colourID}} " selected>{{$data->colour->colour}}</option>
                                        @foreach ($posts as $post)
                                       
                                         <option value="{{$post->id}}">{{$post->colour}}</option>
                                         @endforeach
                                        </select>
                                        <br>
                                <label for="mat">material:</label>
                                 <select class="form-select" aria-label="Default select example" id="mat" name="material">
                                    <option value="{{$data->materialID}}" selected>{{$data->material->type}} </option>   
                                    @foreach ($materialss as $materials)
                                         
                                         <option value="{{$materials->id}}">{{$materials->type}}</option>
                                         @endforeach
                                        </select>
                                        <br>
                                        <label for="s">size:</label>
                                          <select class="form-select" aria-label="Default select example" id="s" name="size">
                                            <option value="{{$data->sizeID}}" selected>{{$data->size->size}} </option>
                                           @foreach ($sizes as $size)
                                           <option value="{{$size->id}}">{{$size->size}}</option>
                                         
                                           @endforeach
                                        </select>
                                        <br>
                                      
                                      <br>
                                    </div>
                                  

                                    <br><br>
                                   
                                    <br><br>
                                      <div id="display"></div>
                                      <br>
                                    <button class="btn login-form__btn submit w-100" type="submit" name="up" >save</button>
                                </form>
                                     <a href="{{route('edit',['id'=>$data->productID])}}" class="btn btn-pimary">back </a> 
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="copyright">
            <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>
        </div>
    </div>
    <!--**********************************
        Footer end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="{{url('/admin/plugins/common/common.min.js')}}"></script>
<script src="{{url('/admin/js/custom.min.js')}}"></script>
<script src="{{url('/admin/js/settings.js')}}"></script>
<script src="{{url('/admin/js/gleek.js')}}"></script>
<script src="{{url('/admin/js/styleSwitcher.js')}}"></script>

<!-- Chartjs -->
<script src="{{url('/admin/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Circle progress -->
<script src="{{url('/admin/plugins/circle-progress/circle-progress.min.js')}}"></script>
<!-- Datamap -->
<script src="{{url('/admin/plugins/d3v3/index.js')}}"></script>
<script src="{{url('/admin/plugins/topojson/topojson.min.js')}}"></script>
<script src="{{url('/admin/plugins/datamaps/datamaps.world.min.js')}}"></script>
<!-- Morrisjs -->
<script src="{{url('/admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{url('/admin/plugins/morris/morris.min.js')}}"></script>
<!-- Pignose Calender -->
<script src="{{url('/admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{url('/admin/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
<!-- ChartistJS -->
<script src="{{url('/admin/plugins/chartist/js/chartist.min.js')}}"></script>
<script src="{{url('/admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>



<script src="{{url('/admin/js/dashboard/dashboard-1.js')}}"></script>

</body>
</html>
