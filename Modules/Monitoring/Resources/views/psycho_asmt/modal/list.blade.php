<div class="modal fade" id="psychoAsmtListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Psycho Assesment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="followUpList" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Feeling anxious or worried</th>
                                <th>Friends anxious or worried </th>
                                <th>Feeling depressed?</th>
                                <th>Felt at peace?</th>
                                <th>Able to share feelings</th>
                                <th>Much information</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="serviceTable">
                            @foreach ($assesments as $psycho)
                                <tr id="tr{{ $psycho->id }}">
                                    <td>{{ Carbon\Carbon::parse($psycho->created_at)->format('d/m/Y g:i A') }}
                                    </td>
                                    <td>{{ $psycho->anxious_or_worried }}</td>
                                    <td>{{ $psycho->family_anxious_or_worried }}</td>
                                    <td>{{ $psycho->feeling_depressed }}</td>
                                    <td>{{ $psycho->felt_at_peace }}</td>
                                    <td>{{ $psycho->share_feeling }}</td>
                                    <td>{{ $psycho->much_information }}</td>
                                    <td>
                                        <nobr>
                                            <button onclick="editPsychoAsmt({{ $psycho->id }})"
                                                class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></button>
                                            {{-- <a href="{{ route('pain-assesment.show', $pain->id) }}"
                                                class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a> --}}
                                            <form action="{{ route('psychological-status.destroy', $psycho->id) }}"
                                                method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success btn-sm delete"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </nobr>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
