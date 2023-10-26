@extends('admin.structure.master_layout')
@section('content')
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
                                                     <option value="{{ $variation->colour->id }} " selected>
                                                        {{ $variation->colour->colour }}</option>
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
                                              <input type="text" name="size[]" class="form-control" id="s" value="{{ $variation->size }}" >
                                                <br>

                                                <br>
                                                <br>
                                            </div>
                                            <a class="btn btn-primary"
                                                href={{ route('variation', ['vID' => $variation->id]) }}>edit</a>
                                            <br><br>
                                        @endforeach
                                        <br><br>
                                        <div id="display"></div>
                                        <br>
                                        <button class="btn login-form__btn submit w-100" type="submit"
                                            name="up">update</button>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
                //third div
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
@endsection
