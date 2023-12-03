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
                return 'actions here';
            })
            ->rawColumns(['initials', 'actions'])
            ->make(true);
    }
}
