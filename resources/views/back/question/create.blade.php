@extends('back.layouts.app')
@section('title', 'Dashboard')
@section('content')
<style>
    .mb-question {
        margin-bottom: 33px;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Mcq Question</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form method="POST"  onkeypress="return event.keyCode != 13;">
            @csrf

            <div class="mb-question row">
                <label for="numQuestions" class="col-xl-2 col-form-label">Number of Questions:</label>
                <div class="col-xl-5">
                    <input type="number" class="form-control" id="numQuestions" name="num_questions" min="1" required>
                </div>
                <div class="col-xl-3">
                    <button type="button" class="btn btn-primary" id="generateQuestions">Generate Questions</button>
                </div>
            </div>
        </form>


        <div class="row">

            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="{{ route('back.question_post') }}" class="needs-validation">
                            @csrf
                            <div class="dynamic-question"> </div>


                        </form>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

<script>
    $(document).ready(function() {
        $("#generateQuestions").on("click", function() {
            var numQuestions = $("#numQuestions").val();
            if (numQuestions == '') {
                toastr.error('Please Select Number');
                return false;
            }
            // Prepare the data to be sent to the server
            var formData = {
                num_questions: numQuestions,
                _token: "{{ csrf_token() }}", // Laravel CSRF token
            };

            // Send the AJAX POST request
            $.ajax({
                type: "POST",
                url: "{{ route('back.questions_generate') }}",
                data: formData,
                success: function(response) {
                    // Handle the response from the server
                    if (response.success == true) {
                        $('.dynamic-question').html(response.html);
                    }

                },
                error: function(error) {
                    // Handle any errors
                    console.error(error);
                },
            });
        });
    });
</script>
@endsection