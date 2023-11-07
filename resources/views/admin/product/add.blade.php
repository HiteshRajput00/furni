@extends('admin.structure.master_layout')
@section('content')
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
                                              
                                                    <option value="1"> simple</option>
                                                    <option value="2"> variable</option>
                                               
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
                                                <input type="text" class="form-control" placeholder="00x00"
                                                name="size[]" required>
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
            var selectElement2 = document.createElement("input");
            selectElement2.setAttribute("name", "size[]")
            selectElement2.setAttribute("class", "form-control")
            selectElement2.setAttribute("id", "select2")
            selectElement2.setAttribute("type", "text")
            selectElement2.setAttribute("placeholder", "size 00x00")
             var selectContainer = document.getElementById("display");
             selectContainer.appendChild(selectElement2);
         
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
            inputElement2.setAttribute("id", "stock");
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
            const stock = document.getElementById("stock");
            stock.remove();
         
            const delbtn = document.getElementById("delbtn");
            delbtn.remove();

        }
    </script>
@endsection
