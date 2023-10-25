<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>


    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('/admin/images/favicon.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ url('/admin/plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ url('/admin/plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ url('/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ url('/admin/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        @include('admin.structure.navbar')
        <!--**********************************
            Nav header end
        ***********************************-->
        <!--**********************************
            Header start
        ***********************************-->
        @include('admin.structure.header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.structure.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
        <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-10">
                        <div class="form-input-content">
                            <div class="card login-form mb-0">
                                <div class="card-body pt-5">
                                    <a class="text-center" href="/home">
                                        <h4>edit product</h4>
                                    </a>
                                    <form class="mt-5 mb-5 login-input" id="mainform" method="post"
                                        action="{{ route('update', ['id' => $data->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">

                                            <input type="text" class="form-control" placeholder="Name" name="product"
                                                value="{{ $data->product }}" required>
                                        </div>
                                        {{-- <div class="form-group">
                                            <input type="text" class="form-control"  placeholder="details" name="details" required>
                                        </div> --}}


                                        <br>
                                        <label for="furni">furniture type:</label>
                                        <select class="form-select" aria-label="Default select example" id="furni"
                                            name="category">
                                            <option value="{{ $category->id }}" selected> {{ $category->furnituretype }}
                                            </option>
                                            @foreach ($furnitures as $furniture)
                                                <option value="{{ $furniture->id }}">{{ $furniture->furnituretype }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <br>
                                        <label for="colour">type:</label>
                                        <select class="form-select" aria-label="Default select example" id="ptype"
                                            name="type">

                                            <option value="{{ $type->id }} " selected>{{ $type->type }}</option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        @foreach ($pid as $variation)
                                            <div id="loop">
                                                <div>
                                                    <h2>variation {{ $loop->iteration }} </h2>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <img src="{{ url('/upload/' . $variation->image) }}"
                                                        class="img-fluid product-thumbnail" height="500px"
                                                        width="500px">
                                                    <input type="file" class="form-control" placeholder="add"
                                                        name="image[]">
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <input type="number" class="form-control" placeholder="Price"
                                                        value="{{ $variation->price }}" name="price[]" required>
                                                </div>
                                                <label for="col">colour:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="col" name="colour[]">
                                                    {{-- @foreach ($colours as $colour) --}}
                                                    <option value="{{ $variation->colour->id }} " selected>
                                                        {{ $variation->colour->colour }}</option>
                                                    {{-- @endforeach --}}
                                                    @foreach ($posts as $post)
                                                        <option value="{{ $post->id }}">{{ $post->colour }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <label for="mat">material:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="mat" name="material[]">
                                                    <option value="{{ $variation->materialID }}" selected>
                                                        {{ $variation->material->type }} </option>
                                                    @foreach ($materialss as $materials)
                                                        <option value="{{ $materials->id }}">{{ $materials->type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                <label for="s">size:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="s" name="size[]">
                                                    <option value="{{ $variation->size->id }}" selected>
                                                        {{ $variation->size->size }} </option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}">{{ $size->size }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <br>

                                                <br>
                                                <br>
                                            </div>
                                            <a class="btn btn-primary"
                                                href={{ route('variation', ['vID' => $variation->id]) }}>edit</a>
                                            {{-- <a class="btn btn-primary"   href="{{route('variation',['id'=>$id->id])}}">edit</a> --}}

                                            <br><br>
                                        @endforeach
                                        <br><br>
                                        <div id="display"></div>
                                        <br>
                                        <button class="btn login-form__btn submit w-100" type="submit"
                                            name="up">update</button>
                                    </form>
                                    {{-- <p class="mt-5 login-form__footer">Have account <a href="/admin/login" class="text-primary">Sign Up </a> now</p> --}}
                                    {{-- </p> --}}
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
            <p>Copyright &copy; Designed & Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018
            </p>
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
    <script src="{{ url('/admin/plugins/common/common.min.js') }}"></script>
    <script src="{{ url('/admin/js/custom.min.js') }}"></script>
    <script src="{{ url('/admin/js/settings.js') }}"></script>
    <script src="{{ url('/admin/js/gleek.js') }}"></script>
    <script src="{{ url('/admin/js/styleSwitcher.js') }}"></script>
    <!-- Chartjs -->
    <script src="{{ url('/admin/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ url('/admin/plugins/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Datamap -->
    <script src="{{ url('/admin/plugins/d3v3/index.js') }}"></script>
    <script src="{{ url('/admin/plugins/topojson/topojson.min.js') }}"></script>
    <script src="{{ url('/admin/plugins/datamaps/datamaps.world.min.js') }}"></script>
    <!-- Morrisjs -->
    <script src="{{ url('/admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ url('/admin/plugins/morris/morris.min.js') }}"></script>
    <!-- Pignose Calender -->
    <script src="{{ url('/admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ url('/admin/plugins/pg-calendar/js/pignose.calendar.min.js') }}"></script>
    <!-- ChartistJS -->
    <script src="{{ url('/admin/plugins/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ url('/admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ url('/admin/js/dashboard/dashboard-1.js') }}"></script>
    <script>
        const selectOption = document.getElementById('ptype');
        const form = document.getElementById('mainform');
        const selectContainer = document.getElementById('display');
        selectOption.addEventListener('change', function createSelectElement() {
            const selectedValue = selectOption.value;
            if (selectedValue === '2') {
                const div = document.createElement('div');
                div.setAttribute("class", "form-group")
                const div1 = document.createElement('div');
                div1.setAttribute("class", "form-group")
                div1.setAttribute("id", "formgroup")
                var labelElement = document.createElement("label");
                labelElement.textContent = "product colour:";
                labelElement.setAttribute("for", "colour");
                labelElement.setAttribute("id", "colour");
                // var selectContainer = document.getElementById("display");
                var selectElement = document.createElement("select");
                selectElement.setAttribute("name", "colour[]")
                selectElement.setAttribute("class", "form-select")
                selectElement.setAttribute("id", "select")
                var option = document.createElement("option");
                option.text = "select colour";
                selectElement.appendChild(option);
                @foreach ($posts as $colour)
                    var option1 = document.createElement("option");
                    option1.value = "{{ $colour->id }}";
                    option1.text = "{{ $colour->colour }}";
                    selectElement.appendChild(option1);
                    var selectContainer = document.getElementById("display");
                    selectContainer.appendChild(labelElement);
                    selectContainer.appendChild(selectElement);
                @endforeach
                selectContainer.appendChild(div1);
                const div2 = document.createElement('div');
                div2.setAttribute("class", "form-group")
                var labelElement = document.createElement("label");
                labelElement.textContent = "product material:";
                labelElement.setAttribute("for", "material");
                labelElement.setAttribute("id", "material");
                var selectElement1 = document.createElement("select");
                selectElement1.setAttribute("id", "select1")
                selectElement1.setAttribute("name", "material[]")
                selectElement1.setAttribute("class", "form-select")
                var option = document.createElement("option");
                option.text = "select material";
                selectElement1.appendChild(option);
                @foreach ($materialss as $materials)
                    var option1 = document.createElement("option");
                    option1.value = "{{ $materials->id }}";
                    option1.text = "{{ $materials->type }}";
                    selectElement1.appendChild(option1);
                    var selectContainer = document.getElementById("display");
                    selectContainer.appendChild(labelElement);
                    selectContainer.appendChild(selectElement1);
                @endforeach
                selectContainer.appendChild(div2);
                const div3 = document.createElement('div');
                div3.setAttribute("class", "form-group")
                var labelElement = document.createElement("label");
                labelElement.textContent = "product size:";
                labelElement.setAttribute("for", "size");
                labelElement.setAttribute("id", "size");
                var selectElement2 = document.createElement("select");
                selectElement2.setAttribute("name", "size[]")
                selectElement2.setAttribute("class", "form-select")
                selectElement2.setAttribute("id", "select2")
                var option = document.createElement("option");
                option.text = "select size";
                selectElement2.appendChild(option);
                @foreach ($sizes as $size)
                    var option1 = document.createElement("option");
                    option1.value = "{{ $size->id }}";
                    option1.text = "{{ $size->size }}";
                    selectElement2.appendChild(option1);
                    var selectContainer = document.getElementById("display");
                    selectContainer.appendChild(labelElement);
                    selectContainer.appendChild(selectElement2);
                @endforeach
                selectContainer.appendChild(div3);
                const div4 = document.createElement('div');
                div4.setAttribute("class", "form-group")
                var labelElement = document.createElement("label");
                labelElement.textContent = "product catergory:";
                labelElement.setAttribute("for", "category");
                labelElement.setAttribute("id", "category");
                var selectElement3 = document.createElement("select");
                selectElement3.setAttribute("name", "category[]")
                selectElement3.setAttribute("class", "form-select")
                selectElement3.setAttribute("id", "select3")
                var option = document.createElement("option");
                option.text = "select furniture";
                selectElement3.appendChild(option);
                @foreach ($furnitures as $furniture)
                    var option1 = document.createElement("option");
                    option1.value = "{{ $furniture->id }}";
                    option1.text = "{{ $furniture->furnituretype }}";
                    selectElement3.appendChild(option1);
                    var selectContainer = document.getElementById("display");
                    selectContainer.appendChild(labelElement);
                    selectContainer.appendChild(selectElement3);
                @endforeach
                selectContainer.appendChild(div4);
                //create delete button
                var button = document.createElement("button");
                button.innerHTML = "Delete";
                button.setAttribute("id", "delbtn");
                button.setAttribute("class", "btn btn-primary");
                button.setAttribute("type", "button");
                button.setAttribute("onclick", "remove()");
                selectContainer.appendChild(button);

                selectContainer.appendChild(div);
            }

        });

        function remove() {
            // const selectContainer = document.getElementById('display');

            const select = document.getElementById("select");
            select.remove();
            const select1 = document.getElementById("select1");
            select1.remove();
            const select2 = document.getElementById("select2");
            select2.remove();
            const select3 = document.getElementById("select3");
            select3.remove();
            const delbtn = document.getElementById("delbtn");
            delbtn.remove();
            const label = document.getElementById("category");
            label.remove();
            const label1 = document.getElementById("colour");
            label1.remove();
            const label2 = document.getElementById("material");
            label2.remove();
            const label3 = document.getElementById("size");
            label3.remove();
        }
    </script>
</body>

</html>
