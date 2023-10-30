<div class="modal fade" id="painMonitoringListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pain Monitoring</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="followUpList" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Medicine</th>
                                <th>Dose 1</th>
                                <th>Status</th>
                                <th>Dose 2</th>
                                <th>Status</th>
                                <th>Dose 3</th>
                                <th>Status</th>
                                <th>Dose 4</th>
                                <th>Status</th>
                                <th>Dose 5</th>
                                <th>Status</th>
                                <th>Dose 6</th>
                                <th>Status</th>
                                <th>Extra Dose</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="serviceTable">
                            @foreach ($pain_monitorings as $pain_monitoring)
                                <tr>
                                    <td>{{ $pain_monitoring->created_at }}</td>
                                    <td>{{ $pain_monitoring->medicine }}</td>
                                    <td>{{ $pain_monitoring->dose1 }}</td>
                                    <td>{{ $pain_monitoring->dose1_status ?? 'No' }}</td>
                                    <td>{{ $pain_monitoring->dose2 }}</td>
                                    <td>{{ $pain_monitoring->dose2_status ?? 'No' }}</td>
                                    <td>{{ $pain_monitoring->dose3 }}</td>
                                    <td>{{ $pain_monitoring->dose3_status ?? 'No' }}</td>
                                    <td>{{ $pain_monitoring->dose4 }}</td>
                                    <td>{{ $pain_monitoring->dose4_status ?? 'No' }}</td>
                                    <td>{{ $pain_monitoring->dose5 }}</td>
                                    <td>{{ $pain_monitoring->dose5_status ?? 'No' }}</td>
                                    <td>{{ $pain_monitoring->dose6 }}</td>
                                    <td>{{ $pain_monitoring->dose6_status ?? 'No' }}</td>
                                    <td>{{ $pain_monitoring->extra_dose }}</td>
                                    <td>
                                        <nobr>
                                            <button onclick="editPainMonitoring({{ $pain_monitoring->id }})"
                                                class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></button>
                                            {{-- <a href="{{ route('pain-assesment.show', $pain->id) }}"
                                                    class="btn btn-outline-success btn-sm"><i class="fas fa-eye"></i></a> --}}
                                            <form action="{{ route('pain-monitoring.destroy', $pain_monitoring->id) }}"
                                                method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i
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
