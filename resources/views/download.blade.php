@extends('layouts.index')
@section('container')

<div class="row justify-content-center mt-5" style="margin: auto; width: 60%;">
    <div class="col-md mt-5 ">
        <h1 class=" mb-3  text-center" style="color: var(--primary-color) ">Daftar Download</h1>
        <div class="col-md">
            <h5 class="judulhead mb-3 text-center" style="color: var(--primary-color) ">Daftar file yang bisa diunduh seputar Laboratorium Terpadu Institut Teknologi Sumatera</h5>

            <table class="data table table-striped mt-5">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>File</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($download as $item)
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td style="white-space:nowrap;width:150px;"><?php $ms = strtotime($item['created_at']); echo date('d M Y', $ms) ?></td>
                        <td style="width:240px;text-align:left;">
                            <a class="btn btn-sm bg-second btn-download hidden-xs" href="{{ asset('storage/' . $item['file']) }}" download>
                                <i class="fa fa-download"></i> Download
                            </a>&nbsp;&nbsp;
                            <a class="btn btn-sm bg-second copy-link hidden-xs" href="#" data-link="{{ asset('storage/' . $item['file']) }}">
                                <i class="fa fa-link"></i> Copy Link
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
    <div class="d-flex justify-content-center">
        {{ $download->links() }}
    </div>



<script>
    // Function to copy link when it is clicked
    function copyLink(event) {
      // Check if the clicked element is an <a> tag with the class 'copy-link'
      if (event.target.tagName === 'A' && event.target.classList.contains('copy-link')) {
        // Get the link from the data-link attribute
        var linkToCopy = event.target.getAttribute("data-link");

        // Create a temporary input element
        var inputElement = document.createElement("input");

        // Set the input element's value to the link
        inputElement.value = linkToCopy;

        // Append the input element to the document
        document.body.appendChild(inputElement);

        // Select the input element's content
        inputElement.select();

        // Copy the selected content to the clipboard
        document.execCommand("copy");

        // Remove the temporary input element
        document.body.removeChild(inputElement);

        // Provide some visual feedback (optional)
        alert("Link Berhasil Disalin");
      }
    }

    // Attach the copyLink function to the click event of the document
    document.addEventListener("click", copyLink);
  </script>

{{-- <script>
    $(document).ready(function(){
        $(document).on('click', '.btn-copy', function() {
			var url = $(this).data('url');

            alert(url);

			copyToClipboard(url);
			
	       	swal({   
	            title: "Copied!",   
	            text: "Link Berhasil Disalin.",   
	            type: "success",
	            timer: 2000,   
	    		showConfirmButton: false
	        });
		});
    });
</script> --}}
@endsection