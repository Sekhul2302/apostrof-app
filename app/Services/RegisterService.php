<?php

namespace app\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\table_t_token_email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class RegisterService extends BaseController
{
    public function register(request $request)
    {
        try {
            DB::beginTransaction();

            $input = $request->all();
            $isUserEmpty = User::where('email', $input['email'])->first();

            if($isUserEmpty) {
                return $this->sendError('Email is Register', ['error_message' => 'Email sudah terdaftar'], 500);
            }

            $user = User::create($input);
            $response['token'] =  $user->createToken('MyApp')->plainTextToken;
            $response['name'] =  $user->name;


            $dataPostVerifEmail = [
                'uuid' => uuid_create(),
                'id_user' => $user->id,
                'tgl_expired' => "2023-07-05 15:49:18",
                'id_request' => '1',
                'status_klik' => '0',
                'created_at' => now()
            ];
            // dd($dataPostVerifEmail);
            // $sendTokenVerif = table_t_token_email::create($dataPostVerifEmail);

            DB::table('table_t_token_email')->insert($dataPostVerifEmail);


            DB::commit();
            return $this->sendResponse($response, 'Pendaftaran berhasil, silahkan cek email untuk aktifasi.');
        } catch (Throwable $e) {
            DB::rollBack();
            return $this->sendError($e, 'Error Catch');
        }
    }

    public function login (request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $response['token'] =  $user->createToken('MyApp')->plainTextToken;
            $response['name'] =  $user->name;

            return $this->sendResponse($response, 'User login successfully.');
        }
        else{
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
    }
}

