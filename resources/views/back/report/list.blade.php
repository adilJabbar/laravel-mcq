@extends('back.layouts.app')
@section('title', 'User Report')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">User Report</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Correct Answer</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{$user->email}}</td>

                                    <td>{{isset($user->mcqResult['correct_answers']) ? $user->mcqResult['correct_answers'] : 'N/A'}}/{{isset($user->mcqResult['total_questions']) ? $user->mcqResult['total_questions'] : 'N/A'}}</td>
                                    <td>{{ isset( $user->mcqResult['percentage'])? $user->mcqResult['percentage']:'N/A' }}</td>
                                    <td>
                                        @if(isset( $user->mcqResult['percentage']) && $user->mcqResult['percentage'] < 50) Failed @else @if(isset( $user->mcqResult['percentage']) && $user->mcqResult['percentage'] >= 50)
                                            Passed
                                            @else
                                            N/A
                                            @endif

                                            @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="text-center my-3">
                    <!-- <a href="javascript:void(0);" class="text-success"><i class="bx bx-loader bx-spin font-size-18 align-middle mr-2"></i> Load more </a> -->
                </div>
            </div> <!-- end col-->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
@endsection