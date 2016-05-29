<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testuser;
use App\Http\Requests;

class UserController extends Controller
{
    //
    public function index()
    {
        return Testuser::all();
    }

    public function show($id)
    {
        return Testuser::findOrFail($id);
    }

    public function create()
    {
        return <<<HTML
    <form action="/user/store" method="post">
    <input name="email"><br>
    <input name="password"><br>
    <input type="submit">
</form>
HTML;
    }

    public function store(Request $request)
    {
        $user = Testuser::create($request->all());
        return $user;
    }

    public function destory($id)
    {
        $user = Testuser::findOrFail($id);
        $result = $user->delete();
        if ($result){
            return "Yes";
        } else {
            return "no";
        }
    }

    public function edit($id)
    {
        $user = Testuser::findOrFail($id);
        echo "<form action='/user/" . $id . "/update' method='post'>";
        echo "<input name='email' value='" . $user->email . "'>";
        echo "<input name='password' value='" . $user->password . "'>";
        echo "<input type='submit'>";
        echo '</form>';
    }

    public function update(Request $request,$id)
    {
        $user = Testuser::findOrFail($id);
        $user->update($request->all());

        $user->save();

        return $user;
    }
}
