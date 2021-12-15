@extends('admin.dashboard.layout.app')
@section('title')
    All Users
@endsection
@section('content')
    <!-- Card -->
    <div class="card">
        <!-- Header -->
        <div class="card-header">
            <div class="row justify-content-between align-items-center flex-grow-1">
                <div class="col-sm-6 col-md-4 mb-3 mb-sm-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tio-search"></i>
                                </div>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search users"
                                aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="col-sm-6">
                    <div class="d-sm-flex justify-content-sm-end align-items-sm-center">
                        <!-- Datatable Info -->
                        <div id="datatableCounterInfo" class="mr-2 mb-2 mb-sm-0" style="display: none;">
                            <div class="d-flex align-items-center">
                                <span class="font-size-sm mr-3">
                                    <span id="datatableCounter">0</span>
                                    Selected
                                </span>
                                <a class="btn btn-sm btn-outline-danger" href="javascript:;">
                                    <i class="tio-delete-outlined"></i> Delete
                                </a>
                            </div>
                        </div>
                        <!-- End Datatable Info -->

                        <!-- Unfold -->
                        <div class="hs-unfold mr-2">
                            <a class="js-hs-unfold-invoker btn btn-sm btn-white dropdown-toggle" href="javascript:;"
                                data-hs-unfold-options='{
                                   "target": "#usersExportDropdown",
                                   "type": "css-animation"
                                 }'>
                                <i class="tio-download-to mr-1"></i> Export
                            </a>

                            <div id="usersExportDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right">
                                <span class="dropdown-header">Options</span>
                                <a id="export-copy" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="./assets/svg/illustrations/copy.svg" alt="Image Description">
                                    Copy
                                </a>
                                <a id="export-print" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="./assets/svg/illustrations/print.svg" alt="Image Description">
                                    Print
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Download options</span>
                                <a id="export-excel" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/brands/excel.svg"
                                        alt="Image Description">
                                    Excel
                                </a>
                                <a id="export-csv" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2"
                                        src="./assets/svg/components/placeholder-csv-format.svg" alt="Image Description">
                                    .CSV
                                </a>
                                <a id="export-pdf" class="dropdown-item" href="javascript:;">
                                    <img class="avatar avatar-xss avatar-4by3 mr-2" src="./assets/svg/brands/pdf.svg"
                                        alt="Image Description">
                                    PDF
                                </a>
                            </div>
                        </div>
                        <!-- End Unfold -->

                        <!-- Unfold -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-sm btn-white" href="javascript:;" data-hs-unfold-options='{
                                   "target": "#usersFilterDropdown",
                                   "type": "css-animation",
                                   "smartPositionOff": true
                                 }'>
                                <i class="tio-filter-list mr-1"></i> Filter <span
                                    class="badge badge-soft-dark rounded-circle ml-1">2</span>
                            </a>

                            <div id="usersFilterDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-sm-right dropdown-card card-dropdown-filter-centered"
                                style="min-width: 22rem;">
                                <!-- Card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-title">Filter users</h5>

                                        <!-- Toggle Button -->
                                        <a class="js-hs-unfold-invoker btn btn-icon btn-xs btn-ghost-secondary ml-2"
                                            href="javascript:;" data-hs-unfold-options='{
                                        "target": "#usersFilterDropdown",
                                        "type": "css-animation",
                                        "smartPositionOff": true
                                       }'>
                                            <i class="tio-clear tio-lg"></i>
                                        </a>
                                        <!-- End Toggle Button -->
                                    </div>

                                    <div class="card-body">
                                        <form>
                                            <div class="form-group">
                                                <small class="text-cap mb-2">Role</small>

                                                <div class="form-row">
                                                    <div class="col">
                                                        <!-- Checkbox -->
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="usersFilerCheck1" checked>
                                                            <label class="custom-control-label"
                                                                for="usersFilerCheck1">All</label>
                                                        </div>
                                                        <!-- End Checkbox -->
                                                    </div>

                                                    <div class="col">
                                                        <!-- Checkbox -->
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="usersFilerCheck2">
                                                            <label class="custom-control-label"
                                                                for="usersFilerCheck2">Employee</label>
                                                        </div>
                                                        <!-- End Checkbox -->
                                                    </div>
                                                </div>
                                                <!-- End Row -->
                                            </div>

                                            <div class="form-row">
                                                <div class="col-sm form-group">
                                                    <small class="text-cap mb-2">Position</small>

                                                    <!-- Select -->
                                                    <select class="js-select2-custom js-datatable-filter custom-select"
                                                        size="1" style="opacity: 0;" data-target-column-index="2"
                                                        data-hs-select2-options='{
                                                    "minimumResultsForSearch": "Infinity"
                                                  }'>
                                                        <option value="">Any</option>
                                                        <option value="Accountant">Accountant</option>
                                                        <option value="Co-founder">Co-founder</option>
                                                        <option value="Designer">Designer</option>
                                                        <option value="Developer">Developer</option>
                                                        <option value="Director">Director</option>
                                                    </select>
                                                    <!-- End Select -->
                                                </div>

                                                <div class="col-sm form-group">
                                                    <small class="text-cap mb-2">Status</small>

                                                    <!-- Select -->
                                                    <select class="js-select2-custom js-datatable-filter custom-select"
                                                        size="1" style="opacity: 0;" data-target-column-index="4"
                                                        data-hs-select2-options='{
                                                    "minimumResultsForSearch": "Infinity"
                                                  }'>
                                                        <option value="">Any status</option>
                                                        <option value="Active"
                                                            data-option-template='<span class="legend-indicator bg-success"></span>Active'>
                                                            Active</option>
                                                        <option value="Pending"
                                                            data-option-template='<span class="legend-indicator bg-warning"></span>Pending'>
                                                            Pending</option>
                                                        <option value="Suspended"
                                                            data-option-template='<span class="legend-indicator bg-danger"></span>Suspended'>
                                                            Suspended</option>
                                                    </select>
                                                    <!-- End Select -->
                                                </div>
                                            </div>
                                            <!-- End Row -->

                                            <a class="js-hs-unfold-invoker btn btn-block btn-primary" href="javascript:;"
                                                data-hs-unfold-options='{
                                          "target": "#usersFilterDropdown",
                                          "type": "css-animation",
                                          "smartPositionOff": true
                                         }'>Apply</a>
                                        </form>
                                    </div>
                                </div>
                                <!-- End Card -->
                            </div>
                        </div>
                        <!-- End Unfold -->
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Header -->

        <!-- Table -->
        <div class="table-responsive datatable-custom">
            <table id="datatable"
                class="table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                data-hs-datatables-options='{
                               "columnDefs": [{
                                  "targets": [0, 7],
                                  "orderable": false
                                }],
                               "order": [],
                               "info": {
                                 "totalQty": "#datatableWithPaginationInfoTotalQty"
                               },
                               "search": "#datatableSearch",
                               "entries": "#datatableEntries",
                               "pageLength": 15,
                               "isResponsive": false,
                               "isShowPaging": false,
                               "pagination": "datatablePagination"
                             }'>
                <thead class="thead-light">
                    <tr>
                        <th>Portfolio</th>
                        <th>Role</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>United Kingdom</td>
                        <td>Pak</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- End Table -->

        <!-- Footer -->
        <div class="card-footer">
            <!-- Pagination -->
            <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                <div class="col-sm mb-2 mb-sm-0">
                    <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                        <span class="mr-2">Showing:</span>

                        <!-- Select -->
                        <select id="datatableEntries" class="js-select2-custom" data-hs-select2-options='{
                                      "minimumResultsForSearch": "Infinity",
                                      "customClass": "custom-select custom-select-sm custom-select-borderless",
                                      "dropdownAutoWidth": true,
                                      "width": true
                                    }'>
                            <option value="10">10</option>
                            <option value="15" selected>15</option>
                            <option value="20">20</option>
                        </select>
                        <!-- End Select -->

                        <span class="text-secondary mr-2">of</span>

                        <!-- Pagination Quantity -->
                        <span id="datatableWithPaginationInfoTotalQty"></span>
                    </div>
                </div>

                <div class="col-sm-auto">
                    <div class="d-flex justify-content-center justify-content-sm-end">
                        <!-- Pagination -->
                        <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                    </div>
                </div>
            </div>
            <!-- End Pagination -->
        </div>
        <!-- End Footer -->
    </div>
    <!-- End Card -->
    </div>
@endsection
