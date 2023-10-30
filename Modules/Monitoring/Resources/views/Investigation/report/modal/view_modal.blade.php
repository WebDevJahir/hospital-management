<div class="modal fade" id="investigationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Investigations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="followUpList" class="table custom-table">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Investigation Name</th>
                                <th>Result</th>
                                <th>Normal Value</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="serviceTable">
                            @foreach ($investigations as $investigation)
                                <tr id="tr{{ $investigation->id }}">
                                    <td>
                                        <span
                                            class="date">{{ Carbon\Carbon::parse($investigation->date)->format('d/m/Y') }}</span>
                                    </td>
                                    <td>
                                        <span class="name">{{ $investigation->sub_category->name }}</span>
                                        <input type="hidden" class="sub_category_id"
                                            value="{{ $investigation->sub_category->id }}">
                                    </td>
                                    <td>
                                        <span class="result"
                                            @if (
                                                $investigation->result >= $investigation->sub_category->minimum_value &&
                                                    $investigation->result <= $investigation->sub_category->maximum_value) style='color:green'
                                          @else style='color:red' @endif>
                                            {{ $investigation->result }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="minimum_value">
                                            {{ $investigation->sub_category->minimum_value ?? '' }}
                                        </span>
                                        -
                                        <span class="miximum_value">
                                            {{ $investigation->sub_category->maximum_value ?? '' }}
                                        </span>

                                    </td>
                                    <td>
                                        <span class="unit">{{ $investigation->sub_category->unit }}</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm editInvestigation" onclick="editInvestigation({{ $investigation->id }})"
                                            type="submit">
                                            <i class="fas fa-edit text-primary"></i>

                                        </button>
                                        {{-- <button class="btn btn-danger btn-sm"
                                            onclick="deleteInvReport({{ $investigation->id }})"
                                            type="submit">delete</button> --}}

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>


