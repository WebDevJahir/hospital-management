@extends('master.master')
@section('title', 'Prescription - Hospice Bangladesh')
@section('main_content')
    @parent
    <div class="main-container">
        <div class="content-wrapper">
            <!-- Fixed body scroll start -->
            <div class="fixedBodyScroll">

                <!-- Row start -->
                <div id="loader-container" class="loader-container" style="display: none;">
                    <div class="loader"></div>
                </div>
                @include('monitoring::prescription.prescription_layout.header')
                @include('monitoring::prescription.prescription_layout.graph')
                <div class="row">
                    @include('monitoring::prescription.prescription_layout.short_profile')
                    @include('monitoring::prescription.prescription_layout.medicine')
                    @include('monitoring::prescription.prescription_layout.followup')
                </div>

                @include('monitoring::prescription.prescription_layout.advice_modal')
                @include('monitoring::prescription.next_plan.add_plan')
                <!-- End of Advice Model -->
                <div id="edit_modal_body">
                </div>
            </div>
            <!-- Content wrapper end -->
        </div>
    </div>
    </div>
    @if (Session::has('success'))
        <script type="text/javascript">
            Toast.fire({
                icon: 'success',
                title: '{!! Session::get('success') !!}',
            })
        </script>
        @php Session::forget('success') @endphp
    @endif

    @if (Session::has('error'))
        <script type="text/javascript">
            Toast.fire({
                icon: 'success',
                title: '{!! Session::get('error') !!}',
            })
        </script>
    @endif
    @php Session::forget('error') @endphp
@section('script')
    @include('monitoring::prescription.js')
@endsection
@endsection
