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
    {{-- <link rel="stylesheet" href="{{url('/admin/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{url('/admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}"> --}}
    <!-- Custom Stylesheet -->
    <link href="{{ url('/admin/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
        @include('admin.structure.navbar')
        @include('admin.structure.header')
        @include('admin.structure.sidebar')
        <div class="login-form-bg h-100 ">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-11">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="/home">
                                    <h2>add product</h2>
                                </a>
                                <br><br>
                                <div>
                                    <h2> </h2>
                                    <br><br>
                                </div>
                                <!--form 1 start-->
                                <div>
                                    <form id="mainform" method="post" action="/save" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name" name="product"
                                                value="{{ old('product') }}" required>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="material" id="">product category:</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="type" name="category">
                                                <option value="" selected> select category</option>
                                                @foreach ($furnitures as $furniture)
                                                    <option value="{{ $furniture->id }}">
                                                        {{ $furniture->furnituretype }}</option>
                                                @endforeach
                                                @error('category')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </select>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="material" id="">product type:</label>
                                            <select class="form-select" aria-label="Default select example"
                                                id="ptype" name="type">

                                                <option selected> select type</option>
                                                @foreach ($types as $type)
                                                    <option value="{{ $type->id }}"> {{ $type->type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--simple div start-->
                                        <div id="form1" class="hidden">
                                            <br><br>
                                            <div class="form-group">
                                                <input type="file" class="form-control" placeholder="select image"
                                                    name="image[]" required>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Price"
                                                    name="price[]" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="material" id="">product colour:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="type" name="colour[]">
                                                    <option value="" selected> select colour</option>
                                                    @foreach ($colours as $colour)
                                                        <option value="{{ $colour->id }}"> {{ $colour->colour }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('colour')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="material" id="">product material:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="type" name="material[]">

                                                    <option value="" selected> select type</option>
                                                    @foreach ($materials as $material)
                                                        <option value="{{ $material->id }}"> {{ $material->type }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('material')
                                                    <div class="text text-danger"> {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="material" id="">product size:</label>
                                                <select class="form-select" aria-label="Default select example"
                                                    id="type" name="size[]">
                                                    <option value="" selected> select size</option>
                                                    @foreach ($sizes as $size)
                                                        <option value="{{ $size->id }}"> {{ $size->size }}
                                                        </option>
                                                    @endforeach
                                                    @error('size')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="enter stock"
                                                    name="stock[]" required>
                                            </div>
                                            <br><br>
                                            <div id="display"></div>
                                        </div>
                                </div>
                                <div class="hidden" id="hiddenbtn">
                                    <button class="btn btn-primary" type="button" id="addSelectButton">Add
                                        variation</button>
                                </div>
                                <!--simple div end-->
                            </div>
                            <br><button class="btn login-form__btn submit w-100" type="submit"
                                name="save">add</button>
                            </form><br>
                            {{-- <a class="btn btn-light" href="/index">back</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <div class="copyright">
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
        const btn = document.getElementById('sizebtn');

        const hiddenDiv = document.getElementById('form1');
        const form2 = document.getElementById('form2');
        const hiddenbtn = document.getElementById('hiddenbtn');
        selectOption.addEventListener('change', function() {
            const selectedValue = selectOption.value;
            if (selectedValue === '1') {
                form1.style.display = 'block';
                hiddenbtn.style.display = 'none';

            } else {
                form1.style.display = 'block';
                hiddenbtn.style.display = 'block';
            }
        });
    </script>
    <script>
        const form = document.getElementById('mainform');
        const selectContainer = document.getElementById('display');
        const addButton = document.getElementById('addSelectButton');
        addButton.addEventListener('click', createSelectElement);
        //function 
        function createSelectElement() {
            const maindiv = document.createElement("div");
            maindiv.setAttribute("class", "form-group")
            maindiv.setAttribute("id", "div")
            //image tag
            const imgdiv = document.createElement("div");
            imgdiv.setAttribute("class", "form-group")
            imgdiv.setAttribute("id", "imgdiv")
            var inputElement1 = document.createElement("input");
            inputElement1.setAttribute("type", "file")
            inputElement1.setAttribute("class", "form-control")
            inputElement1.setAttribute("placeholder", "select image")
            inputElement1.setAttribute("name", "image[]");
            inputElement1.setAttribute("id", "image");
            var selectContainer = document.getElementById("display");
            selectContainer.appendChild(inputElement1);
            selectContainer.appendChild(imgdiv);
            //input tag
            const inputdiv = document.createElement("div");
            inputdiv.setAttribute("class", "form-group")
            inputdiv.setAttribute("id", "pdiv")
            var inputElement = document.createElement("input");
            inputElement.setAttribute("type", "text")
            inputElement.setAttribute("class", "form-control")
            inputElement.setAttribute("placeholder", "price")
            inputElement.setAttribute("name", "price[]");
            inputElement.setAttribute("id", "price");
            var selectContainer = document.getElementById("display");
            selectContainer.appendChild(inputElement);
            selectContainer.appendChild(inputdiv);
            //first tag 
            const div1 = document.createElement('div');
            div1.setAttribute("class", "form-group")
            div1.setAttribute("id", "formgroup")
            var labelElement = document.createElement("label");
            labelElement.textContent = "product colour:";
            labelElement.setAttribute("for", "colour");
            labelElement.setAttribute("id", "label1");
            var selectElement = document.createElement("select");
            selectElement.setAttribute("name", "colour[]")
            selectElement.setAttribute("class", "form-select")
            selectElement.setAttribute("id", "select")
            var option = document.createElement("option");
            option.text = "select colour";
            selectElement.appendChild(option);
            @foreach ($colours as $colour)
                var option1 = document.createElement("option");
                option1.value = "{{ $colour->id }}";
                option1.text = "{{ $colour->colour }}";
                selectElement.appendChild(option1);
                var selectContainer = document.getElementById("display");
                selectContainer.appendChild(labelElement);
                selectContainer.appendChild(selectElement);
            @endforeach
            selectContainer.appendChild(div1);
            //second tag
            const div2 = document.createElement('div');
            div2.setAttribute("class", "form-group")
            var labelElement = document.createElement("label");
            labelElement.textContent = "product material:";
            labelElement.setAttribute("for", "material");
            labelElement.setAttribute("id", "label2");
            var selectElement1 = document.createElement("select");
            selectElement1.setAttribute("id", "select1")
            selectElement1.setAttribute("name", "material[]")
            selectElement1.setAttribute("class", "form-select")
            var option = document.createElement("option");
            option.text = "select material";
            selectElement1.appendChild(option);
            @foreach ($materials as $material)
                var option1 = document.createElement("option");
                option1.value = "{{ $material->id }}";
                option1.text = "{{ $material->type }}";
                selectElement1.appendChild(option1);
                var selectContainer = document.getElementById("display");
                selectContainer.appendChild(labelElement);
                selectContainer.appendChild(selectElement1);
            @endforeach
            selectContainer.appendChild(div2);
            //third tag
            const div3 = document.createElement('div');
            div3.setAttribute("class", "form-group")
            var labelElement = document.createElement("label");
            labelElement.textContent = "product size:";
            labelElement.setAttribute("for", "size");
            labelElement.setAttribute("id", "label3");
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
            //stock field
            const sdiv = document.createElement('div');
            sdiv.setAttribute("class", "form-group")
            sdiv.setAttribute("id", "sdiv")
            var inputElement2 = document.createElement("input");
            inputElement2.setAttribute("type", "text")
            inputElement2.setAttribute("class", "form-control")
            inputElement2.setAttribute("placeholder", "Enter stock")
            inputElement2.setAttribute("name", "stock[]");
            inputElement2.setAttribute("id", "input2");
            var selectContainer = document.getElementById("display");
            selectContainer.appendChild(inputElement2);
            selectContainer.appendChild(sdiv);
            //create delete button
            var button = document.createElement("button");
            button.innerHTML = "Delete";
            button.setAttribute("id", "delbtn");
            button.setAttribute("class", "btn btn-primary");
            button.setAttribute("type", "button");
            button.setAttribute("onclick", "remove()");
            selectContainer.appendChild(button);
            selectContainer.appendChild(maindiv);
        }
        // button.addEventListener('click', remove);     
        function remove() {
            // const selectContainer = document.getElementById('display');
            const img = document.getElementById("image");
            img.remove();
            const input = document.getElementById("price");
            input.remove();
            const select = document.getElementById("select");
            select.remove();
            const select1 = document.getElementById("select1");
            select1.remove();
            const select2 = document.getElementById("select2");
            select2.remove();
            const label1 = document.getElementById("label1");
            label1.remove();
            const label2 = document.getElementById("label2");
            label2.remove();
            const label3 = document.getElementById("label3");
            label3.remove();
            const div = document.getElementById("input2");
            div.remove();
            //    const input=document.getElementById("input1");
            //    input.remove();
            //    const div=document.getElementById("sdiv");
            //    div.remove();
            const delbtn = document.getElementById("delbtn");
            delbtn.remove();

        }
    </script>
</body>

</html>
