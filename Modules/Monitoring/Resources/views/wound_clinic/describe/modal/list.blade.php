<div class="modal fade" id="woundDescribeListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Wound Describe List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="followUpList" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Site</th>
                                <th>First Occured</th>
                                <th>Change of Wound</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="serviceTable">
                            @foreach ($wound_describes as $wound)
                                <tr id="tr{{ $wound->id }}">
                                    <td> {{ date('d-m-Y', strtotime($wound->date)) }}</td>
                                    <td>{{ $wound->location }}</td>
                                    <td>{{ $wound->site }}</td>
                                    <td>{{ $wound->first_occured }}</td>
                                    <td>{{ $wound->wound_type }}</td>
                                    <td>
                                        <nobr>
                                            <button onclick="editWoundDescribe({{ $wound->id }})"
                                                class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></button>
                                            {{-- <a href="{{ route('pain-assesment.show', $pain->id) }}"
                                                        class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a> --}}
                                            <form action="{{ route('wound-describe.destroy', $wound->id) }}"
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
