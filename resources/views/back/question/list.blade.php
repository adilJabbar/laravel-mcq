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
                    <h4 class="mb-sm-0 font-size-18">Mcq Question List</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->



        <div class="row">

            <div class="col-xl-12">
                <div class="row">
                    <div class="col-md-12">
                        <ul>
                            @foreach ($mcqs as $mcq)

                            <li>
                                <strong>Question:</strong> {{ $mcq->question_text }}
                                <br>
                                <strong>Options:</strong> {{ implode(', ', json_decode($mcq->options,true)) }}
                                <br>
                                <strong>Correct Option:</strong>
                                @switch($mcq->correct_option)
                                @case(1)
                                A
                                @break

                                @case(2)
                                B
                                @break
                                @case(3)
                                C
                                @break
                                @case(4)
                                D
                                @break

                                @default
                                No option correct
                                @endswitch
                               
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

@endsection