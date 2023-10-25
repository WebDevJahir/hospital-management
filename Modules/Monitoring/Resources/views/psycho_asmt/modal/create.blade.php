@php
    $url = !empty($assesment) ? route('psychological-status.update', $assesment->id) : route('psychological-status.store');
    $method = !empty($assesment) ? 'PUT' : 'POST';
    $patient_id = !empty($assesment) ? $assesment->patient_id : $patient_id;
    $date = !empty($assesment) ? $assesment->date : '';
    $anxious_or_worried = !empty($assesment) ? $assesment->anxious_or_worried : '';
    $family_anxious_or_worried = !empty($assesment) ? $assesment->family_anxious_or_worried : '';
    $feeling_depressed = !empty($assesment) ? $assesment->feeling_depressed : '';
    $felt_at_peace = !empty($assesment) ? $assesment->felt_at_peace : '';
    $share_feeling = !empty($assesment) ? $assesment->share_feeling : '';
    $much_information = !empty($assesment) ? $assesment->much_information : '';
@endphp

<div class="modal fade" id="psychoAsmtModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Psycho Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $url }}" method="POST">
                @csrf
                @method($method)
                <div class="modal-body">
                    <div class="row gutters">
                        <table class="table table-striped">
                            <tr>
                                <label>Date:</label><input type="date" name="date" id="date"
                                    value="{{ Carbon\Carbon::now()->toDateString() }}">
                            </tr>
                            <tr>
                                <td></td>
                                <td>Not at All</td>
                                <td> Slightly </td>
                                <td> Moderately </td>
                                <td> Severely </td>
                                <td>Overwhelmingly</td>
                            </tr>
                            <tr>
                                <td><label class="">Have you been feeling anxious or worried about your illness or
                                        treatment? </label></td>
                                <td>
                                    <input type="radio" class="" name="anxious_or_worried" value="Not at All"
                                        @if ($anxious_or_worried == 'Not at All') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="anxious_or_worried" value="Slightly"
                                        @if ($anxious_or_worried == 'Slightly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="anxious_or_worried" value="Moderately"
                                        @if ($anxious_or_worried == 'Moderately') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="anxious_or_worried" value="Severely"
                                        @if ($anxious_or_worried == 'Severely') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                    </span>
                                </td>
                                <td><input type="radio" class="" name="anxious_or_worried"
                                        value="Overwhelmingly" @if ($anxious_or_worried == 'Overwhelmingly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>

                            </tr>
                            <tr>
                                <td><label class="">Have any of your family or friends been anxious or worried
                                        about you? </label></td>
                                <td><input type="radio" class="" name="family_anxious_or_worried"
                                        value="Not at All" @if ($family_anxious_or_worried == 'Not at All') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="family_anxious_or_worried"
                                        value="Slightly" @if ($family_anxious_or_worried == 'Slightly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="family_anxious_or_worried"
                                        value="Moderately" @if ($family_anxious_or_worried == 'Moderately') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="family_anxious_or_worried"
                                        value="Severely" @if ($family_anxious_or_worried == 'Severely') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="family_anxious_or_worried"
                                        value="Overwhelmingly" @if ($family_anxious_or_worried == 'Overwhelmingly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>

                            </tr>
                            <tr>
                                <td><label class="">Have you been feeling depressed? </label></td>
                                <td><input type="radio" class="" name="feeling_depressed" value="Not at All"
                                        @if ($feeling_depressed == 'Not at All') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="feeling_depressed" value="Slightly"
                                        @if ($feeling_depressed == 'Slightly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="feeling_depressed" value="Moderately"
                                        @if ($feeling_depressed == 'Moderately') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="feeling_depressed" value="Severely"
                                        @if ($feeling_depressed == 'Severely') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="feeling_depressed" value="Overwhelmingly"
                                        @if ($feeling_depressed == 'Overwhelmingly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                            </tr>
                            <tr>

                                <td><label class="">Have you felt at peace? </label></td>
                                <td><input type="radio" class="" name="felt_at_peace" value="Not at All"
                                        @if ($felt_at_peace == 'Not at All') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="felt_at_peace" value="Slightly"
                                        @if ($felt_at_peace == 'Slightly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="felt_at_peace" value="Moderately"
                                        @if ($felt_at_peace == 'Moderately') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="felt_at_peace" value="Severely"
                                        @if ($felt_at_peace == 'Severely') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="felt_at_peace" value="Overwhelmingly"
                                        @if ($felt_at_peace == 'Overwhelmingly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="">Have you been able to share how you are feeling with your
                                        family or friends as much as you wanted? </label>
                                </td>
                                <td><input type="radio" class="" name="share_feeling" value="Not at All"
                                        @if ($share_feeling == 'Not at All') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="share_feeling" value="Slightly"
                                        @if ($share_feeling == 'Slightly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="share_feeling" value="Moderately"
                                        @if ($share_feeling == 'Moderately') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="share_feeling" value="Severely"
                                        @if ($share_feeling == 'Severely') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="share_feeling" value="Overwhelmingly"
                                        @if ($share_feeling == 'Overwhelmingly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="">Have you had as much information as you wanted? </label>
                                </td>
                                <td><input type="radio" class="" name="much_information" value="Not at All"
                                        @if ($much_information == 'Not at All') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="much_information" value="Slightly"
                                        @if ($much_information == 'Slightly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="much_information" value="Moderately"
                                        @if ($much_information == 'Moderately') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="much_information" value="Severely"
                                        @if ($much_information == 'Severely') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                                <td><input type="radio" class="" name="much_information"
                                        value="Overwhelmingly" @if ($much_information == 'Overwhelmingly') checked @endif>
                                    <span style="margin:0px 20px 0px 2px"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <input type="hidden" name="patient_id" value="{{ $patient_id }}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
