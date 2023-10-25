<!-- Modal -->
<div class="modal fade" id="followUpListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Patient Follow Up List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="followUpTable" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Patient Name</th>
                                <th>Place Name</th>
                                <th>Visit Type</th>
                                <th>Blood Pressure</th>
                                <th>Pulse</th>
                                <th>Saturation</th>
                                <th>Temperature</th>
                                <th>Intake</th>
                                <th>Output</th>
                                <th>Insulin</th>
                                <th>Sugar</th>
                                <th>Reason for Call</th>
                                <th>Response for Call</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="followUpTableBody">
                            @foreach ($followUps as $follow)
                                <tr>
                                    <td class="date">{{ date('d/m/Y', strtotime($follow->date)) }}</td>
                                    <td class="name">{{ $follow->patient->name ?? '' }}</td>
                                    <td class="place">{{ $follow->place }}</td>
                                    <td class="type">{{ $follow->type }}</td>
                                    <td class="bp"><span class="bp_high">{{ $follow->bp_high }}</span>/<span
                                            class="bp_low">{{ $follow->bp_min }}</span></td>
                                    <td class="pulse">{{ $follow->pulse }}</td>
                                    <td class="saturation">{{ $follow->saturation }}</td>
                                    <td class="temp">{{ $follow->temp }}</td>
                                    <td class="intake">{{ $follow->intake }}</td>
                                    <td class="output">{{ $follow->output }}</td>
                                    <td class="insulin">{{ $follow->insulin }}</td>
                                    <td class="sugar">{{ $follow->sugar }}</td>
                                    <td class="reason">{{ $follow->reason }} @if ($follow->other_reason)
                                            ,{{ $follow->other_reason }}
                                        @endif
                                    </td>
                                    <td class="response">{{ $follow->response }} @if ($follow->other_response)
                                            ,{{ $follow->other_response }}
                                        @endif
                                    </td>
                                    <td>
                                        {{-- <button class="btn btn-inline btn-sm editFollowUpButton"
                                            style="background:inherit" title="Edit" type="submit"
                                            style="margin:2px;"><i class="fas fa-edit text-success"></i></button><br> --}}
                                        <button class="btn btn-inline btn-sm deleteFollowUpButton"
                                            style="background:inherit" title="Delete" type="button"
                                            style="margin:2px;"><i class="fas fa-trash-alt text-danger"></i></button>
                                        <input type="hidden" class="follow_up_id" value="{{ $follow->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
