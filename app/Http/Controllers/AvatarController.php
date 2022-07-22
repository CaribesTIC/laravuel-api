<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
public function store(Request $request)
    {
      try {
          $user = Auth::user();
          $filePath = Storage::disk('local') //$filePath = Storage::disk('spaces')
              ->putFile('public/avatars/user-'.$user->id, $request->file, 'public');              
          $user->avatar = env('DO_SPACES_PUBLIC').substr($filePath, 7, strlen($filePath)-1);
          $user->save();
      } catch (Exception $exception) {
          return response()->json(['message' => $exception->getMessage()], 409);
      }
      return new UserResource($user);
    }
/*    public function store(Request $request)
    {
      try {
          $user = Auth::user();
          $filePath = Storage::disk('spaces')
              ->putFile('avatars/user-'.$user->id, $request->file, 'public');
          $user->avatar = env('DO_SPACES_PUBLIC').$filePath;
          $user->save();
      } catch (Exception $exception) {
          return response()->json(['message' => $exception->getMessage()], 409);
      }
          return new UserResource($user);
    }
*/
}
