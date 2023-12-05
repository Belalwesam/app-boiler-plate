<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.admins.index');
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
                $btns = <<<HTML
                        <div class="dropdown d-flex justify-content-center">
                                <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                  <li><a class="dropdown-item" href="javascript:void(0);">Rename Team</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">View Details</a></li>
                                  <li><a class="dropdown-item" href="javascript:void(0);">Add to favorites</a></li>
                                  <li>
                                    <hr class="dropdown-divider">
                                  </li>
                                  <li>
                                    <a class="dropdown-item text-danger" href="javascript:void(0);">Delete Team</a>
                                  </li>
                                </ul>
                        </div>
                HTML;

                return $btns;
            })
            ->rawColumns(['initials', 'actions'])
            ->make(true);
    }
}
