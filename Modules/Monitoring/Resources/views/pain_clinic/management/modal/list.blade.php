<div class="modal fade" id="painMgtListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assesment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="followUpList" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Medicine Name</th>
                                <th>Dose</th>
                                <th>Note</th>
                                <th>Duration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="serviceTable">
                            @foreach ($pain_managements as $management)
                                <tr>
                                    <td>{{ $management->created_at }}</td>
                                    <td>{{ $management->medicine }}</td>
                                    <td>{{ $management->dose }}</td>
                                    <td>{{ $management->note }}</td>
                                    <td>{{ $management->duration }}</td>
                                    <td>
                                        <nobr>
                                            <button onclick="editPainMgt({{ $management->id }})"
                                                class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></button>
                                            {{-- <a href="{{ route('pain-assesment.show', $pain->id) }}"
                                                class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a> --}}
                                            <form action="{{ route('pain-management.destroy', $management->id) }}"
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
