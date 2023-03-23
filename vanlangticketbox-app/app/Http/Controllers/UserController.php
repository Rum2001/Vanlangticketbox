<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller
{
    // Hàm lấy danh sách Users
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Hàm lấy thông tin một User theo id
    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found']);
        }
    }

    // Hàm thêm một User mới
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['success' => 'User created successfully']);
    }

    // Hàm cập nhật thông tin một User
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['success' => 'User updated successfully']);
        } else {
            return response()->json(['error' => 'User not found']);
        }
    }

    // Hàm xóa một User
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => 'User deleted successfully']);
        } else {
            return response()->json(['error' => 'User not found']);
        }
    }
}