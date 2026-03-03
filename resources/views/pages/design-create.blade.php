@extends('layouts.app')

@section('content')

<div class="design-page" style="padding-top: 100px;">

    <div class="container">

        <div class="design-grid">

            <!-- PANEL IZQUIERDO -->
            <div class="design-sidebar">

                <h3 class="sidebar-title">Personaliza tu Polo</h3>

                <!-- Selector de vistas -->
                <div class="tool-group">
                    <label>Vista</label>
                    <div class="view-selector">
                        <button class="view-btn active" data-view="frontal">Frontal</button>
                        <button class="view-btn" data-view="trasera">Trasera</button>
                        <button class="view-btn" data-view="manga_izquierda">Manga Izq.</button>
                        <button class="view-btn" data-view="manga_derecha">Manga Der.</button>
                    </div>
                </div>

                <!-- Selector color -->
                <div class="tool-group">
                    <label>Color del Polo</label>
                    <input type="color" id="colorPicker" value="#ffffff">
                </div>

                <!-- Texto -->
                <div class="tool-group">
                    <label>Agregar Texto</label>
                    <button id="addText" class="btn-tool">Agregar Texto</button>
                </div>

                <!-- Imagen -->
                <div class="tool-group">
                    <label>Subir Imagen</label>
                    <input type="file" id="uploadImage" class="file-input">
                </div>

                <button id="saveDesign" class="btn-save">Guardar Diseño</button>

            </div>

            <!-- CANVAS -->
            <div class="design-canvas-wrapper m-auto">
                    <canvas id="designCanvas" width="450" height="550"></canvas>
            </div>

        </div>

    </div>

</div>

@push('scripts')



<script>
   
    document.addEventListener('DOMContentLoaded', function () {
        let canvas = new fabric.Canvas('designCanvas', {
            preserveObjectStacking: true
        });

    

        let currentView = 'frontal';
        let currentShirt = null;

        let designs = {
            frontal: null,
            trasera: null,
            manga_izquierda: null,
            manga_derecha: null
        };

        function loadShirt(view) {

            canvas.clear();

            const imagePath = "{{ asset('images') }}/polo_base_" + view + ".png";

            console.log(imagePath);

            fabric.Image.fromURL(imagePath, function(img) {

                img.set({
                    left: 0,
                    top: 0,
                    selectable: false,
                    evented: false
                });

                img.scaleToWidth(canvas.getWidth());
    
                canvas.add(img);
                canvas.sendToBack(img);

                currentShirt = img;

                canvas.renderAll();

            });
        }

        loadShirt('frontal');

        /* CAMBIAR VISTAS */
        document.querySelectorAll('.view-btn').forEach(btn => {

            btn.addEventListener('click', function() {

                document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // guardar diseño actual
                designs[currentView] = canvas.toJSON();

                // cambiar vista
                currentView = this.dataset.view;

                loadShirt(currentView);

            });

        });

        /* CAMBIAR COLOR */
        document.getElementById('colorPicker').addEventListener('input', function() {

            if (!currentShirt) return;

            currentShirt.filters = [
                new fabric.Image.filters.BlendColor({
                    color: this.value,
                    mode: 'multiply',
                    alpha: 1
                })
            ];

            currentShirt.applyFilters();
            canvas.renderAll();
        });

        /* AGREGAR TEXTO */
        document.getElementById('addText').addEventListener('click', function() {

            const text = new fabric.IText('Tu texto aquí', {
                left: 150,
                top: 200,
                fontSize: 30,
                fill: '#000000'
            });

            canvas.add(text);
            canvas.setActiveObject(text);
            canvas.renderAll();
        });

        /* SUBIR IMAGEN */
        document.getElementById('uploadImage').addEventListener('change', function(e) {

            const reader = new FileReader();

            reader.onload = function(event) {

                fabric.Image.fromURL(event.target.result, function(img) {

                    img.scaleToWidth(120);
                    img.set({
                        left: 150,
                        top: 200
                    });

                    canvas.add(img);
                    canvas.setActiveObject(img);
                });
            };

            reader.readAsDataURL(e.target.files[0]);
        });

        /* GUARDAR */
        document.getElementById('saveDesign').addEventListener('click', function() {

            designs[currentView] = canvas.toJSON();

            fetch('/design/save', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(designs)
            });

            alert('Diseño guardado correctamente');
        });
    });

</script>

@endpush

@endsection




