@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Tambah File Download</h1>
    </div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/download/tambahdata" class="mb-5" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="nama" class="form-label">Nama File</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama') }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

      <div class="mb-3">
        <label for="file" class="form-label @error('file') is-invalid @enderror">File (Format PDF Max 4 Mb)</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input type="file" class="form-control" id="file" name="file" accept=".pdf" onchange="previewImage()">
        {{-- <input type="file" id="file" accept=".pdf" onchange="previewImage()"> --}}
        @error('file')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      

      <div class="col-lg">
        <b>Preview Dokumen</b><br>
        <canvas id="pdfViewer"></canvas>
      </div>

      {{-- <canvas id="pdfViewer" style="border: 1px solid black;"></canvas> --}}


      <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>

<!-- Include PDF.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js" integrity="sha512-q+4liFwdPC/bNdhUpZx6aXDx/h77yEQtn4I1slHydcbZK34nLaR3cAeYSJshoxIOq3mjEf7xJE8YWIUHMn+oCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- <script>
    function previewImage(){
        var file = document.getElementById("file").files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var pdfData = new Uint8Array(e.target.result);

                // Using PDF.js to render the PDF
                renderPDF(pdfData);
            };

            reader.readAsArrayBuffer(file);
        }
    }

    function renderPDF(pdfData) {
        // Wait for the PDF.js script to be loaded
        if (typeof pdfjsLib !== 'undefined') {
            // Use PDF.js to render the PDF
            pdfjsLib.getDocument({ data: pdfData }).promise.then(function (pdf) {
                pdf.getPage(1).then(function (page) {
                    var canvas = document.getElementById('pdfViewer');
                    var context = canvas.getContext('2d');

                    var viewport = page.getViewport({ scale: 1.5 });
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: context,
                        viewport: viewport
                    };
                    page.render(renderContext);
                });
            });
        } else {
            console.error('PDF.js is not loaded.');
        }
    }
</script> --}}

<script>
    function previewImage(){
        // var pdfjsLib = window['pdfjs-dist/build/pdf'];
        // pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://mozilla.github.io/pdf.js/build/pdf.worker.js';

        // var file = e.target.files[0];
        var file = document.getElementById("file").files[0];



        if(file.type == "application/pdf"){
            var fileReader = new FileReader();  
            fileReader.onload = function() {
            var pdfData = new Uint8Array(this.result);
            var loadingTask = pdfjsLib.getDocument({data: pdfData});
            loadingTask.promise.then(function(pdf) {
            console.log('PDF loaded');

            var pageNumber = 1;
            pdf.getPage(pageNumber).then(function(page) {
                console.log('Page loaded');

                var scale = 1;
                var viewport = page.getViewport({scale: scale});

                var canvas = $("#pdfViewer")[0];
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(function () {
                console.log('Page rendered');
                });
            });
        }, function (reason) {
            console.error(reason);
            });
        };
            fileReader.readAsArrayBuffer(file);
        }
    }
</script>

@endsection