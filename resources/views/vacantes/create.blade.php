@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.css"
        integrity="sha512-iWJx03fFJWrXXXI6ctpoVaLkB6a4yf9EHNURLEEsLxGyup43eF6LrD3FSPdt1FKnGSE8Zp7JZYEDbATHf1Yx8Q=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css"
        integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA=="
        crossorigin="anonymous" />
@endsection
@section('navegacion')
    @include('ui.navadministracion')

@endsection

@section('content')
    <h1 class="text-2xl text-center mt-10">Nueva Vacante</h1>

    <form action="{{ route('vacantes.store') }}" class="max-w-lg mx-auto my-10" method="POST">
        @csrf
        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo </label>
            <input id="titulo" type="text"
                class="p-3 bg-gray-100 rounded form-input w-full @error('titulo') is-invalid @enderror" name="titulo"
                value="{{ old('titulo') }}" autocomplete="titulo" autofocus placeholder="Tiutlo de la Vacante">

            @error('titulo')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">Categoria </label>
            <select id="categoria"
                class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
                name="categoria">
                <option disabled selected>Seleciona una Categoria</option>
                @foreach ($categorias as $categoria)
                    <option {{ old('categoria') == $categoria->id ? 'selected' : '' }} value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}</option>
                @endforeach

            </select>
            @error('categoria')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


        </div>
        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">Experiencia </label>
            <select id="experiencia"
                class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
                name="experiencia">
                <option disabled selected>Experiencia Solicitada</option>
                @foreach ($experiencias as $experiencia)


                    <option {{ old('experiencia') == $experiencia->id ? 'selected' : '' }} value="{{ $experiencia->id }}">
                        {{ $experiencia->nombre }}</option>
                @endforeach

            </select>
            @error('experiencia')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


        </div>
        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">Ubicacion </label>
            <select id="ubicacion"
                class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
                name="ubicacion">
                <option disabled selected>Ubicacion</option>
                @foreach ($ubicaciones as $ubicacion)

                    <option {{ old('ubicacion') == $ubicacion->id ? 'selected' : '' }} value="{{ $ubicacion->id }}">
                        {{ $ubicacion->nombre }}</option>
                @endforeach
               
            </select>
            @error('ubicacion')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


        </div>
        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">Salario </label>
            <select id="salario"
                class="block appearance-none w-full border border-gray-200 text-gray-700 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 p-3 bg-gray-100 w-full"
                name="salario">
                <option disabled selected>Salario</option>
                @foreach ($salarios as $salario)

                    <option {{ old('salario') == $categoria->id ? 'selected' : '' }} value="{{ $salario->id }}">
                        {{ $salario->nombre }}</option>
                @endforeach
               
            </select>
            @error('salario')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Imagen del puesto </label>
            <div class="dropzone  rounded bg-gray-100" id="dropzoneDevJobs"></div>
            <p id="error"></p>
        </div>
    <input type="hidden" name="imagen" id="imagen" value="{{old('imagen')}}">
        @error('imagen')
        <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">Descripcion del puesto </label>
            <div class="descripcion editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{old('descripcion')}}">
            @error('descripcion')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-5">
            <label for="habilidades" class="mb-5 block text-gray-700 text-sm mb-2">Habilidades y conocimientos  <span>(Elige almenos tres)</span></label>
            @php
            $skills = ['HTML5', 'CSS3', 'CSSGrid', 'Flexbox', 'JavaScript', 'jQuery', 'Node', 'Angular', 'VueJS', 'ReactJS',
            'React Hooks', 'Redux', 'Apollo', 'GraphQL', 'TypeScript', 'PHP', 'Laravel', 'Symfony', 'Python', 'Django',
            'ORM', 'Sequelize', 'Mongoose', 'SQL', 'MVC', 'SASS', 'WordPress', 'Express', 'Deno', 'React Native', 'Flutter',
            'MobX', 'C#', 'Ruby on Rails']
            @endphp
            <lista-skills :oldskills="{{ json_encode(old('skills')) }}" :skills="{{ json_encode($skills) }}"
             ></lista-skills>
            @error('skills')
            <span class="bg-red-100 border-l-4 border-red-500 text-red-700 w-full mt-5 text-sm" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <button type="submit"
            class="bg-teal-500 w-full hover:bg-teal-700 text-gray-100 p-3 focus:outline-none focus:shadow-outline uppercase font-bold">
            Publicar Vacante
        </button>
    </form>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js"
        integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"
        integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg=="
        crossorigin="anonymous"></script>
    <script>
        Dropzone.autoDiscover = false;
        document.addEventListener('DOMContentLoaded', () => {
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'achor', 'justifyLeft',
                        'justifyCenter', 'justifyRight', 'justifyFull', 'orderedList', 'unorderedList',
                        'h2', 'h3'
                    ],
                    static: true,
                    stiky: true
                },
                placeholder: {
                    text: 'Informacion de la vacante'
                }
            });
            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })
            editor.setContent(document.querySelector('#descripcion').value)
            //Dropzone
            const dropzoneDevJobs = new Dropzone('#dropzoneDevJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Sube aqui tu archivo',
                acceptedFiles: ".png,.jpg,.gif,.bmp",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token').content
                },
                init: function () {
                    if(document.querySelector('#imagen').value.trim()){
                        let imagenPublicada ={};
                        imagenPublicada.size =1234;
                        imagenPublicada.name= document.querySelector('#imagen').value;

                        this.options.addedfile.call(this , imagenPublicada);
                        this.options.thumbnail.call(this , imagenPublicada,  `/storage/vacantes/${imagenPublicada.name}`);

                        imagenPublicada.previewElement.classList.add('dz-succes')
                        imagenPublicada.previewElement.classList.add('dz-completa')




                     }
                },
                success: function(file, response) {
                    console.log(response)
                    document.querySelector('#error').textContent = '';
                    document.querySelector('#imagen').value = response.correcto;
                    file.nombreServidor = response.correcto;

                },
                maxfilesexceeded: function(file) {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                        console.log(file)
                    }
                },
                removedfile: function(file, response) {
                    console.log(file.previewElement.parentNode)
                    file.previewElement.parentNode.textContent = '';
                    params = {
                        imagen: file.nombreServidor ?? document.querySelector('#imagen').value
                    }
                    axios.post('/vacantes/borrarimagen', params)
                        .then(respuesta => console.log(respuesta))
                    console.log("la imagen borrada fue", file)
                }
            })
        })

    </script>
@endsection
