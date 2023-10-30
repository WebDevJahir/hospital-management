<div class="modal fade" id="WoundManagementListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Wound Management</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="followUpList" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Debridement</th>
                                <th>Cleaning solution used</th>
                                <th>Product Used</th>
                                <th>Dressing Frequency</th>
                                <th>Next Review Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="serviceTable">
                            @foreach ($wound_managements as $wound_management)
                                <tr>
                                    <td>{{ date('d-m-Y', strtotime($wound_management->date)) }}</td>
                                    <td>{{ $wound_management->debridement }}</td>
                                    <td>{{ $wound_management->solution }}</td>
                                    <td>{{ $wound_management->product_used }}</td>
                                    <td>{{ $wound_management->frequency }}</td>
                                    <td>{{ $wound_management->next_date }}</td>
                                    <td>
                                        <nobr>
                                            <button onclick="editWoundManagement({{ $wound_management->id }})"
                                                class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></button>
                                            {{-- <a href="{{ route('pain-assesment.show', $pain->id) }}"
                                        class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a> --}}
                                            <form
                                                action="{{ route('wound-management.destroy', $wound_management->id) }}"
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
