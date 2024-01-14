@extends('master.master')
@section('title', 'Investigation Category - Hospice Bangladesh')
@section('main_content')
    @parent
    @php
        $form_heading = !empty($expense->id) ? 'Edit' : 'Create';
        $form_url = !empty($expense->id) ? route('expense.update', $expense->id) : route('expense.store');
        $form_method = !empty($expense->id) ? 'PUT' : 'POST';
        $patient_id = !empty($expense->id) ? $expense->patient_id : '';
        $type = !empty($expense->id) ? $expense->type : '';
        $project_id = !empty($expense->id) ? $expense->project_id : '';
        $employee_id = !empty($expense->id) ? $expense->employee_id : '';
        $received_by = !empty($expense->id) ? $expense->received_by : '';
        $date = !empty($expense->id) ? $expense->date : '';
        $total = !empty($expense->id) ? $expense->total : '';
    @endphp
    <div class="main-container">
        <div class="content-wrapper">
            <div class="fixedBodyScroll">
                <div class="row">
                    <div class="col-md-4 col-4">
                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <select name="patient_id" id="patient_id" class="form-control">
                                <option value="">Select Patient</option>
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" @if ($patient_id == $patient->id) selected @endif>
                                        {{ $patient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
