<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
  public function index()
  {
    $roles = Role::all();
    return view('admin.pages.admins.index' , compact('roles'));
  }

  public function getAdminsList()
  {
    $data = Admin::with('roles')->get();
    return DataTables::of($data)
      ->addIndexColumn()
      ->editColumn('created_at', function ($row) {
        return $row->created_at->format('d-m-Y');
      })
      ->addColumn('role', function ($row) {
        return $row->getRole();
      })
      ->addColumn('initials', function ($row) {
        $initials = "<div class='avatar'>
                            <span class='avatar-initial rounded-circle bg-info'>{$row->getInitials()}</span>
                        </div>";

        return $initials;
      })
      ->addColumn('actions', function ($row) {
        $edit_text = trans('general.edit');
        $delete_text = trans('general.delete');
        $btns = <<<HTML
                    <div class="dropdown d-flex justify-content-center">
                        <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" data-id="{$row->id}" href="javascript:void(0);"><i class="bx bx-edit me-0 me-lg-2 text-primary"></i>{$edit_text}</a></li>
                             <li><a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-0 me-lg-2 text-danger"></i>{$delete_text}</a></li>
                          </ul>
                        </div>
                HTML;

        return $btns;
      })
      ->rawColumns(['initials', 'actions'])
      ->make(true);
  }
}
