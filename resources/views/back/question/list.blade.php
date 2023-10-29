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
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Question</th>
                                    <th scope="col">Option A</th>
                                    <th scope="col">Option B</th>
                                    <th scope="col">Option C</th>
                                    <th scope="col">Option D</th>
                                    <th scope="col">Correct Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mcqs as $mcq)
                                <tr>
                                    <td>{{ $mcq->question_text }}</td>
                                    @foreach(json_decode($mcq->options,true) as $option)
                                    <td>{{$option}}</td>
                                    @endforeach
                                    <td>
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
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

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