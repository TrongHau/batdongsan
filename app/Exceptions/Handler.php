<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Library\Helpers;
use Jenssegers\Agent\Agent;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if (method_exists($exception, 'getMessage')){
            if($exception->getMessage() == 'Unauthenticated.') {
                return $request->expectsJson()
                    ? response()->json(['status' => false, 'message' => $exception->getMessage(), 'data' => null], 401)
                    : redirect()->guest('?rq=login&back_url='.$request->getRequestUri());
            }elseif ($exception->getMessage() == 'The given data was invalid.') {
                return parent::render($request, $exception);
            }
        }
        // error response basic
        if(method_exists($exception, 'getStatusCode')) {
            if($exception->getStatusCode() == 422) {
                // Validation
                return parent::render($request, $exception);
            }elseif($exception->getStatusCode() == 403 || $exception->getStatusCode() == 400){
                if($request->ajax()) {
                    if($request->format() == 'html') {
                        return response()->make($exception->getMessage(), 403);
                    }
                    Helpers::ajaxResult(false, $exception->getMessage(), null);
                }
                return response()->view('errors.403', ['message'=> $exception->getMessage()], 403);
            }elseif ($exception->getStatusCode() == 404) {
                if($request->format() == 'html')
                    return redirect()->guest('/');
                Helpers::ajaxResult(false, 'Truy cập trang web không tồn tại.', null);
            }
        }
        // error http client
        if($exception->getCode() == 400 || $exception->getCode() == 401) {
            if(method_exists($exception, 'getResponse')) {
                $response = $exception->getResponse();
                $response->getBody()->rewind();
                $response = $response->getBody()->getContents();
                $response = (array)json_decode($response, true);
                $response = ['message' => 'Fail', 'data' => [], 'error' => $response['error']];
                return new JsonResponse($response, 400);
            }
        }
//        if(env('APP_DEBUG') && env('APP_ENV') != 'local') {
//            $error = ErrorLogModel::where('type', 'exception')->where('url', $_SERVER['REQUEST_URI'])->where('message', $exception->getMessage())->first();
//            if(!$error) {
//                $error = ErrorLogModel::create([
//                    'request' => json_encode(app('request')->route()->getAction()),
//                    'type' => 'exception',
//                    'url' => $_SERVER['REQUEST_URI'],
//                    'view' => json_encode($exception->getTrace()[0]),
//                    'note' => 'file: '.$exception->getFile().'; ',
//                    'user_id' => Auth::check() ? Auth::user()->id : null,
//                    'message' => $exception->getMessage(),
//                    'parameter' => strlen(json_encode(Request()->all())) < 500 ? json_encode(Request()->all()) : ' ',
//                    'device_display' => 'web',
//                    'ip_address' => Helpers::getIp()
//                ]);
//            }else{
//                $error->count_request = $error->count_request + 1;
//                $error->save();
//            }
//            abort(403, 'Lỗi '.$error->id.' Bạn vui lòng gửi mã lỗi này đến quản trị để khắc phục sớm nhất.');
//        }
        return parent::render($request, $exception);
    }
}
