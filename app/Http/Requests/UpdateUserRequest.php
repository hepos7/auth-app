<?php

namespace App\Http\Requests;
use App\Models\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = request()->route('user');
        $profileImage=request()->file('profile_picture');
        if($profileImage!=null){
            $Image=time() . '-' . $user->first_name . '-' . $user->last_name . '.' . $profileImage->extension();
            $profileImage->move(public_path('images'),$Image);
            $oldData=User::find($user->id);
            if (is_file(('./images/' . $oldData->profile_picture))) {
                $file_path = public_path('images/').$oldData->profile_picture;
                $test=unlink($file_path);

           }    
        
        }else{
            $Image=$user->profile_picture;

        }
        $user->profile_picture=$Image;
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'profile_picture' => 'image|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email:rfc,dns|unique:users,email,'.$user->id,
            'password_confirmation' => 'same:password'
        ];
    }
}
