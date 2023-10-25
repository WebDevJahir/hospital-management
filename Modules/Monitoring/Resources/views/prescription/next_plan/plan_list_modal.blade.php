<div class="modal fade" id="planListModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Plan List</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="nextPlanTable" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th colspan="2">Plan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="serviceTable">
                            @foreach ($next_plans as $nextPlan)
                                <tr id="tr{{ $nextPlan->id }}">
                                    <td>
                                        <input type="hidden" class="next_plan_id" value="{{ $nextPlan->id }}">
                                        <span
                                            class="date">{{ Carbon\Carbon::parse($nextPlan->notification_date)->format('d/m/Y') }}</span>
                                    </td>
                                    <td colspan="2">
                                        <span class="name">{{ $nextPlan->plan }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm deletePlanButton" type="submit">
                                            <i class="fas fa-trash text-danger"></i>

                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="addNextPlanButton">Save</button>
            </div>
        </div>
    </div>
</div>
