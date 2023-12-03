@extends('admin.layout.app')

@section('title')
    @lang('nav.admins')
@endsection

@section('css-vendor')
    <link rel="stylesheet" href="{{ asset('/dashboard/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/dashboard/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('/dashboard/assets/vendor/libs/select2/select2.css') }}" />
@endsection

{{-- main content --}}
@section('content')
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Session</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <small class="text-success">(+29%)</small>
                            </div>
                            <small>Total Users</small>
                        </div>
                        <span class="badge bg-label-primary rounded p-2">
                            <i class="bx bx-user bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Paid Users</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">4,567</h4>
                                <small class="text-success">(+18%)</small>
                            </div>
                            <small>Last week analytics </small>
                        </div>
                        <span class="badge bg-label-danger rounded p-2">
                            <i class="bx bx-user-plus bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Active Users</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">19,860</h4>
                                <small class="text-danger">(-14%)</small>
                            </div>
                            <small>Last week analytics</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="bx bx-group bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span>Pending Users</span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2">237</h4>
                                <small class="text-success">(+42%)</small>
                            </div>
                            <small>Last week analytics</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="bx bx-user-voice bx-sm"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title">Search Filter</h5>
            <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
                <div class="col-md-4 user_role"></div>
                <div class="col-md-4 user_plan"></div>
                <div class="col-md-4 user_status"></div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table border-top">
                <thead>
                    <tr>
                        <th></th>
                        <th>@lang('admins.name')</th>
                        <th>@lang('admins.role')</th>
                        <th>@lang('admins.created_at')</th>
                        <th>@lang('general.actions')</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- Offcanvas to add new user -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
            <div class="offcanvas-header border-bottom">
                <h6 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h6>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mx-0 flex-grow-0">
                <form class="add-new-user pt-0" id="addNewUserForm" onsubmit="return false">
                    <div class="mb-3">
                        <label class="form-label" for="add-user-fullname">Full Name</label>
                        <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe"
                            name="userFullname" aria-label="John Doe" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-email">Email</label>
                        <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com"
                            aria-label="john.doe@example.com" name="userEmail" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-contact">Contact</label>
                        <input type="text" id="add-user-contact" class="form-control phone-mask"
                            placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="add-user-company">Company</label>
                        <input type="text" id="add-user-company" class="form-control" placeholder="Web Developer"
                            aria-label="jdoe1" name="companyName" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="country">Country</label>
                        <select id="country" class="select2 form-select">
                            <option value="">Select</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="user-role">User Role</label>
                        <select id="user-role" class="form-select">
                            <option value="subscriber">Subscriber</option>
                            <option value="editor">Editor</option>
                            <option value="maintainer">Maintainer</option>
                            <option value="author">Author</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="user-plan">Select Plan</label>
                        <select id="user-plan" class="form-select">
                            <option value="basic">Basic</option>
                            <option value="enterprise">Enterprise</option>
                            <option value="company">Company</option>
                            <option value="team">Team</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script-vendor')
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/jszip/jszip.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/pdfmake/pdfmake.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-buttons/buttons.html5.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/datatables-buttons/buttons.print.js') }}"></script>
    <script src="{{ asset('/dashboard/assets/vendor/libs/select2/select2.js') }}"></script>
@endsection
@section('script')
    <script>
        $('document').ready(function() {
            //initialise datatables
            function startDataTable() {
                // Variable declaration for table
                var dt_user_table = $('.datatables-users')
                select2 = $('.select2'),
                    userView = 'app-user-view-account.html'
                statusObj = {
                    1: {
                        title: 'Pending',
                        class: 'bg-label-warning'
                    },
                    2: {
                        title: 'Active',
                        class: 'bg-label-success'
                    },
                    3: {
                        title: 'Inactive',
                        class: 'bg-label-secondary'
                    }
                };

                if (select2.length) {
                    var $this = select2;
                    $this.wrap('<div class="position-relative"></div>').select2({
                        placeholder: 'Select Country',
                        dropdownParent: $this.parent()
                    });
                }

                // Users datatable
                if (dt_user_table.length) {
                    var dt_user = dt_user_table.DataTable({
                        ajax: "{!! route('admin.admins.admins_list') !!}",
                        columns: [{
                                data: ''
                            },
                            {
                                data: 'name'
                            },
                            {
                                data: 'role'
                            },
                            {
                                data: 'created_at'
                            },
                            {
                                data: 'actions'
                            },
                        ],
                        columnDefs: [{
                                // For Responsive
                                className: 'control',
                                searchable: false,
                                orderable: false,
                                responsivePriority: 2,
                                targets: 0,
                                render: function(data, type, full, meta) {
                                    return '';
                                }
                            },
                            {
                                // User full name and email
                                targets: 1,
                                responsivePriority: 4,
                                render: function(data, type, full, meta) {
                                    var $name = full['name'],
                                        $initials = full['initials'],
                                        $userName = full['username'];
                                    // For Avatar badge
                                    var stateNum = Math.floor(Math.random() * 6);
                                    var states = ['success', 'danger', 'warning', 'info',
                                        'dark', 'primary', 'secondary'
                                    ];
                                    var $state = states[stateNum],
                                        $name = full['name'],
                                        $initials = $name.match(/\b\w/g) || [];
                                    $initials = (($initials.shift() || '') + ($initials.pop() ||
                                        '')).toUpperCase();
                                    $output =
                                        '<span class="avatar-initial rounded-circle bg-label-' +
                                        $state + '">' + $initials + '</span>';
                                    // Creates full output for row
                                    var $row_output =
                                        '<div class="d-flex justify-content-start align-items-center user-name">' +
                                        '<div class="avatar-wrapper">' +
                                        '<div class="avatar avatar-sm me-3">' +
                                        $output +
                                        '</div>' +
                                        '</div>' +
                                        '<div class="d-flex flex-column">' +
                                        '<a href="' +
                                        userView +
                                        '" class="text-body text-truncate"><span class="fw-semibold">' +
                                        $name +
                                        '</span></a>' +
                                        '<small class="text-muted">' +
                                        $userName +
                                        '</small>' +
                                        '</div>' +
                                        '</div>';
                                    return $row_output;
                                }
                            },
                        ],
                        order: [
                            [1, 'desc']
                        ],
                        dom: '<"row mx-2"' +
                            '<"col-md-2"<"me-3"l>>' +
                            '<"col-md-10"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-end flex-md-row flex-column mb-3 mb-md-0"fB>>' +
                            '>t' +
                            '<"row mx-2"' +
                            '<"col-sm-12 col-md-6"i>' +
                            '<"col-sm-12 col-md-6"p>' +
                            '>',
                        language: {
                            sLengthMenu: '_MENU_',
                            search: '',
                            searchPlaceholder: 'Search..'
                        },
                        // Buttons with Dropdown
                        buttons: [{
                                extend: 'collection',
                                className: 'btn btn-label-secondary dropdown-toggle mx-3',
                                text: '<i class="bx bx-upload me-2"></i>Export',
                                buttons: [{
                                        extend: 'print',
                                        text: '<i class="bx bx-printer me-2" ></i>Print',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [1, 2, 3, 4, 5],
                                            // prevent avatar to be print
                                            format: {
                                                body: function(inner, coldex, rowdex) {
                                                    if (inner.length <= 0) return inner;
                                                    var el = $.parseHTML(inner);
                                                    var result = '';
                                                    $.each(el, function(index, item) {
                                                        if (item.classList !==
                                                            undefined && item.classList
                                                            .contains('user-name')) {
                                                            result = result + item
                                                                .lastChild.firstChild
                                                                .textContent;
                                                        } else if (item.innerText ===
                                                            undefined) {
                                                            result = result + item
                                                                .textContent;
                                                        } else result = result + item
                                                            .innerText;
                                                    });
                                                    return result;
                                                }
                                            }
                                        },
                                        customize: function(win) {
                                            //customize print view for dark
                                            $(win.document.body)
                                                .css('color', config.colors.headingColor)
                                                .css('border-color', config.colors.borderColor)
                                                .css('background-color', config.colors.body);
                                            $(win.document.body)
                                                .find('table')
                                                .addClass('compact')
                                                .css('color', 'inherit')
                                                .css('border-color', 'inherit')
                                                .css('background-color', 'inherit');
                                        }
                                    },
                                    {
                                        extend: 'csv',
                                        text: '<i class="bx bx-file me-2" ></i>Csv',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [1, 2, 3, 4, 5],
                                            // prevent avatar to be display
                                            format: {
                                                body: function(inner, coldex, rowdex) {
                                                    if (inner.length <= 0) return inner;
                                                    var el = $.parseHTML(inner);
                                                    var result = '';
                                                    $.each(el, function(index, item) {
                                                        if (item.classList !==
                                                            undefined && item.classList
                                                            .contains('user-name')) {
                                                            result = result + item
                                                                .lastChild.firstChild
                                                                .textContent;
                                                        } else if (item.innerText ===
                                                            undefined) {
                                                            result = result + item
                                                                .textContent;
                                                        } else result = result + item
                                                            .innerText;
                                                    });
                                                    return result;
                                                }
                                            }
                                        }
                                    },
                                    {
                                        extend: 'excel',
                                        text: 'Excel',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [1, 2, 3, 4, 5],
                                            // prevent avatar to be display
                                            format: {
                                                body: function(inner, coldex, rowdex) {
                                                    if (inner.length <= 0) return inner;
                                                    var el = $.parseHTML(inner);
                                                    var result = '';
                                                    $.each(el, function(index, item) {
                                                        if (item.classList !==
                                                            undefined && item.classList
                                                            .contains('user-name')) {
                                                            result = result + item
                                                                .lastChild.firstChild
                                                                .textContent;
                                                        } else if (item.innerText ===
                                                            undefined) {
                                                            result = result + item
                                                                .textContent;
                                                        } else result = result + item
                                                            .innerText;
                                                    });
                                                    return result;
                                                }
                                            }
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        text: '<i class="bx bxs-file-pdf me-2"></i>Pdf',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [1, 2, 3, 4, 5],
                                            // prevent avatar to be display
                                            format: {
                                                body: function(inner, coldex, rowdex) {
                                                    if (inner.length <= 0) return inner;
                                                    var el = $.parseHTML(inner);
                                                    var result = '';
                                                    $.each(el, function(index, item) {
                                                        if (item.classList !==
                                                            undefined && item.classList
                                                            .contains('user-name')) {
                                                            result = result + item
                                                                .lastChild.firstChild
                                                                .textContent;
                                                        } else if (item.innerText ===
                                                            undefined) {
                                                            result = result + item
                                                                .textContent;
                                                        } else result = result + item
                                                            .innerText;
                                                    });
                                                    return result;
                                                }
                                            }
                                        }
                                    },
                                    {
                                        extend: 'copy',
                                        text: '<i class="bx bx-copy me-2" ></i>Copy',
                                        className: 'dropdown-item',
                                        exportOptions: {
                                            columns: [1, 2, 3, 4, 5],
                                            // prevent avatar to be display
                                            format: {
                                                body: function(inner, coldex, rowdex) {
                                                    if (inner.length <= 0) return inner;
                                                    var el = $.parseHTML(inner);
                                                    var result = '';
                                                    $.each(el, function(index, item) {
                                                        if (item.classList !==
                                                            undefined && item.classList
                                                            .contains('user-name')) {
                                                            result = result + item
                                                                .lastChild.firstChild
                                                                .textContent;
                                                        } else if (item.innerText ===
                                                            undefined) {
                                                            result = result + item
                                                                .textContent;
                                                        } else result = result + item
                                                            .innerText;
                                                    });
                                                    return result;
                                                }
                                            }
                                        }
                                    }
                                ]
                            },
                            {
                                text: '<i class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">Add New User</span>',
                                className: 'add-new btn btn-primary',
                                attr: {
                                    'data-bs-toggle': 'offcanvas',
                                    'data-bs-target': '#offcanvasAddUser'
                                }
                            }
                        ],
                        // For responsive popup
                        responsive: {
                            details: {
                                display: $.fn.dataTable.Responsive.display.modal({
                                    header: function(row) {
                                        var data = row.data();
                                        return 'Details of ' + data['name'];
                                    }
                                }),
                                type: 'column',
                                renderer: function(api, rowIdx, columns) {
                                    var data = $.map(columns, function(col, i) {
                                        return col.title !==
                                            '' // ? Do not show row in modal popup if title is blank (for check box)
                                            ?
                                            '<tr data-dt-row="' +
                                            col.rowIndex +
                                            '" data-dt-column="' +
                                            col.columnIndex +
                                            '">' +
                                            '<td>' +
                                            col.title +
                                            ':' +
                                            '</td> ' +
                                            '<td>' +
                                            col.data +
                                            '</td>' +
                                            '</tr>' :
                                            '';
                                    }).join('');

                                    return data ? $('<table class="table"/><tbody />').append(data) :
                                        false;
                                }
                            }
                        },
                        initComplete: function() {
                            // Adding role filter once table initialized
                            this.api()
                                .columns(2)
                                .every(function() {
                                    var column = this;
                                    var select = $(
                                            '<select id="UserRole" class="form-select text-capitalize"><option value=""> Select Role </option></select>'
                                        )
                                        .appendTo('.user_role')
                                        .on('change', function() {
                                            var val = $.fn.dataTable.util.escapeRegex($(this)
                                                .val());
                                            column.search(val ? '^' + val + '$' : '', true,
                                                false).draw();
                                        });
                                    column
                                        .data()
                                        .unique()
                                        .sort()
                                        .each(function(d, j) {
                                            select.append('<option value="' + d + '">' + d +
                                                '</option>');
                                        });
                                });
                        }
                    });
                }
            }
            startDataTable()


        })
    </script>
@endsection
