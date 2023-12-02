@extends('admin.layout.app')
@section('content')
    <h4 class="py-3 breadcrumb-wrapper mb-2">@lang('roles.roles')</h4>

    <p>
        @lang('roles.roles_list')
    </p>
    <!-- Role cards -->
    <div class="row g-4">
        @foreach ($roles as $role)
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="fw-normal">@lang('roles.total_users') {{ count($role->users) }}</h6>
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                @foreach ($role->users as $admin)
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        title="" class="avatar avatar-sm" data-bs-original-title="Vinnie Mostowy">
                                        <span
                                            class="avatar-initial rounded-circle bg-label-secondary">{{ $admin->getInitials() }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="role-heading">
                                <h4 class="mb-1">{{ $role->name }}</h4>
                                <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                    class="role-edit-modal"><small>@lang('roles.edit_role')</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100">
                <div class="row h-100">
                    <div class="col-sm-5">
                        <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-3">
                            <img src="{{ asset('/dashboard/assets/img/illustrations/lady-with-laptop-light.png') }}"
                                class="img-fluid" alt="Image" width="100"
                                data-app-light-img="illustrations/lady-with-laptop-light.png"
                                data-app-dark-img="illustrations/lady-with-laptop-dark.png">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body text-sm-end text-center ps-sm-0">
                            <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                class="btn btn-primary mb-3 text-nowrap add-new-role">
                                @lang('roles.create_role')
                            </button>
                            <p class="mb-0">@lang('roles.roles_create_message')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Role cards -->

    <!-- Add Role Modal -->
    <!-- Add Role Modal -->
    <div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <h3 class="role-title">@lang('roles.create_role')</h3>
                    </div>
                    <!-- Add role form -->
                    <form id="addRoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                        onsubmit="return false" novalidate="novalidate">
                        <div class="col-12 mb-4 fv-plugins-icon-container">
                            <label class="form-label" for="name">@lang('roles.role_name')</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="@lang('roles.role_name')" tabindex="-1">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <div class="col-12">
                            <h5>@lang('roles.permissions')</h5>
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">
                                                @lang('roles.adminstrator_access')
                                                <i class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="Allows a full access to the system"
                                                    aria-label="Allows a full access to the system"></i>
                                            </td>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="selectAllCheckbox">
                                                    <label class="form-check-label" for="selectAll">
                                                        @lang('general.select_all')</label>
                                                </div>
                                            </td>
                                        </tr>
                                        @foreach ($permissions as $key => $value)
                                            <tr>
                                                <td class="text-nowrap">{{ ucwords($key) }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        @foreach ($value as $permission)
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input permission-checkbox"
                                                                    value={{ $permission->id }} type="checkbox">
                                                                <label class="form-check-label"> {{ $permission->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                        {{-- <div class="form-check me-3 me-lg-5">
                                                            <input class="form-check-input permission-checkbox"
                                                                value="users" type="checkbox">
                                                            <label class="form-check-label"> Write
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input permission-checkbox"
                                                                value="admins" type="checkbox">
                                                            <label class="form-check-label"> Create
                                                            </label>
                                                        </div> --}}
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center">
                            <button type="button" id="submit-create-btn"
                                class="btn btn-primary me-sm-3 me-1">@lang('general.create')</button>
                            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                @lang('general.cancel')
                            </button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>
    <!--/ Add Role Modal -->

    <!-- / Add Role Modal -->
@endsection

@section('script')
    <script>
        $('document').ready(function() {
            //handle select all checkbox
            $('body').on('change', '#selectAllCheckbox', function() {
                if ($(this).is(":checked")) {
                    $('.permission-checkbox').prop('checked', true)
                } else {
                    $('.permission-checkbox').prop('checked', false)
                }
            })

            //create new ajax request
            $('body').on('click', '#submit-create-btn', function() {
                let permissions = $('.permission-checkbox:checked').map(
                    function() { //collect selected checkboxes
                        return $(this).val()
                    }).get()
                let data = {
                    _token: "{!! csrf_token() !!}",
                    name: $('#name').val(),
                    permissions: permissions
                }

                let formBtn = $(this) // the button that sends the reuquest (to minipulate ui)

                $.ajax({
                    method: 'POST',
                    url: "{!! route('admin.roles.store') !!}",
                    data: data,
                    beforeSend: function() {
                        formBtn.html(
                            '<span class="spinner-border" role="status" aria-hidden="true"></span>'
                        )
                        formBtn.prop('disabled', true)
                    },
                    success: function(response) {
                        successMessage("@lang('general.create_success')")
                        $('#addRoleModal').modal('toggle')
                        document.getElementById("addRoleForm").reset();
                    },
                    error: function(response) {
                        errorMessage("@lang('general.error')")
                        displayErrors(response)
                    },
                }).done(function() {
                    formBtn.html("@lang('general.create')")
                    formBtn.prop('disabled', false)
                }).fail(function() {
                    formBtn.html("@lang('general.create')")
                    formBtn.prop('disabled', false)
                })
            })
        })
    </script>
@endsection
